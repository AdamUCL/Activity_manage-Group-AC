<?php  
	namespace Home\Controller;
	use Think\Controller;
	class HomenoticeController extends AllowController{
		public function index(){
			$homenotice = M("activity");
			$tot = $homenotice->count();
			$start_time=strtotime($_GET['start_time']);
			$end_time=strtotime($_GET['end_time']);
			$type_id=$_GET['type_id'];
			if($_GET['start_time']!= null && $_GET['end_time']!= null && $_GET['type_id']!=null){
	            $where = "$start_time  <= a.start_time and {$end_time} >= a.start_time  and a. type_id={$type_id} and a.remark > 0";
        	}else if($_GET['start_time']!= null && $_GET['end_time']!= null && $_GET['type_id']==null){
        		$where = "$start_time  <= a.start_time and {$end_time} >= a.start_time  and a.remark > 0";

        	}elseif($_GET['start_time']== null  && $_GET['type_id']!=null){
        		$where="a. type_id={$type_id} and a.remark > 0";
        	}elseif($_GET['end_time']== null && $_GET['type_id']!=null){
				$where="a. type_id={$type_id} and a.remark > 0";
			}else{
        		$where="a.remark > 0";
        	}
        	// if($_GET['type_id']!==)
			//page arrangement
			$nums = 2;
	    	$page = new \Think\Page($tot,$nums);
			// $list=$homenotice->table("activity as a,users as u,type as t")->where('a.user_id=u.user_id and a.type_id=t.type_id')->where($where)->limit($page->firstRow,$page->listRows)->field("a.*,t.type_name,u.username")->order("a.create_time desc")->select();	
			$list=$homenotice->table("activity as a")->join('users u ON a.user_id=u.user_id',"LEFT")->join('type t ON a.type_id=t.type_id',"LEFT")->where($where)->field("a.*,t.type_name,u.username")->limit($page->firstRow,$page->listRows)->order("a.create_time desc")->select();	
			// var_dump($list);
			// echo M('activity')->getlastsql();
			// foreach ($list as $key => $value) {
			// 	$score=M('score')->where('activity_id='.$value['activity_id'])->select();
			// 	// echo M('score')->getlastsql();
			// 	$count=count($score);
			// 	// echo $count;
			// 	foreach ($score as $k => $v) {
			// 		$pre[]=$v['star'];
					
			// 	}
			// 	activity status define
			foreach ($list as $key => $value) {
				if(time() < $value['start_time']){
					$list[$key]['status']='No begining';
				}elseif(time() > $value['start_time'] && time() < $value['end_time']){
					$list[$key]['status']='event processing';
				}elseif(time() > $value['end_time']){
					$list[$key]['status']='event finish';
				}
				$list[$key]['start_time']=date('Y-m-d H:i:s',$value['start_time']);
				$list[$key]['end_time']=date('Y-m-d H:i:s',$value['end_time']);
			}
			// accept current page, deflaut openning page 1
	    	if (empty($_GET['p'])) {
	    		$p = "1";
	    	}else{
	    		$p = $_GET['p'];
	    	}
	    	$type= M("type");
			$lists=$type->select(); 
			
	    	// assign total number
	    	// var_dump($list);
			$this->assign("total",$tot);
			// assign final page number
			$this->assign("page",ceil($tot/$nums));
			// assign current page number
			$this->assign("curr",$p);
			$this->assign("lists",$lists);
			$this->assign("list",$list);
			$this->display("Homenotice/index");
		}

		//loading added homenotice
		public function add(){
			$type= M("type");
			$list=$type->select(); 
			$this->assign("list",$list);
			$this->display("Homenotice/add");
		}

		//add activity
		public function insert(){
			// echo json_encode($_POST);
			// // exit;
			$params=$_POST['params'];
			$date['title'] = $params['titles'];
			$date['remark'] = $params['remark'];
			$date['over'] = $params['remark'];
			$date['user_id']=session('userid');
			$date['status'] = 0;
			$date['type_id'] = $params['articletype'];
			$date['name'] = $params['name'];
			$date['start_time'] = strtotime($params['start_time']);
			$date['end_time']=strtotime($params['end_time']);
			$date['activity_pic']=$params['activity_pic'];
			$date['location']=$_POST['place'];
			$date['descr']=$_POST['descr'];
			$date['create_time']=time();
			$homenotice = M("activity");
			$info = $homenotice->add($date);
			if($info){
				echo "success";
			}else{	
				echo "error";
			}
		}

		//loading modified homenotice model
		public function edit(){
			$arr = I("get.id");
			$homenotice = M("activity");
			$list=$homenotice->table("activity as a,type as t")->where('a.type_id=t.type_id and a.activity_id='.$arr)->field("a.*,t.*")->find();
			$start_time=date('Y-m-dH:i:s',$list['start_time']);
			$end_time=date('Y-m-dH:i:s',$list['end_time']);
			$list['start_time']=substr_replace($start_time,substr($start_time,0,10).'T',0,10);
			$list['end_time']=substr_replace($end_time,substr($end_time,0,10).'T',0,10);
			$type= M("type");
			$lists=$type->select(); 
			$this->assign("list",$list);
			$this->assign("lists",$lists);
			$this->display("Homenotice/update");
		}

		public function score(){
			$arr = I("get.id");
			$homenotice = M("activity");
			$list=$homenotice->table("activity as a,type as t")->where('a.type_id=t.type_id and a.activity_id='.$arr)->field("a.*,t.*")->find();
			// echo $homenotice->getlastsql(
			// $list = $homenotice->where($arr)->find();
			$type= M("type");
			$lists=$type->select(); 
			$this->assign("list",$list);
			$this->assign("lists",$lists);
			$this->display("Homenotice/score");
		}

		public function addscore(){
			$params=$_POST['params'];
			$date['activity_id'] = $params['activity_id'];
			$date['user_id'] = $params['user_id'];
			$date['name'] = $params['name'];
			// if($params['score']!=null){
				
			// }else{
			// 	$this->error('score no can null');
			// }
			$date['star'] = $params['score'];
			$date['addtime']=time();
			$date['status']=0;
			$homenotice = M("score");
			$info = $homenotice->add($date);
			if($info){
				echo "success";
			}else{	
				echo "error";
			}
		}

		//modify homenotice content
		public function update(){
			$params=$_POST['params'];
			// echo json_encode($params);
	
			if($params['user_id']!=session("userid")){
				$this->error('you only can update youself activity!');
			}else{
				$arr = array("activity_id"=>$params['activity_id']);
				$date['title'] = $params['titles'];
				$date['type_id'] = $params['articletype'];
				$date['name'] = $params['name'];
				$date['start_time'] = strtotime($params['start_time']);
				$date['end_time']= strtotime($params['end_time']);
				if(!empty($params['activity_pic'])){
					$date['activity_pic']=$params['activity_pic'];
					$list=M("activity");
					$activity=$list->where($arr)->find();
					$activity_pic=$activity['activity_pic'];
					unlink("./Public/photo/".$activity_pic);
				}
				$date['location']=$params['place'];
				$date['descr']=$params['descr'];
				$homenotice = M("activity");
				$info = $homenotice->where($arr)->save($date);

				if($info){
					echo "success";
				}else{	
					echo "error";
				}
			}
			


		}

		//delete homenotice
		public function delete(){
			$arr = array("activity_id"=>I("post.id"));
			$homenotice = M("activity");
			$list=$homenotice->where($arr)->find();
			$path='./Public/photo/'.$list['activity_pic'];
			$info = $homenotice->where($arr)->delete();
			if($info){
				unlink($path);
				M('enter')->where($arr)->delete();
				M('assess')->where($arr)->delete();
				echo "success";
			}else{	
				echo "error";
			}
		}

		public function uploadpic(){
			
			$upload = new \Think\Upload();
        	$upload->maxSize=0;
        	$upload->autoSub=false;//close sub
        	$upload->exts=array("jpg","jpeg","gif",'png');
        	$upload->rootPath="./Public/photo/";
        	$info = $upload->upload();
        	if(!$info){
        		$result['code']=0;
        		$result['msg']='picture upload fail';
        	}else{
        		
        		$pic='';
        		foreach($info as $file){
        			$pic=$file['savename'];
        			
        		}
        		
        		$result['code']=1;
        		$result['msg']='picture upload success';
        		$result['activity_pic']=$pic;
        	}
        	echo json_encode($result);
		}

		/**
		 * [sign]
		 * @return [type] [description]
		 */
		public function sign(){
			$enter = M("enter");
			$array=array(["activity_id"=>I("post.id"),"user_id"=>session('userid')]);
			$list=$enter->where($array)->select();
			$activity=M('activity')->where('activity_id='.$_POST['id'])->find();
			if(time() <= $activity['start_time']){
					if($activity){
						if($list){
							echo 'reset';
						}else{
							$id=$_POST['id'];
							$arr = array("activity_id"=>I("post.id"));
							$homenotice = M("activity");
							$user= M("users");
							$info = $homenotice->where($arr)->find();
							$userinfo= $user->where('user_id='.session('userid'))->find();
							$date['user_id']=session('userid');
							$date['status'] = 0;
							$date['type_id'] = $info['type_id'];
							$date['activity_id'] = $id;
							$date['activity_address'] = $info['location'];
							$date['username']=session('name');
							$date['user_phone']=$userinfo['user_phone'];
							$date['activity_name']=$info['name'];
							$date['code']=uniqid();
							$date['status']=0;
							$date['create_time']=time();
							$enter = M("enter");
							$infos = $enter->add($date);
							if($infos){
								$activity_id=I("post.id");
								$list=M('activity')->where('activity_id='.$activity_id)->find();
								if($list['remark']>0){
									$data = array('remark'=>$remark=$list['remark']-1);
								    $remark=M('activity')->where('activity_id='.$activity_id)->setField($data);
								    if($remark){
								    	echo "success";
								    }else{
								    	echo "error";
								    }
								}else{
									echo "total";
								}
								
							}else{	
								echo 'aaa';
							}
						}
				}else{
					echo "sss";
				}
			}else{
				echo 'kkk';
			}

			
		}

		public function myindex(){
			$homenotice = M("activity");
			$userid=session('userid');
			$tot = $homenotice->where('user_id='.$userid)->count();
			//page arrangement
			$nums = 2;
			
	    	$page = new \Think\Page($tot,$nums);
			$list=$homenotice->table("activity as a")->join('users u ON a.user_id=u.user_id',"LEFT")->join('type t ON a.type_id=t.type_id',"LEFT")->where('a.user_id='.$userid)->field("a.*,t.type_name,u.username")->limit($page->firstRow,$page->listRows)->order("a.create_time desc")->select();	
			// echo M("activity")->getlastsql();
			// var_dump($list);
			//accept current page, deflaut openning page 1
			foreach ($list as $key => $value) {
				if(time() < $value['start_time']){
					$list[$key]['status']='No begining';
				}elseif(time() > $value['start_time'] && time() < $value['end_time']){
					$list[$key]['status']='event processing';
				}elseif(time() > $value['end_time']){
					$list[$key]['status']='event finish';
				}
				
				$list[$key]['start_time']=date('Y-m-d H:i:s',$value['start_time']);
				$list[$key]['end_time']=date('Y-m-d H:i:s',$value['end_time']);
			}
	    	if (empty($_GET['p'])) {
	    		$p = "1";
	    	}else{
	    		$p = $_GET['p'];
	    	}
	    	foreach ($list as $key => $value) {
	    		$list[$key]['percentage']=100*sprintf("%.2f",($value['remark'] / $value['over']));
	    	}
	    	// assign total number
			$this->assign("total",$tot);
			// assign final page number
			$this->assign("page",ceil($tot/$nums));
			// assign current page number
			$this->assign("curr",$p);
			$this->assign("list",$list);
			$this->display("Homenotice/myindex");
		}

		public function myactivity(){
			$homenotice = M("enter");
		    $userid=session('userid');
			$tot = $homenotice->where('user_id='.$userid)->count();
			//page arrangement
			$nums = 2;
			$page = new \Think\Page($tot,$nums);
			$list=$homenotice->table("enter as e")->join('users u ON e.user_id=u.user_id',"LEFT")->join('activity a ON e.activity_id=a.activity_id',"LEFT")->join('type t ON e.type_id=t.type_id',"LEFT")->where('e.user_id='.$userid)->field("a.*,e.*,t.type_name,u.username,u.user_id")->limit($page->firstRow,$page->listRows)->order("e.create_time desc")->select();
			// echo M("enter")->getlastsql();
			// var_dump($list);

			foreach ($list as $key => $value) {

				if(time() < $value['start_time']){
					$list[$key]['status']='No begining';
				}elseif(time() > $value['start_time'] && time() < $value['end_time']){
					$list[$key]['status']='event processing';
				}elseif(time() > $value['end_time']){
					$list[$key]['status']='event finish';
				}
				
				$list[$key]['start_time']=date('Y-m-d H:i:s',$value['start_time']);
				$list[$key]['end_time']=date('Y-m-d H:i:s',$value['end_time']);
			}
			if (empty($_GET['p'])) {
	    		$p = "1";
	    	}else{
	    		$p = $_GET['p'];
	    	}

	    	foreach ($list as $key => $value) {
	    		$list[$key]['percentage']=100*sprintf("%.2f",($value['remark'] / $value['over']));
	    	}
	    	// var_dump($list);
	    	// assign total number
			$this->assign("total",$tot);
			// assign final page number
			$this->assign("page",ceil($tot/$nums));
			// assign current page number
			$this->assign("curr",$p);
			$this->assign("list",$list);
			$this->display("Homenotice/myactivity");
		}

		public function sendemail(){
			$arr = I("get.id");
			$new=M('enter');
			$list=$new->table("enter as a,users as t")->where('a.user_id=t.user_id and a.enter_id='.$arr)->field("a.*,t.*")->find();
			// var_dump($list);exit;
			$this->assign("list",$list);
			$this->display("Homenotice/sendemail");
		}

		public function addsend(){
			$params=$_POST['params'];
			$list=M('sendemail')->where('enter_id='.$params['enter_id'])->select();
			if(!$list){
				$date['email'] = $params['email'];
				$date['enter_id'] = $params['enter_id'];
				$date['content'] = $params['content'];
				$date['addtime']=time();
				$date['status']=0;
				$homenotice = M("sendemail");
				$info = $homenotice->add($date);
				if($info){
					echo "success";
				}else{	
					echo "error";
				}
			}else{
				echo "reset";
			}

		}
	}
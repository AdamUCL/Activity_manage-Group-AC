<?php
	namespace Home\Controller;
	use Think\Controller;
	class AssessController extends AllowController{
		public function index(){
			$homenotice = M("assess");
			$tot = $homenotice->count();
			//page arrangement
			$nums = 2;
	    	$page = new \Think\Page($tot,$nums);
			$list=$homenotice->table("assess as s")->join('activity a ON s.activity_id=a.activity_id',"LEFT")->join('users u ON s.user_id=u.user_id',"LEFT")->where('s.status=0')->field("a.*,s.*,u.username")->limit($page->firstRow,$page->listRows)->order("s.addtime desc")->select();	
			foreach($list as $key=>$value){
				if($value['status']==0){
					$list[$key]['msg']='Not pass';
				}else{
					$list[$key]['msg']='Pass';
				}
				$list[$key]['addtime']=date('Y-m-d H:i:s',$value['addtime']);
			}
			//accept current page, deflaut page 1
	    	if (empty($_GET['p'])) {
	    		$p = "1";
	    	}else{
	    		$p = $_GET['p'];
	    	}
	    	// assign total page number
			$this->assign("total",$tot);
			// assign final page number
			$this->assign("page",ceil($tot/$nums));
			// assign current page number
			$this->assign("curr",$p);

			$this->assign("list",$list);
			$this->display("Assess/index");
		}
		public function add(){
			$enter= M("enter");
			$list=$enter->table("enter as e")->join('activity a ON e.activity_id=a.activity_id',"LEFT")->where('e.user_id='.session('userid'))->field("e.*,a.start_time,a.end_time")->order("e.id desc")->select();	
			foreach ($list as $key => $value) {
				if(time() < $value['start_time']){
					unset($list[$key]);
				}
 			}
			$this->assign("list",$list);
			$this->display("Assess/add");
		}
		public function insert(){		
			$params=$_POST['params'];
			$assess=M('assess');
			$enter=M('enter');
			$info=$enter->where('enter_id='.$params['enter_id'])->find();
			$list=$assess->where(['enter_id'=>$params['enter_id'],'user_id'=>session('userid'),'activity_id'=>$info['activity_id']])->find();
			if($list==null){
				$date['enter_id']=$params['enter_id'];
				$date['activity_id']=$info['activity_id'];
				$date['title'] = $params['title'];
				if($params['score']!=null){
					$date['score'] = $params['score'];
				}else{
					$date['score']=5;
				}		
				$date['user_id']=session('userid');
				$date['status'] = 0;
				$date['addtime']=time();
				$date['content']=$params['content'];
				$homenotice = M("assess");
				$infos= $homenotice->add($date);
				// echo $infos->getlastsql();
				if($infos){
					echo "success";
				}else{	
					echo "error";
				}
			}else{
				echo 'reset';
			}
			
		}
			public function delete(){
			$arr = array("assess_id"=>I("post.id"));
			$desire = M("assess");
			$data['status']=1;
			$info = $desire->where($arr)->save($data);
			if($info){
				echo "success";
			}

		}
	}
?>
	
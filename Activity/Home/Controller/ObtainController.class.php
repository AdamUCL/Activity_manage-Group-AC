<?php  
	namespace Home\Controller;
	use Think\Controller;
	class ObtainController extends AllowController{
		public function index(){
			

		}

		//import data
		public function insert(){

			$users = D("users");
			$info1 = $users->where(array("id"=>$_SESSION['userid']))->find();

			$_POST['class'] = $info1['class'];
			$_POST['stuid'] = $_SESSION['userid'];

			$desire = D("desire");

			$inof1 = $desire->add($_POST);

			$this->success("input success");

		}

		public function classobtain(){
			$type = M("type");
			$enter = M("enter");
			$list=$enter->table("enter as e")->join('type t ON e.type_id=t.type_id',"LEFT")->join('activity a ON e.activity_id=a.activity_id',"LEFT")->where('a.user_id='.session('userid'))->field("e.*,t.type_name,a.name")->limit($page->firstRow,$page->listRows)->order("e.create_time desc")->select();	
			$tot = count($list);
			//page arrangement
			$nums = 2;
	    	$page = new \Think\Page($tot,$nums);
			foreach($list as $key=>$value){
				if($value['status']==0){
					$list[$key]['msg']='Disagree';
				}else{
					$list[$key]['msg']='Agree';
				}
			}
			// accept current page, deflaut page 1
	    	if (empty($_GET['p'])) {
	    		$p = "1";
	    	}else{
	    		$p = $_GET['p'];
	    	}
	    	// assign total number
			$this->assign("total",$tot);
			// assign final page number
			$this->assign("page",ceil($tot/$nums));
			// assign current oage number
			$this->assign("curr",$p);
			$this->assign("list",$list);
			$this->display("Obtain/classobtain");
			
		}

		public function passenter(){
			$arr = array("enter_id"=>I("post.id"));
			$desire = M("enter");
			$data['status']=1;
			$info = $desire->where($arr)->save($data);
			if($info){
				echo "success";
			}
		}
		public function delete(){
			$arr = array("enter_id"=>I("post.id"));
			$desire = M("enter");
			$data['status']=2;
			$info = $desire->where($arr)->save($data);
			if($info){
				echo "success";
			}

		}

		public function Excels()
	    {
	        $enter = M("enter");
	        $list=$enter->table("enter as e,activity as a,users as u")->where('e.user_id=u.user_id and e.activity_id=a.activity_id and e.status!=2')->field("e.username,e.user_phone,e.create_time,a.name,a.title,a.descr,a.start_time,a.end_time,a.location,u.user_email")->order("e.create_time desc")->select();
	        // var_dump($list);	
	        // exit;
	        $time = date("Y-m-d",time());
	        PHPExcel(1, 'Sign list'.$time, $list);
	    }
	}
<?php  
	namespace Home\Controller;
	use Think\Controller;

	class UserController extends AllowController{

        //front page after login
        public function index(){

            $homenotice = M("activity");
            $assess=M('assess');
            $enter=M('enter');
            $time=time();
            $list1 = $homenotice->where(array("status"=>0))->order("create_time desc")->select(); 
            foreach ($list1 as $key => $value) {
               if($value['end_time']<$time){
                    unset($list1[$key]);
               }
            }
            // echo '<pre>';
            // var_dump($list1);
            // echo '</pre>';
            $list2= $enter->order("create_time desc")->select();  
            $list3=$assess->order("addtime desc")->select(); 
            $this->assign("list3",$list3);
            $this->assign("list2",$list2);
            $this->assign("list1",$list1);
            $this->display("User/index");  
        }

        //check homenotice
        public function noticedetails(){
            $arr = array("activity_id"=>I("get.id"));
            $homenotice = M("activity");
            $list = $homenotice->where($arr)->find();
            $type= M("type");
            $lists=$type->select(); 
            $start_time=date('Y-m-dH:i:s',$list['start_time']);
            $end_time=date('Y-m-dH:i:s',$list['end_time']);
            $list['start_time']=substr_replace($start_time,substr($start_time,0,10).'T',0,10);
            $list['end_time']=substr_replace($end_time,substr($end_time,0,10).'T',0,10);
            $this->assign("lists",$lists);
            $this->assign("list",$list);
            $this->display("User/noticedetails");
        }

         public function enterdetails(){
            $arr = array("enter_id"=>I("get.id"));
            $homenotice = M("enter");
            $list = $homenotice->where($arr)->find();
            $type= M("type");
            $lists=$type->select(); 
            $this->assign("lists",$lists);
            $this->assign("list",$list);
            $this->display("User/enterdetail");
        }

         public function feeddetails(){
            $arr = array("assess_id"=>I("get.id"));
            $homenotice = M("assess");
            $list = $homenotice->where($arr)->find();
            $this->assign("lists",$lists);
            $this->assign("list",$list);
            $this->display("User/assessdetail");
        }
        
        //user list
        public function pub(){
            if(empty($_SESSION['pic'])){
                $_SESSION['pic']='noavatar.gif';
            }
            $this->assign("username",$_SESSION['name']);
            $this->assign("pic",$_SESSION['pic']);
            if($_SESSION['role_id']>7){
                $this->display("Public/StuPublic");
            }else{
                $this->display("Public/TeacherPublic");
            }
        }


        //basci information
        public function basic(){
        	// $name = $_SESSION['name'];
        	$id = $_SESSION['userid'];
        	$user = D("users");
        	$arr = array("user_id"=>$id);
        	$list = $user->where($arr)->find();
            if(empty($list['user_pic'])){
                $list['user_pic']=session('pic');
            }
        	if($list['status']!=1){
        		$status = "login pass";
        	}else{
        		$status = "The user has been deactivated";
        	}
        	$list['status'] = $status;
        	$this->assign("list",$list);
        	$this->display("User/basicInfo");
        }

        //detailed information
        public function preInfo(){

        	$id = $_SESSION['userid'];
        	
        	$user = D("users");
        	$arr = array("user_id"=>$id);
        	$list = $user->where($arr)->find();

        	if($list1['status']!=0){
        		$status = "允许登录";
        	}else{
        		$status = "用户已停用";
        	}
        	$list['can_login'] = $status; 
        	$this->assign("list",$list);
        	$this->display("User/detailsInfo");
        }


        //change personal information
        public function update(){
        	$where = array("user_id"=>I("post.id"));
        	$mod = D("users");

        	$data['sex'] = I("post.sex");
        	$data['username'] = I("post.username");
        	$data['user_address'] = I("post.address");
            if(preg_match("/^(\+?44|0)7\d{9}$/",I("post.phone"))){
                 $data['user_phone'] = I("post.phone");
            }else{
                 $this->error('Mobile phone format is wrong');
                 exit;
            }
            if(preg_match('/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/',I("post.email"))){
                $data['user_email'] = I("post.email");
            }else{
                $this->error('The Email format is wrong');
                exit;
            }
        	$data['university'] = I("post.university");
        	$info = $mod->where($where)->save($data);
        	if($info){
        		$this->success("success",U("User/preInfo"));
                // echo 'success'; 
        	}else{
        		$this->error();
        	}

        }

        //upload head picture
        public function upload(){
        	$arr = array("user_id"=>I("post.user_id"));
        	$upload = new \Think\Upload();
        	$upload->maxSize=0;
        	$upload->autoSub=false;//close sub menu
        	$upload->exts=array("jpg","jpeg","gif",'png');
        	$upload->rootPath="./Public/photo/";
        	$info = $upload->upload();

        	if(!$info){
        		$this->error("upload error");
        	}else{
        		
        		foreach($info as $file){
        			$img = new \Think\Image();
        			$img->open("./Public/photo/".$file['savepath'].$file['savename']);
        			$img->thumb(100,100)->save("./Public/photo/".$file['savepath']."t_".$file['savename']);
        			$mod = D("users");
                    // $users = D("users");
                    $arrs = array("user_id"=>$_SESSION['user_id']);
                    $aa = $mod->where($arrs)->find();
                    if($aa['user_pic']!="noavatar.gif"){
                        unlink("./Public/photo/".$aa['user_pic']);
                    }
        			$data['user_pic'] = $file['savepath']."t_".$file['savename'];
        			$info = $mod->where($arr)->save($data);
        			
        			if($info){
        				$dir = opendir("./Public/photo/");
                        
                        unlink("./Public/photo/".$file['savepath'].$file['savename']);
        				$this->success("success",U("User/basic"));
        			}else{
        				$this->error($mod->getError());
        			}
        		}
        	}
        }

        //check primary password
        public function findpass(){
            $arr = array("user_id"=>session('userid'));
            $oldpassword = md5(I("post.oldpassword"));
            $users = M("users");
            $info = $users->where($arr)->find();
            if($oldpassword==$info['password']){
                echo "success";
            }else{
                echo "error";
            }
        }

        //change password
        public function updatePass(){
            $arr = array("user_id"=>$_SESSION['userid']);
            $users = D("users");
            $pass = array("password"=>md5(I("post.newpassword")));
            $info = $users->where($arr)->save($pass);
            if($info){
                // echo "success";
                $this->success("success",U("User/basic"));
            }else{
                // echo "fail";
                $this->success("error",U("User/basic"));
            }
        }
        
    }

?>

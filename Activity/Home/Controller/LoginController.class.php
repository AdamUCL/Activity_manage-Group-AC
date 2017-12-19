<?php  
	namespace Home\Controller;
	use Think\Controller;
	class LoginController extends Controller{
        //check if methods avabilable
        public function _empty(){
            header("HTTP/1.0 404 Not Found");
            $this -> display("Empty/empty");
        }
        
		//move to login page
		public function index(){
            unset($_SESSION);
			$this->display("User/login");
		}

		//check if the user has authority level
        public function find(){
            $user = D("users");
            $arr = array("username"=>I("get.name"));
            $info = $user->where($arr)->find();
            if(!$info){
                echo "user does not exist";
            }else if($info['status']==1){
                echo "Disabled";
            }else{
                echo "Pass";
            }
        }

        public function login(){
			$name = I("post.name");
			$password = md5(I("post.password"));
			$mod = D("users");
			$arr = array("username"=>$name,"password"=>$password);
			$info = $mod->where($arr)->find();
			
			if($info){
				$_SESSION['name'] = $info['username'];
                $_SESSION['userid'] = $info['user_id'];
                $_SESSION['user_email']=$info['user_email'];
                if(empty($info['user_pic'])){
                    $_SESSION['pic']="noavatar.gif";
                }else{
                    $_SESSION['pic'] = $info['user_pic'];
                } 
                $_SESSION['phone'] = $info['phone'];
				$this->success("Login successful",U("User/pub"));  

			}else{
				$this->error("User name does not exist or password error");
			}
		}

		//log out
        public function outLogin(){
            //log out   delete session values
            unset($_SESSION);
            session_destroy();
            $this->success("Layout successful",U("User/pub"));
        }

        //loading forget password page
        public function forget(){
            unset($_SESSION['param']);
        	$this->display("User/forget");
        }

        //get SMS verfication code
        public function getyzm(){

        	$phone = I("post.phone");
        	$param = "";
        	for($i=0;$i<4;$i++){
        		$param .= ceil(rand(0,9));
        	}
            $_SESSION['param'] = $param;
            $_SESSION['phone'] = $phone;
        	test($phone,$param);
        }
		
		// SMS verfication code expire
        public function invalid(){
            // session('param','[destroy]');
            $_SESSION['param'] = rand(10000,100000);
        }
		
        //check if inputed vertifcation code correct
        public function contrast(){

            if($_SESSION['param'] == I("post.yzms")){
                echo "successful";
            }else{
                echo "failed";
            }

        }

        //loading change password page
        public function addreset(){
            $this->assign("phone",$_SESSION['phone']);
            $this->display("User/resetpass");
        }

        //change password
        public function resetpass(){
            $arr = array("phone"=>$_SESSION['phone']);
            $arrs = array("password"=>md5(I("post.password")));
            $users = D("users");
            $info = $users->where($arr)->save($arrs);
            if($info){
                echo "success";
            }else{
                echo "fail";
            }
        }

		//move to registrition page
		public function toReg(){
			$mod = D("class");
			$list = $mod->select();
			$class = array();
			foreach($list as $key=>$value){
				if($value['status']<=1){
					$class[] = array("id"=>$value['id'],"name"=>$value['name']);
				}
			}

			$this->assign("class",$class);
			$this->display("User/register");
		}

		//add user
		public function add(){

			$mod = D("users");
            $data['realname'] = I("post.realname");
            $data['username'] = I("post.username");
            $data['password'] = md5(I("post.password"));
            $data['login_time'] = time();
            $data['status']=0;
			$data['sex'] = I("post.sex");
			$data['user_address'] = I("post.address");
			$data['user_phone'] = I("post.phone");
			$data['user_email'] = I("post.email");
			$data['university'] = I("post.university");
			$data['performance'] = I("post.performance");
            $data['birthday'] = I("post.birthday");
            $info = $mod->add($data);
            if($info){
                $this->success("register was successful",U("Login/index"));
            }else{
                 $this->success("register was failed",U("Login/index"));
            }

		}


		//verfication code
        public function verify(){
            $config = array(
                    'fontSize' => 20, 
                    'length'   => 4,        
                    // 'expire'   => 10,        
                    'useImgBg' => true,     
                    'useCurve' => true,     
                    'useNoise' => true,     
                    'codeSet'  => '1234567890',  
                    'imageW'   => 185,
                    'imageH'   => 40
                );
            $Verify = new \Think\Verify($config);
            $Verify->entry();
        }

        public function yzm(){
            if(IS_POST){
                $Verify = new \Think\Verify();
                $info = $Verify->check($_POST['verifys'],$id='');
                if($info){
                    echo "1";
                }else{
                    echo "0";
                }
                
            }else{

                $this->display("Stu/yzm");
            }
        }

        //Ajax verfication
		public function preg_password(){
			if(IS_AJAX){
			    $password = I("post.password");
			    if (!preg_match("/^[a-zA-Z\d]{6,18}$/",$password)) {
			    	echo "password incorrect";
			    }else{
			    	echo 'correct';
			    }
		    }
		}

        //id verfication
        public function preg_card(){
            $arr = array("card"=>I("post.card"));
            $users = D("users");

            $info = $users->where($arr)->find();
            if($info){
                echo "1";
            }else{
                echo "0";
            }
        }

		public function preg_repassword(){
			if(IS_AJAX){
			    $password = I("post.password");
			    $repassword = I("post.repassword");
			    if ($password === $repassword) {
			    	echo 'correct';
			    }else{
			    	echo "different passwords input";
			    }
		    }
		}


		//phone number verfication
		public function preg_phone(){
			 $arr = array("user_phone"=>I("post.phone"));
             $users = M("users");
			 $info = $users->where($arr)->find();
		    if($info){
                echo "1";
            }else{
                echo "0";
            }
		}

	}
?>
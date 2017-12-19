<?php  
	namespace Home\Controller;
	use Think\Controller; 
	class AllowController extends Controller{
		//check if methods available
		public function _empty(){
			header("HTTP/1.0 404 Not Found");
    		$this -> display("Empty/empty");
		}
		public function _initialize(){

			$mname = CONTROLLER_NAME; //get controller name
			$aname = ACTION_NAME; //get action name

			//vertify if SESSION value exists
			if(empty($_SESSION['userid'])){
				$this->redirect("Index/index");
				exit;
			}else{

			

			}




		}
	}
?>
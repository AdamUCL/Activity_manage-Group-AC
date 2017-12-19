<?php  
	namespace Home\Controller;
	use Think\Controller;
	
	class EmptyController extends Controller{
		//check if controller available
		public function _empty(){
			header("HTTP/1.0 404 Not Found");
    		$this -> display("Empty/empty");
		}
	}
?>
<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	//check if methods avavilable
	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this -> display("Empty/empty");
	}
	
    public function index(){
    	// loading model
    	$this->display('Index/index');
    }

    public function test(){
    	echo 'This is a  test';
    }
}
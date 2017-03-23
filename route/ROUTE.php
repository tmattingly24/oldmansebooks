<?php

require('utils/pageBuilder.php');

class ROUTE {
	
	private static $_instance;
	
	private function __construct(){}
	
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
	
	
	
	public function get($url,$function){
			
			
		if(strpos($_SERVER['REQUEST_URI'],$url) !== false && $url !== '/oldmansebooks/'){

			$instance = ROUTE::getInstance();
			$instance->$function($url);
			
		}else{
				
			if($url == '/oldmansebooks/' && $_SERVER['REQUEST_URI'] == '/oldmansebooks/' ){
				
				$instance = ROUTE::getInstance();
				$instance->defaultRoute();
				
				}
				
			}
	}
		

	

	
	public function bookDetailRoute($url){
		
		buildDetailPage();
	}
	
	public function authDetailRoute($url){
		
		echo 'author detail';	
	}
	
	public function defaultRoute(){
		
		
		buildWelcomePage();
		
	}
	
	public function faqRoute() {
		
		
	}
	
	public function aboutRoute(){
		
		
	}
	
	public function investRoute(){
		
		buildInvestPage();	
	}
	
	public function addToCartRoute(){
		
	}
	
	public function checkoutRoute(){
		
	}
	
	public function storeRoute(){
		
		buildStorePage();	
	}
	
}

?>
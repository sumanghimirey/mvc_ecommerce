<?php
require_once('config/config.php');
require_once('libs/Model.php');
//get vaule of query string parameter from url
 $url=$_GET['url'];

 //explode url the string to array by / using explode method
 $urlarr=explode('/', $url);

 //controller name

 $controllerName=ucfirst($urlarr[0]).'Controller';
//controller file name
 $controllerFile='controller/' .$controllerName. '.php';
 //check for controller file exstence
if(file_exists($controllerFile)){
	//including of controller file
	require_once $controllerFile;
	//creating object of controller
	$obj=new $controllerName();
	//check for method in controller
	if (method_exists($obj, $urlarr[1])) {
		//call method in cotnroller
		$obj->{$urlarr[1]}();
	}
	else{
		//not found method in controller message
		echo $urlarr[1]." ". " method not found in $controllerName";
	}	
}
else{
	echo 'controller not found';
}



?>
<?php

class UserController{

	function login(){

		if(isset($_POST['btnSave'])){

			require_once "model/UserModel.php";
			$user=new UserModel();
			$user->email=$_POST['email'];
			$user->password=sha1($_POST['password']);
			$userdata=$user->getUserByEmail();

			if(count($userdata)==1){
				//check for the password
				$newpassword=sha1($user->password.$userdata[0]->salt);
				if($newpassword==$userdata[0]->password){

					header('location:../dashboard/index');
					print_r($userdata);
				}
				else{
					echo 'login failed';
				}


			}



		// 	$email=$_POST['email'];
		// 	$password=$_POST['email'];
		// 	$salt=uniqid();
		// 	$new=sha1($password.$salt);
		// 	echo $salt;
		// 	echo '<br>';
		// 	echo $new;
		 }

		require_once('view/users/login.php');
	}

	function signup(){

		echo "this is register function";
	}

	function logout(){

		echo "this is logout function";
	}


}


?>
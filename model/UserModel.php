<?php

class UserModel extends Model{
	public $id,$name,$email,$password,$salt,$last_login,$status,$username;

	function getUserByEmail(){
		$sql="select * from tbl_admin where email='$this->email' and status=1";
		return $this->select($sql);

	}

}



?>
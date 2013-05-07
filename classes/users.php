<?php 
	class users
	{
		private $conn_db;
		
		function __construct()
		{
			$this->conn_db = mysqli_connect("localhost","root","","excercise");
			if (mysqli_connect_errno($this->conn_db))
			{
				echo "Failed to connect; ".mysqli_connect_error();
				return false;
			}
		}
		
		function emailUnique($_POST)
		{
			//$email = array();
			$email['email'] = $_POST['email'];
			$check_email = mysqli_query($this->conn_db,"SELECT * FROM users where email='$_POST[email]'");
			$result = mysqli_num_rows($check_email);
			//print_r($result);
			if ($result==0)
			{
				return true;
			}
			else{
				return false;	
			}
		}
		
		function createUser($_POST)
		{
			$sql ="INSERT INTO users(first_name, last_name, email, phone, sex, age) 
					VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[phone]','$_POST[sex]','$_POST[age]')";
			if(!mysqli_query($this->conn_db,$sql))
			{
				die('Error: '.mysqli_error(conn_db));
			}
			header ("Location: index.php");
			return true;
		}
		
		function readUser()
		{
			$result = mysqli_query($this->conn_db, "SELECT * from users");
			$user_list = mysqli_fetch_all($result,MYSQLI_ASSOC);
			return $user_list;
		}
		
		function editUser($userid)
		{
			$result = mysqli_query($this->conn_db,"SELECT * FROM users where id='$userid'");
			$userrow = mysqli_fetch_array($result,MYSQLI_ASSOC);
			return $userrow;
		}
		
		//**** Function for Update Button ****
		function updateUser($_POST)
		{
			//print_r($udpateData);
			$sql=mysqli_query($this->conn_db,"UPDATE users SET first_name='$_POST[first_name]',last_name='$_POST[last_name]',email='$_POST[email]',phone='$_POST[phone]',sex='$_POST[sex]',age='$_POST[age]' where id='$_GET[id]'");
			if(!$sql){
				echo "Error".mysqli_error($this->conn_db);	
			}
			//print_r($sql);
			header("Location: index.php");
			return true;
			
		}
		
		function delete()
		{
			//$con=mysqli_connect("localhost","root","","phptraining");
			
			mysqli_query($this->conn_db,"DELETE FROM users WHERE id='$_GET[id]'");
			header("Location: index.php");
			
		}
		
	}
?> 
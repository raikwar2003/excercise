<?php 
	class contact
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
		
		/*function insertFeedback($postData)
		{
			
			$email = array();
			$email['email'] = $postData['email'];
			$check_email = mysqli_query($this->conn_db,"SELECT email FROM contact where email='$email[email]'");
			$result = mysqli_fetch_array($check_email,MYSQLI_ASSOC);
			if($result=='')
			{
				$sql = "INSERT INTO contact(name, email, phone, message) 
						VALUES ('$postData[name]','$postData[email]','$postData[phone]','$postData[message]')";
				
				if(!mysqli_query($this->conn_db,$sql))
				{
					echo 'Error: ' . mysqli_error($this->conn_db);
				}
				header("Location: contactus.php");
				return true;
			}
			else 
			{
				return false;
			}
		}*/
		
		
		function emailUnique($_POST)
		{
			//$email = array();
			$email['email'] = $_POST['email'];
			$check_email = mysqli_query($this->conn_db,"SELECT * FROM contact where email='$email[email]'");
			$result = mysqli_num_rows($check_email);
			if ($result<1)
			{
				return true;
			}
			else{
				return false;	
			}
		}
		
		function insertFeedback($_POST)
		{
			$sql = "INSERT INTO contact(name, email, phone, message) 
					VALUES ('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[message]')";
			
			if(!mysqli_query($this->conn_db,$sql))
			{
				echo 'Error: ' . mysqli_error($this->conn_db);
			}
			//header("Location: contactus.php");
			return true;
		}
		
	}
?> 
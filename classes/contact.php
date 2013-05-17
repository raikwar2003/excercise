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
		
		
		function emailUnique($email)
		{
			//$email = array();
			
			$check_email = mysqli_query($this->conn_db,"SELECT * FROM contact where email='$email'");
			$result = mysqli_num_rows($check_email);
			if ($result<1)
			{
				return true;
			}
			else{
				return false;	
			}
		}
		
		function insertFeedback($postData=array())
		{
			$sql = "INSERT INTO contact(name, email, phone, message) 
					VALUES ('$postData[name]','$postData[email]','$postData[phone]','$postData[message]')";
			
			if(!mysqli_query($this->conn_db,$sql))
			{
				echo 'Error: ' . mysqli_error($this->conn_db);
			}
			return true;
		}
		
	}
?> 
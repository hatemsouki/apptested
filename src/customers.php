<?php

	class Customers
	{
		private $servername = "localhost";
		private $username 	= "root";
		private $password 	= "";
		private $database 	= "testing";
		public  $con;


		// Database Connection 
		public function __construct()
		{
			$this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
			if(mysqli_connect_error()) {
				trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
			}else{
				return $this->con;
			}
		}

		// Insert customer data into customer table
		public function insertData($post)
		{
			$name = $this->con->real_escape_string($post['name']);
			$email = $this->con->real_escape_string($post['email']);
			$username = $this->con->real_escape_string($post['username']);
			$password = $this->con->real_escape_string(md5($post['password']));
			$query="INSERT INTO customers(name,email,username,password) VALUES('$name','$email','$username','$password')";
			$sql = $this->con->query($query);
			
			return $sql;
		}

		// Fetch customer records for show listing
		public function displayData()
		{
			$query = "SELECT * FROM customers";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$data = array();
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			}else{
				return null; 
			}
		}

		// Fetch single data for edit from customer table
		public function displyaRecordById($id)
		{
			$query = "SELECT * FROM customers WHERE id = '$id'";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			}else{
				echo "Record not found";
			}
		}

		// Update customer data into customer table
		public function updateRecord($postData)
		{
			$name = $this->con->real_escape_string($postData['name']);
			$email = $this->con->real_escape_string($postData['email']);
			$username = $this->con->real_escape_string($postData['username']);
			$id = $this->con->real_escape_string($postData['id']);
			if (!empty($id) && !empty($postData)) {
				$query = "UPDATE customers SET name = '$name', email = '$email', username = '$username' WHERE id = '$id'";
				$sql = $this->con->query($query);
			
				return $sql;
			}
			
		}


		// Delete customer data from customer table
		public function deleteRecord($id)
		{
			$query = "DELETE FROM customers WHERE id = ".$id;
			$sql = $this->con->query($query);
			return $sql;

		
		}

	}
?>
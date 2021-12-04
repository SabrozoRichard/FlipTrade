<?php 

class Signup
{
	private $error = "";

	public function evaluate($data)
	{
		foreach ($data as $key => $value) {
			# code...
			if(empty($value)) 
			{
				# code...
				$this->error = $this->error . $key . " is empty!<br>";
			}

			if($key == "fistname") 
			{
				# code...
				// check for first name is numberic input
				// check if there is a space
				if (is_numeric($value)) {
					# code...
					$this->error = $this->error . "First name can't be a number!<br>";
				}
				if (strstr($value, " ")) {
					# code...
					$this->error = $this->error . "First name can't have spaces!<br>";
				}

			}

			if($key == "lastname") 
			{
				# code...
				// check for last name if numeric input
				//check if there is a space 
				if (is_numeric($value)) {
					# code...
					$this->error = $this->error . "Last name can't be a number!<br>";
				}
				if (strstr($value, " ")) {
					# code...
					$this->error = $this->error . "Last name can't have spaces!<br>";
				}

			}
			if($key == "email") 
			{
				# code...
				// check for email address is valid
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
					
					$this->error = $this->error . " Invalid email address!<br>";
				}
			}
		}
		if ($this->error == "") 
		{
			//no error
			$this->create_user($data);
		}else
		{
			return $this->error;
		}
	}


	public function create_user($data)
	{
		$firstname = ucfirst($data['firstname']);
		$lastname = ucfirst($data['lastname']);
		$email = $data['email'];
		$password = $data['password'];
		$address = $data['address'];
		$gender = $data['gender'];


		//created these by php
		$url_address = strtolower($firstname) . "." . strtolower($lastname);

		$userid = $this->create_userid();


		$query = "insert into tbl_user 
		(userid,firstname,lastname,email,password,address,gender,url_address)
		values
		('$userid','$firstname','$lastname','$email','$password','$address','$gender','$url_address')";

		// echo $query;
		$DB = new Database();
		$DB->save($query);
	}

	private function create_userid()
	{
		$length = rand(4,19);
		$number = "";
		for ($i=0; $i < $length; $i++) { 
			# code...
			$new_rand = rand(0,9);

			$number = $number . $new_rand;
		}
		return $number;
	}


}

 ?>
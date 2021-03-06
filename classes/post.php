<?php 


class Post
{
	private $error = "";

	public function create_post($userid, $data, $files)
	{
		if (!empty($data['post'] || !empty($files['file']['name']))) 
		{

			$myimage = "";
			$has_image = 0;

				 // check if the image is jpeg
      			if ($_FILES['file']['type'] == "image/jpeg") 
      			{
        			$allowed_size = (1024 * 1024) * 7; 
        			if ($_FILES['file']['size'] < $allowed_size) 
        			{
        				// everything is fine to upload profile
          			$myimage = "uploads/" . $_FILES['file']['name'];
          			move_uploaded_file($_FILES['file']['tmp_name'], $myimage);
          			$image = new Image();
          			
          			$has_image = 1;

	          			if (file_exists($myimage))
	          			{
				          	$post = addslashes($data['post']);
				          	$quantity = addslashes($data['quantity']);
							$categories = addslashes($data['categories']);
							$title = addslashes($data['title']);
							$location = addslashes($data['location']);
							$variant = addslashes($data['variant']);
							$status = addslashes($data['status']);

							$postid = $this->create_postid();

							$query = "insert into tbl_trade (userid,postid,title,categories,location,post,posted_img,has_image,variant,status,quantity) values ('$userid','$postid','$title','$categories','$location','$post','$myimage','$has_image','$variant','$status','$quantity')";
							$DB = new Database();
							$DB->save($query);
							header(("Location: profile.php"));
            				die;
          				}
          			}else{
			            echo "<br><br><br><br><div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
			            echo "the following errors occured: <br><br>";
			            echo "please add a valid image!";
			            echo "</div>";
			        }
        		}else{
			        echo "<br><br><br><br><div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
			        echo "the following errors occured: <br><br>";
			        echo "only images of jpeg are allowed!";
			        echo "</div>";
			      }
        }else{
			echo "<br><br><br><br><div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
		    echo "the following errors occured: <br><br>";
		    echo "only image of size 3MB or lower are allowed!";
		    echo "</div>";
		}
	}
		
		
	public function edit_post($data, $files)
	{	
		$errors = array();	
		if (!empty($data['post'] || !empty($files['file']['name']))) 
		{

			$myimage = "";
			$has_image = 0;

			if (isset($_FILES['file']['name']) != "")
				{
					// check if the image is jpeg
					if ($_FILES['file']['type'] == "image/jpeg") 
	      			{

		        		$allowed_size = (1024 * 1024) * 7; 

		        		if ($_FILES['file']['size'] < $allowed_size) 
		        		{
		        				// everything is fine to upload profile
		          			$myimage = "uploads/" . $_FILES['file']['name'];
		          			move_uploaded_file($_FILES['file']['tmp_name'], $myimage);
		          			$image = new Image();
		          			

			          			if (file_exists($myimage))
			          			{ 
			          				$has_image = 1;
		          				}
		          		}else{
					            echo "<br><br><br><br><div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
					            echo "the following errors occured: <br><br>";
					            // echo "please add a valid image!";
					           echo $errors[] = "please add a valid image!";
					            echo "</div>";
					        }

		        	}else{
					    echo "<br><br><br><br><div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
					    echo "the following errors occured: <br><br>";
					    // echo "only images of jpeg are allowed!";
					    echo $errors[] = "please add a valid image!";
					    echo "</div>";
					    }
		        }else{
					echo "<br><br><br><br><div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
				    echo "the following errors occured: <br><br>";
				    // echo "only image of size 3MB or lower are allowed!";
					    echo $errors[] = "please add a valid image!";

				    echo "</div>";
				}

		$post = addslashes($data['post']);
		$quantity = addslashes($data['quantity']);
		$categories = addslashes($data['categories']);
		$title = addslashes($data['title']);
		$location = addslashes($data['location']);
		$variant = addslashes($data['variant']);
		$postid = addslashes($data['postid']);

		if ($has_image) 
			{
			$query = "update tbl_trade set title = '$title' , categories = '$categories' , location = '$location' , post = '$post', posted_img = '$myimage' , variant = '$variant', quantity='$quantity' where postid = '$postid' limit 1";
			}else{
			$query = "update tbl_trade set title = '$title' , categories = '$categories' , location = '$location' , post = '$post' , variant = '$variant' ,quantity='$quantity'  where postid = '$postid' limit 1";
			}
            $DB = new Database();
            $DB->save($query);
            // header(("Location: profile.php"));
            // die;
        }	
        return $errors;
	}
				


	public function get_posts($id)
	{
		// $query = "select * from tbl_trade where userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}

	}

	public function get_tradepost($id)
	{
		$query = "select * from tbl_trade where userid = '$id' order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) 
		{
			return $result;
		}else
		{
			return false;
		}
	}

	public function get_electronics($id)
	{
		// $query = "select * from tbl_trade where categories = 'Electronic' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Electronic' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}

	}
	public function get_apparel($id)
	{
		// $query = "select * from tbl_trade where categories = 'Apparel' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Apparel' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}
	}
	public function get_entertainment($id)
	{
		// $query = "select * from tbl_trade where categories = 'Entertainment' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Entertainment' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}
	}
	public function get_game($id)
	{
		// $query = "select * from tbl_trade where categories = 'Games' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Games' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}
	}
	public function get_hobbies($id)
	{
		// $query = "select * from tbl_trade where categories = 'Hobbies' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Hobbies' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}
	}
	public function get_home($id)
	{
		// $query = "select * from tbl_trade where categories = 'Home' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Home' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}
	}
	public function get_instrument($id)
	{
		// $query = "select * from tbl_trade where categories = 'Instrument' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Instrument' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}
	}
	public function get_pets($id)
	{
		// $query = "select * from tbl_trade where categories = 'Pets' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Pets' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}
	}
	public function get_sport($id)
	{
		// $query = "select * from tbl_trade where categories = 'Sports' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Sports' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}
	}
	public function get_vehicle($id)
	{
		// $query = "select * from tbl_trade where categories = 'Vehicles' && userid != $id order by id desc";
		$query = "select * from tbl_trade where status != 'sold' AND categories = 'Vehicles' && userid != $id order by id desc";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result;
		}else
		{
			return false;
		}
	}
	private function create_postid()
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


	public function get_one_posts($postid)
	{

		if (!is_numeric($postid)) {
			return false;
		}
		$query = "select * from tbl_trade where postid = '$postid' limit 1";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result) {
			return $result[0];
		}else
		{
			return false;
		}
	}	

	public function delete_post($postid)
	{

		if (!is_numeric($postid)) {
			return false;
		}

		$query = "delete from tbl_trade where postid = '$postid' limit 1";
		$DB = new Database();
		$DB->save($query);
	}


	public function i_own_post($postid,$Fliptrade_userid)
	{
		if (!is_numeric($postid)) {
			return false;
		}

		$query = "select * from tbl_trade where postid = '$postid' limit 1";
		
		$DB = new Database();
		$result = $DB->read($query);

		if (is_array($result)) {
			if ($result[0]['userid'] == $Fliptrade_userid) {
				return true;
			}
		}
		return false;
	}

	

}
?>

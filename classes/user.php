<?php 

class User
{
	public function get_data($id)
	{
		$query = "select * from tbl_user where userid = '$id' limit 1";
		$admin = "select * from admin_acccount where userid = '$id' limit 1";
		$DB = new Database();
		$result = $DB->read($query);
		$admin_r = $DB->read($admin);

		if ($result) {

			$row = $result[0];
			return $row;
		// }else if($admin_r){
		// 	$show = $admin_r[0];
		// 	return $show;
		// }
		}else
		{
			return false;
		}
	}

	public function get_user($id)
	{
		$query = "select * from tbl_user";
		$admin = "select * from admin_acccount";
		$DB = new Database();
		$result = $DB->read($query);
		$admin_r = $DB->read($admin);

		if ($result) 
		{
			return $result[0];
		// }else if($admin_r){
		// 	return $admin_r[0];
		 }
		else
		{
			return false;
		}
	}


}
 ?>

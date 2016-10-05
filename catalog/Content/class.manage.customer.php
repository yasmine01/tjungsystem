<?php
	include_once('class.database.php');

	class ManageCustomer{
		public $linker;

		function __construct(){
			$db_connection = new dbConnection();
			$this->linker = $db_connection->connect();
			return $this->linker;
		}

		function countCustomer(){
			$query = $this->linker->query("SELECT * FROM tblcustomersaccount");
			$count = $query->rowCount();
			return $count;
		}
		function listCustomer($limit1,$limit2){
			$query = $this->linker->query("SELECT * FROM tblcustomersaccount");
			$counts = $query->rowCount();
			if($counts >= 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}

		function listIdCustomer($cus){
			$query = $this->linker->query("SELECT * FROM tblcustomersaccount WHERE Id='$cus'");
			$count = $query->rowCount();
			if($count == 1){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
		function getCustomer(){
			$query = $this->linker->query("SELECT * FROM tblmaincategories");
			$counts = $query->rowCount();
			if($counts >= 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}
		function addCustomer($service_name,$subcat_name,$cat_name,$price,$description,$photo,$location){
			$query = $this->linker->prepare("INSERT INTO `tblservices` (`MainCategoriesId`,`SubCategoriesId`,`ServiceName`,`Price`,`Description`,`Photo`,`Location`) VALUES(?,?,?,?,?,?,?)");
			$values = array($cat_name,$subcat_name,$service_name,$price,$description,$photo,$location);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}
		function deleteCustomer($id){
			$query = $this->linker->query("DELETE FROM tblcustomersaccount WHERE Id='$id'");
			$counts = $query->rowCount();
			return $counts;
		}
		function editCustomer($service_id,$service_name,$subcat_name,$cat_name,$price,$description,$photo,$location){
			$query = $this->linker->query("UPDATE `tblservices` SET 
				`MainCategoriesId`='$cat_name',`SubCategoriesId`='$subcat_name',`ServiceName`='$service_name',
				`Price`='$price',`Description`='$description',`Photo`='$photo',`Location`='$location' 
				WHERE ServiceId='$service_id'");
			$count = $query->rowCount();
			return $count;
		}
		function searchCustomer($search){
			$query = $this->linker->query("SELECT * FROM tblcustomersaccount WHERE FName OR LName LIKE('%$search%') LIMIT 0,6");
			$count = $query->rowCount();
			if($count > 0){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
		function listSearchCustomer($value){
			$query = $this->linker->query("SELECT * FROM tblcustomersaccount WHERE FName OR LName LIKE('%$value%') LIMIT 0,6");
			$count = $query->rowCount();
			if($count > 0){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
	}
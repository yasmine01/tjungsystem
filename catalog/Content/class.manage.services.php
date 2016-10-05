<?php
	include_once('class.database.php');

	class ManageServices{
		public $linker;

		function __construct(){
			$db_connection = new dbConnection();
			$this->linker = $db_connection->connect();
			return $this->linker;
		}

		function countServices(){
			$query = $this->linker->query("CALL countServices()");
			$count = $query->rowCount();
			return $count;
		}
		function listServices($limit1,$limit2){
			$query = $this->linker->query("CALL listServices('$limit1','$limit2')");
			$counts = $query->rowCount();
			if($counts >= 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}

		function listIdServices($ser){
			$query = $this->linker->query("SELECT * FROM tblservices,tblsubcategories,tblmaincategories WHERE tblservices.MainCategoriesId=tblmaincategories.MainCategoriesId AND tblservices.SubCategoriesId=tblsubcategories.SubCategoriesId AND ServiceId='$ser'");
			$count = $query->rowCount();
			if($count == 1){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
		function getCategory(){
			$query = $this->linker->query("SELECT * FROM tblmaincategories");
			$counts = $query->rowCount();
			if($counts >= 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}
		function getSubCategory(){
			$query = $this->linker->query("SELECT * FROM tblsubcategories");
			$counts = $query->rowCount();
			if($counts >= 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}
		function addService($service_name,$subcat_name,$cat_name,$price,$description,$photo,$location){
			$query = $this->linker->prepare("INSERT INTO `tblservices` (`MainCategoriesId`,`SubCategoriesId`,`ServiceName`,`Price`,`Description`,`Photo`,`Location`) VALUES(?,?,?,?,?,?,?)");
			$values = array($cat_name,$subcat_name,$service_name,$price,$description,$photo,$location);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}
		function deleteServices($id){
			$query = $this->linker->query("DELETE FROM tblservices WHERE ServiceId='$id'");
			$counts = $query->rowCount();
			return $counts;
		}
		function editService($service_id,$service_name,$subcat_name,$cat_name,$price,$description,$photo,$location){
			$query = $this->linker->query("UPDATE `tblservices` SET 
				`MainCategoriesId`='$cat_name',`SubCategoriesId`='$subcat_name',`ServiceName`='$service_name',
				`Price`='$price',`Description`='$description',`Photo`='$photo',`Location`='$location' 
				WHERE ServiceId='$service_id'");
			$count = $query->rowCount();
			return $count;
		}
		function searchService($search){
			$query = $this->linker->query("SELECT * FROM tblservices WHERE ServiceName LIKE('%$search%') LIMIT 0,6");
			$count = $query->rowCount();
			if($count > 0){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
		function listSearchServices($value){
			$query = $this->linker->query("SELECT * FROM tblservices,tblsubcategories,tblmaincategories WHERE tblservices.MainCategoriesId=tblmaincategories.MainCategoriesId AND tblservices.SubCategoriesId=tblsubcategories.SubCategoriesId AND ServiceName LIKE('%$value%') LIMIT 0,6");
			$count = $query->rowCount();
			if($count > 0){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
	}
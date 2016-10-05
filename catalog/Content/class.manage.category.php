<?php
	include_once('class.database.php');

	class ManageCategory{
		public $linker;

		function __construct(){
			$db_connection = new dbConnection();
			$this->linker = $db_connection->connect();
			return $this->linker;
		}

		function countCategory(){
			$query = $this->linker->query("CALL countCategory()");
			$count = $query->rowCount();
			return $count;
		}

		function listCategory($limit1,$limit2){
			$query = $this->linker->query("CALL listCategory('$limit1','$limit2')");
			$counts = $query->rowCount();
			if($counts >= 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}

		function listIdCategory($cat){
			$query = $this->linker->query("SELECT * FROM tblmaincategories WHERE MainCategoriesId='$cat'");
			$count = $query->rowCount();
			if($count == 1){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
		function addCategory($cat_name,$base64){
			$status = 1;
			$query = $this->linker->prepare("CALL addCategory(?,?,?)");
			$values = array($cat_name,$status,$base64);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}
		function checkCat($cat_names){
			$query = $this->linker->query("SELECT * FROM tblmaincategories WHERE MainCategoriesName='$cat_names'");
			$count = $query->rowCount();
			if($count == 1){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
		function deleteCategory($id){
			$query = $this->linker->query("DELETE FROM tblmaincategories WHERE MainCategoriesId='$id'");
			$counts = $query->rowCount();
			return $counts;
		}
		function editCategory($cat_name,$cat_id,$image){
			$query = $this->linker->query("UPDATE `tblmaincategories` SET `MainCategoriesName`='$cat_name',`Images`='$image' WHERE MainCategoriesId='$cat_id'");
			$count = $query->rowCount();
			return $count;
		}
		function searchCategory($search){
			$query = $this->linker->query("SELECT * FROM tblmaincategories WHERE MainCategoriesName LIKE('%$search%') LIMIT 0,6");
			$count = $query->rowCount();
			if($count > 0){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
		function listSearchCategory($value){
			$query = $this->linker->query("SELECT * FROM tblmaincategories WHERE MainCategoriesName LIKE('%$value%') LIMIT 0,6");
			$count = $query->rowCount();
			if($count > 0){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
	}
<?php
	include_once('class.database.php');

	class ManageSubCategory{
		public $linker;

		function __construct(){
			$db_connection = new dbConnection();
			$this->linker = $db_connection->connect();
			return $this->linker;
		}

		function countSubCategory(){
			$query = $this->linker->query("SELECT NULL FROM tblsubcategories");
			$count = $query->rowCount();
			return $count;
		}

		function listSubCategory($limit1,$limit2){
			$query = $this->linker->query("SELECT * FROM tblsubcategories,tblmaincategories WHERE tblsubcategories.MainCategoriesId=tblmaincategories.MainCategoriesId ORDER BY SubCategoriesId LIMIT $limit1,$limit2");
			$counts = $query->rowCount();
			if($counts >= 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}

		function listIdSubCategory($subcat){
			$query = $this->linker->query("SELECT * FROM tblsubcategories,tblmaincategories WHERE tblsubcategories.MainCategoriesId=tblmaincategories.MainCategoriesId AND SubCategoriesId='$subcat' LIMIT 0,6");
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
		function addSubCategory($subcat_name,$cat_name,$image){
			$status = 1;

			$query = $this->linker->prepare("INSERT INTO `tblsubcategories` (`MainCategoriesId`,`SubCategoriesName`,`Image`,`Status`) 
				VALUES(?,?,?,?)");
			$values = array($cat_name,$subcat_name,$image,$status);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}
		function deleteSubCategory($id){
			$query = $this->linker->query("DELETE FROM tblsubcategories WHERE SubCategoriesId='$id'");
			$counts = $query->rowCount();
			return $counts;
		}
		function editSubCategory($subcat_id,$edit_subcat,$edit_cat,$edit_image){
			$query = $this->linker->query("UPDATE `tblsubcategories` SET `SubCategoriesName`='$edit_subcat',`MainCategoriesId`='$edit_cat',`Image`='$edit_image' WHERE SubCategoriesId='$subcat_id'");
			$count = $query->rowCount();
			return $count;
			// 	$query = $this->linker->query("UPDATE ebooks SET name='$name',subject='$subject',category='$category',download='$target' WHERE eid='$id'");
		}
		function searchSubCategory($search){
			$query = $this->linker->query("SELECT * FROM tblsubcategories WHERE SubCategoriesName  LIKE('%$search%') LIMIT 0,6");
			
			$count = $query->rowCount();
			if($count > 0){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
		function listSearchSubCategory($value){
			$query = $this->linker->query("SELECT * FROM tblsubcategories,tblmaincategories WHERE tblsubcategories.MainCategoriesId=tblmaincategories.MainCategoriesId AND SubCategoriesName  LIKE('%$value%') LIMIT 0,6");
			
			$count = $query->rowCount();
			if($count > 0){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
	}
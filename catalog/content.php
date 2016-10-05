<?php
if(isset($_GET["page"])){
if ($_GET['page']=='category') {
	include_once('Content/category.php');
}
elseif ($_GET['page']=='subcategory') {
	include_once('Content/subcategory.php');
}
elseif ($_GET['page']=='services') {
	include_once('Content/services.php');
}
elseif ($_GET['page']=='customer') {
	include_once('Content/customer.php');
}
elseif ($_GET['page']=='nailtech') {
	include_once('Content/nailtech.php');
}
else{
    include_once('Content/workbench.php');
}

}else{
	include_once('Content/workbench.php');
}
?>
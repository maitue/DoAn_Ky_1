<?php
$open="category";
 require_once __DIR__."/../../autoload/autoload.php";
$id=intval(getInput('id'));
$Editcategory=$db->fetchID("category",$id);
if (empty($Editcategory)) {
	$_SESSION['error']="Dữ liệu không tồn tại";
	redirectAdmin("category");
	}

$deletcategory=$db->delete("category",$id);
if ($deletcategory>0) {
	$_SESSION['success']="Xóa thành công";
	redirectAdmin("category");
	}else
	{
		$_SESSION['error']="Xóa thấn bại";
		redirectAdmin("category");
	}
?>

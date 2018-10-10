<?php
$open="category";
 require_once __DIR__."/../../autoload/autoload.php";
	if ($_SERVER["REQUEST_METHOD"]=="POST") {//nếu tồn tai phương thức POST
		$data=[
			"name"=>postInput('name')
		];
		$error=[];
		if (postInput('name')=='') {
			$error['name']="Mời bạn nhap đầy đủ tên danh mục";
		}
		if (empty($error)) {//nếu tồn tái biến $error thì bắt đầu inseart len database
			$isset=$db->fetchOne("category","name='".$data['name']."'");
			if (count($isset)>0) {
				$_SESSION['error']="Ten danh muc da ton tai";
			}else{
				$id_insert=$db->insert("category",$data);
				if ($id_insert>0) {
					$_SESSION['success']="Thêm mới thành công	";
					redirectAdmin("category");
				}else{
				$_SESSION['error']="Thêm mới thất bại";
					}
			}
		}
	}

?>
<?php require_once __DIR__."/../../layout/header.php";?>

		<form class="form-horizontal" action="" method="POST">
		   <div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Danh Muc San Pham</label>
		      <div class="clearfix"></div>
		       <?php if (isset($_SESSION['error'])): ?>
          	<div class="alert alert-danger">
          		<?php echo $_SESSION['error'];unset($_SESSION['error']) ?>
          	</div>
          <?php endif ?>
		      <div class="col-sm-10">
		         <input type="text" class="form-control" id="inputEmail3" placeholder="Danh Muc San Pham" name="name">
		         <?php if (isset($error['name'])): ?>
		         	<p class="text-danger"><?php echo($error['name']) ?></p>
		         <?php endif ?>
		      </div>
		   </div>
		   <div class="form-group">
		      <div class="col-sm-offset-2 col-sm-10">
		         <button type="submit" class="btn btn-success">Luu</button>
		      </div>
		   </div>
		</form>
<?php require_once __DIR__."/../../layout/footer.php"; ?>

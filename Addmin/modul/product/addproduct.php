<?php
$open="product";
 require_once __DIR__."/../../autoload/autoload.php";
 $category=$db->fetchAll("category");
	if ($_SERVER["REQUEST_METHOD"]=="POST") {//nếu tồn tai phương thức POST
		$data=[
			"name"=>postInput('name'),
			"category_id"=>postInput('category_id'),
			"price"=>postInput('price'),
			"thunbar"=>postInput('thunbar'),
			"content"=>postInput('content')
		];
		$error=[];
		if (postInput('name')=='') {
			$error['name']="Mời bạn nhap đầy đủ tên san pham";
		}
		if (postInput('category_id')=='') {
			$error['category_id']="Mời bạn chon ten danh muc";
		}
		if (postInput('price')=='') {
			$error['price']="Mời bạn nhap gia";
		}
		if (postInput('content')=='') {
			$error['content']="Mời bạn nhap noi dung";
		}
		if (! isset($_FILES['thunbar'])) {
			$error['thunbar']="Moi ban chon hinh anh";
		}
		if (empty($error)) {//nếu tồn tái biến $error thì bắt đầu inseart len database
			if (isset($_FILES['thunbar'])) {
				$file_name=$_FILES['thunbar']['name'];
				$file_tmp=$_FILES['thunbar']['tmp_name'];
				$file_type=$_FILES['thunbar']['type'];
				$file_error=$_FILES['thunbar']['error'];
				if ($file_error==0) {
					$part= ROOT."image/";
					$data['thunbar']=$file_name;

				}
			}
			$is_insert=$db->insert("product",$data);
			if ($is_insert) {
				$_SESSION['success']="Them moi thanh cong";

			}else{
				$_SESSION['error']="Them moi that bai";
			}
		}
		
	}

?>
<?php require_once __DIR__."/../../layout/header.php";?>

	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Danh muc san pham</label>
		      <div class="col-sm-10">
		         <select class="form-control col-sm-10" name="category_id" id="">
		         	<option value="">-Moi ban nhap ten danh muc-</option>
		         	<?php foreach ($category as $item): ?>
		         		<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
		         	<?php endforeach ?>
		         </select>
		         <?php if (isset($error['category_id'])): ?>
		         	<p class="text-danger"><?php echo($error['category_id']) ?></p>
		         <?php endif ?>
		      </div>
		</div>
		<div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
		      <div class="col-sm-10">
		         <input type="text" class="form-control" id="inputEmail3" placeholder="Product" name="name">
		         <?php if (isset($error['name'])): ?>
		         	<p class="text-danger"><?php echo($error['name']) ?></p>
		         <?php endif ?>
		      </div>
		</div>
		<div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">price</label>
		      <div class="col-sm-10">
		         <input type="number" class="form-control" id="inputEmail3"  name="price">
		         <?php if (isset($error['price'])): ?>
		         	<p class="text-danger"><?php echo($error['price']) ?></p>
		         <?php endif ?>
		      </div>
		</div>
		<div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Giam Gia</label>
		      <div class="col-sm-10">
		         <input type="text" class="form-control" id="inputEmail3" placeholder="10%" name="sale">
		         <?php if (isset($error['sale'])): ?>
		         	<p class="text-danger"><?php echo($error['sale']) ?></p>
		         <?php endif ?>
		      </div>
		</div>
		<div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Hinh Anh</label>
		      <div class="col-sm-10">
		         <input type="file" class="form-control" id="inputEmail3"  name="thunbar">
		         <?php if (isset($error['thunbar'])): ?>
		         	<p class="text-danger"><?php echo($error['thunbar']) ?></p>
		         <?php endif ?>
		      </div>
		</div>
		<div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
		      <div class="col-sm-10">
		        <textarea name="content" id="" cols="30" rows="5" class="form-control"></textarea>
		         <?php if (isset($error['content'])): ?>
		         	<p class="text-danger"><?php echo($error['content']) ?></p>
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

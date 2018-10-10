
<?php
$open="category";
 require_once __DIR__."/../../autoload/autoload.php";
 $category=$db->fetchAll("category");// selecte  dữ liều  
 ?>
<?php require_once __DIR__."/../../layout/header.php"; ?>

<div class="container-fluid">
          <!-- Breadcrumbs-->
    <div class="row">
        <div class="col-lg-12">
          		<h1 class="page-header">
          			Danh Sach Danh Muc
          			<a href="addcategory.php" class="btn btn-success">Them Moi</a>
          		</h1>
          		<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Admin</a>
            </li>
          
            <li class="breadcrumb-item active">Danh Muc</li>
				
          </ol>
          <div class="clearfix"></div>
          
          <?php if (isset($_SESSION['success'])): ?>
          	<div class="alert alert-success">
          		<?php echo $_SESSION['success'];unset($_SESSION['success']) ?>
          	</div>
          <?php endif ?>
          <?php if (isset($_SESSION['error'])): ?>
          	<div class="alert alert-danger">
          		<?php echo $_SESSION['error'];unset($_SESSION['error']) ?>
          	</div>
          <?php endif ?>
       	</div>
    </div>       
</div>
<div class="container">

	<div class="bs-example" data-example-id="bordered-table">
	   <table class="table table-bordered">
	      <thead>
	         <tr>
	            <th>STT</th>
	            <th>Name</th>
	            <th>create</th>
	            <th>action</th>
	         </tr>
	      </thead>
	      <tbody>
	      	<?php $stt=1; foreach ($category as $item): ?>
	      		<tr>
	            <td><?php echo $stt ?></td>
	            <td><?php echo $item['name']?></td>
	            <td><?php echo $item['created_at'] ?></td>
	            <td><a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>sua</a>
	             <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo$item['id'] ?>"><i class="fa fa-times"></i>xoa</a></td>
	         </tr>
	         
	      	<?php $stt++; endforeach ?>
	      </tbody>
	   </table>
	</div>
</div>

<?php require_once __DIR__."/../../layout/footer.php"; ?>
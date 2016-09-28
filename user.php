<?php include_once "include/header.php"; ?>
<?php
if(isset($_REQUEST['delete']))
{
	$aCon['id'] = $_REQUEST['delete'];
	$aClassDb->deleteData('users',$aCon);
	$aClassDb->sendUrl('user.php','User deleted successfully');
}
$aCon = " AND user_group_id != 1";
$aUsers = $aClassDb->getAllData("users",$aCon);
?>


<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Users <a href="add_user.php" class="text-right btn btn-small btn-primary" style="float:right;">Add User</a></h2>
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Users</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table">
<thead>
<tr><th>#</th><th>Name</th><th>Email</th><th>Action</th></tr>
</thead>
<tbody>
<?php if($aUsers) { ?>
<?php foreach($aUsers as $aKey => $aUser) { ?>
<tr>
<td><?php echo $aKey+1; ?></td>
<td><?php echo $aUser['name']; ?></td>
<td><?php echo $aUser['email']; ?></td>
<td>
<a href="add_user.php?edit=<?php echo $aUser['id']; ?>"><i class="fa fa-pencil"></i></a>
<a href="user.php?delete=<?php echo $aUser['id']; ?>" onclick="return confirm('are you sure');"><i class="fa fa-trash"></i></a>
</td>
</tr>
<?php } ?>
<?php } else { ?>
<tr>
<td colspan="4">No data found !!!</td>
<td></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<?php include_once "include/footer.php"; ?>
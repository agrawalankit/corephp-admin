<?php include_once "include/header.php"; ?>
<?php
$aErrors = $aRow = array();
$bEdit = false;
if(isset($_REQUEST['edit']))
{
	$bEdit = true;
	$aConGet['id'] = $_REQUEST['edit'];
	$aRow = $aClassDb->getDataFromId('users',$aConGet); 
}

if(isset($_POST['val']))
{
	$aVals = $_POST['val'];
	
	$aCon = "email = '".$aVals['email']."'";	
	if(isset($aVals['id']))
	{
		$aCon = "email = '".$aVals['email']."' and id != ".$aVals['id'];
	}		
	
	$aCheck = $aClassDb->countRow('users',$aCon); 
	
	if($aCheck >0)
	{
		$aErrors[] = "Dulicate Entry !!! Try another user";
	}
	else
	{
		$aVals['user_group_id'] = 2;
		$aVals['status'] = 1;
		if($aVals['password'])
		{
			$aVals['password'] = md5($aVals['password']);
		}
		if($aVals['id'])
		{
			$aWhere =  "AND id = ".$aVals['id'];
			$aClassDb->updatedData('users',$aVals,$aWhere); 
			$aClassDb->sendUrl('user.php','User update successfully');
		}
		else
		{			
			$aClassDb->addData('users',$aVals); 
			$aClassDb->sendUrl('user.php','User added successfully');			
		}
	}
	
}

?>


<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header"><?php echo $bEdit ? 'Edit' : 'Add '; ?> User</h2>
	</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6">

<?php include_once "include/error.php";  ?>
<form role="form" method="post">
<?php if($bEdit){ ?>
<input type="hidden" name="val[id]" value="<?php echo $aRow['id']; ?>">
<?php } ?>
<fieldset>
<div class="form-group">
<input class="form-control" placeholder="Name" name="val[name]" type="text" autofocus required value="<?php echo $bEdit ? $aRow['name'] : ''; ?>">
</div>
<div class="form-group">
<input class="form-control" placeholder="E-mail" name="val[email]" type="email" required value="<?php echo $bEdit ? $aRow['email'] : ''; ?>">
</div>
<div class="form-group">
<?php
if($bEdit){
?>
<input class="form-control" placeholder="Password" name="val[password]" type="password" value="">
<?php } else { ?>
<input class="form-control" placeholder="Password" name="val[password]" type="password" value="" required>
<?php } ?>
</div>
<button type="submit" class="btn btn-lg btn-success btn-block">Save</button>                       
</fieldset>
</form>	

</div>
</div>

<?php include_once "include/footer.php"; ?>
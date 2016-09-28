<?php
if(isset($_SESSION['message']) && $_SESSION['message'] != "")
{
?>
<div class="row">
<div class="span12">
<div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
<?php
$_SESSION['message'] = '';
}
?>
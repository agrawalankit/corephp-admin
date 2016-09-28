<?php
if(isset($aErrors))
{
	foreach($aErrors as $aError)
	{
	?>
	<div class="alert alert-error"><?php echo $aError; ?></div>
	<?php
	}
}
?>
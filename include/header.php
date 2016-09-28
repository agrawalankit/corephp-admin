<?php include_once "config.php"; ?>
<?php
if(!$admin_login)
{
	header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Admin</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/sb-admin-2.css" rel="stylesheet">
</head>
<body>


<div id="wrapper">

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="home.php">Simple Admin</a>
</div>


<ul class="nav navbar-top-links navbar-right">

<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu dropdown-user">
<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a><li class="divider"></li>
</li>
</ul>
</li>
</ul>


<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav navbar-collapse">
<ul class="nav" id="side-menu">
<li><a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
<li><a href="user.php"><i class="fa fa-user fa-fw"></i> Users</a></li>
</ul>
</div>
</div>
</nav>

<div id="page-wrapper"><br>
<?php include_once "message.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Song App</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="<?= base_url();?>css/sweetalert.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>css/dataTables.min.css">


</head>
<body class="d-flex flex-column h-100">

<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Fixed navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
      	<?php if($this->session->logged_in){ ?>
      		<ul class="navbar-nav me-auto mb-2 mb-md-0">
	          <li class="nav-item">
	            <a class="nav-link active" aria-current="page" href="<?= base_url();?>">Home</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="create">Add New Song</a>
	          </li>
	        </ul>
	        <form class="d-flex">
	          <a href="<?= base_url();?>logout" class="btn btn-outline-success" type="submit">Logout </a> 
	        </form>
      	<?php } else{ ?>
      		<ul class="navbar-nav me-auto mb-2 mb-md-0">
	        </ul>
      		<form class="d-flex">
	          <a href="<?= base_url();?>login" class="btn btn-outline-success" type="submit">Login </a> 
	        </form>
      	<?php }  ?>
        
       
      </div>
    </div>
  </nav>
</header>
<div class="container">




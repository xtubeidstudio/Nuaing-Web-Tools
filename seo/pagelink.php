<html>
<?php
$judul = " Server Header Lookup";
include '../head.php';
?>
<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Extract Page Limk </center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
<form methode="get">
Masukan Url :
<input class="form-control" type="text" name="site" autocomplete="off">
<input class="btn btn-info" type="submit" >
</form>
</div>
  		  
  	</div>
  </div>
<?php
if(isset($_GET['site']))
           {
set_time_limit(0);
ignore_user_abort(true);
error_reporting(0);
sleep(3);
$site = $_GET['site'];;
echo '<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Hasil </center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
<iframe  src="https://api.hackertarget.com/pagelinks/?q='.$site.'" frameborder="none" height="400">
</div>
  		  
  	</div>
  </div>
';
}
?>
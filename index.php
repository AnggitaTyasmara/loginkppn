<?php 
   session_start();
   if (!isset($_SESSION['nip']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Menu Internal KPPN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	
</head>

<style>
	body {
		background-image: url('img/background_login.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		background-position: center;
		height: 80%;
	}
</style>

<body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<form class="border shadow p-3 rounded"
      	      action="php/check-login.php" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3">LOGIN</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="nip" 
		           class="form-label">NIP</label>
		    <input type="text" 
		           class="form-control" 
		           name="nip" 
		           id="nip">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		  </div>
		  <div class="mb-1">
		    <label class="form-label">Select User Type:</label>
		  </div>
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="pegawai">Pegawai</option>
			  <option value="admin">Admin</option>
		  </select>
		 
		  <button type="submit" 
		          class="btn btn-warning">LOGIN</button>
		</form>
      </div>
</body>
</html>
<?php }else{
	header("Location: home.php");
} ?>
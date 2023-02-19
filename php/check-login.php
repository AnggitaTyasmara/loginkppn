<?php  
session_start();
include "../db_conn.php";

if (isset($_POST['nip']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$nip = test_input($_POST['nip']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($nip)) {
		header("Location: ../index.php?error=NIP diperlukan");
	}else if (empty($password)) {
		header("Location: ../index.php?error=Password diperlukan");
	}else {


        
        $sql = "SELECT * FROM tabel_pegawai WHERE nip='$nip' AND password='$password' AND status='Aktif'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password && $row['role'] == $role) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['nip'] = $row['nip'];

        		header("Location: ../home.php");

        	}else {
        		header("Location: ../index.php?error=NIP atau Password anda salah");
        	}
        }else {
        	header("Location: ../index.php?error=NIP atau Password salah atau Akun anda tidak Aktif");
        }

	}
	
}else {
	header("Location: ../index.php");
}
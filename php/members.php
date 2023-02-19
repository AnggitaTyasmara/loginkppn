<?php  

if (isset($_SESSION['nip']) && isset($_SESSION['id'])) {
    
    $sql = "SELECT * FROM tabel_pegawai ORDER BY id ASC";
    $res = mysqli_query($conn, $sql);
}else{
	header("Location: index.php");
} 
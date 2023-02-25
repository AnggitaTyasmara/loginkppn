<?php 
session_start();
if (isset($_SESSION['id']) && 
    isset($_SESSION['role'])) {

      if ($_SESSION['role'] == 'admin') {
      
        include "db_conn.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $role = $_POST['role'];
          $nip = $_POST['nip'];
          $password = $_POST['password'];
          $nama = $_POST['nama'];
          $nik = $_POST['nik'];
          $unit = $_POST['unit'];
          $email = $_POST['email'];
          $status = $_POST['status'];
          $nohp = $_POST['nohp'];
          
          if (empty($nip)) {
            $errors[] = "NIP harus diisi.";
          }
          if (empty($password)) {
            $errors[] = "Password harus diisi.";
          }
          if (empty($nama)) {
            $errors[] = "Nama harus diisi.";
          }
          if (empty($nik)) {
            $errors[] = "NIK harus diisi.";
          }
          if (empty($email)) {
            $errors[] = "Email harus diisi.";
          }
          if (empty($nohp)) {
            $errors[] = "Nomor HP harus diisi.";


          // Jika tidak ada error, tambahkan data ke database
          if (empty($errors)) {
            $sql = "INSERT INTO tabel_pegawai (role, nip, password, nama, nik, unit, email, status, nohp) VALUES ('$role', '$nip', '$password', '$nama', '$nik', '$unit', '$email', '$status', '$nohp')";
        
            if ($conn->query($sql) === true) {
                echo "Data berhasil ditambahkan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
        }
      }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Pegawai</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php ?>
     <div class="container mt-5">
        <a href="home.php"
           class="btn btn-dark">Go Back</a>

        <form method="POST"
              class="shadow p-3 mt-5 form-w">
        <h3>Tambah Pegawai</h3><hr>
        <?php if (!empty($errors)) : ?>
        <div class="errors">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div class="mb-1">
		    <label class="form-label">Role</label>
        </div>
        <div class="input-group">
        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="role" id="role">
            <option selected value="pegawai">Pegawai</option>
            <option value="admin">Admin</option>
        </select>
        </div>
        <div class="mb-1">
          <label class="form-label">NIP</label>
          <input type="text" 
                 class="form-control"
                 value="<?php echo isset($_POST['nip']) ? $_POST['nip'] : ''; ?>" required
                 name="nip"
                 placeholder="Masukkan NIP">
        </div>
        <div class="mb-1">
          <label class="form-label">Password</label>
          <input type="text" 
                 class="form-control"
                 value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" required
                 name="password"
                 placeholder="Masukkan Password">
        </div>
        <div class="mb-1">
          <label class="form-label">Nama</label>
          <input type="text" 
                 class="form-control"
                 value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>" required
                 name="nama"
                 placeholder="Masukkan Nama">
        </div>
        <div class="mb-3">
          <label class="form-label">NIK</label>
          <input type="text" 
                 class="form-control"
                 value="<?php echo isset($_POST['nik']) ? $_POST['nik'] : ''; ?>" required
                 name="nik"
                 placeholder="Masukkan NIK">
        </div>
        <div class="mb-1">
        <label class="form-label">Unit</label>
        </div>
        <div class="input-group">
        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="unit" id="unit">
            <option selected value="Sub Bagian Umum">Sub Bagian Umum</option>
            <option value="Seksi Pencairan Dana">Seksi Pencairan Dana</option>
            <option value="Seksi Bank">Seksi Bank</option>
            <option value="Seksi Manajemen Satker dan Kepatuhan Internal">Seksi Manajemen Satker dan Kepatuhan Internal</option>
            <option value="Seksi Verifikasi dan Akuntansi">Seksi Verifikasi dan Akuntansi</option>
            <option value="Fungsional">Fungsional</option>
        </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="text" 
                 class="form-control"
                 value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required
                 name="email"
                 placeholder="Masukkan Email">
        </div>
        <div class="mb-1">
        <label class="form-label">Status</label>
        </div>
        <div class="input-group">
        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="status" id="status">
            <option selected value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Nomor Hp</label>
          <input type="text" 
                 class="form-control"
                 value="<?php echo isset($_POST['nohp']) ? $_POST['nohp'] : ''; ?>" required
                 name="nohp"
                 placeholder="Masukkan Nomor HP">
        </div><br><hr>
      <button type="submit" class="btn btn-primary">Tambah</button>
     </form>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>
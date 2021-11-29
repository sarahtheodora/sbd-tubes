<?php
	require_once 'includes/koneksi.php';
?>

<?php
	$username = $_POST['user'];
    $password = md5($_POST['pass']);
	$nama = $_POST['name'];
    
	if($_POST['pass']!==$_POST['confirm_pass']){
		header("Location:registrasi.php?alert=pass_harus_sama");die;
	}

	$query = "SELECT * FROM user";
	$hasil = mysqli_query($koneksi, $query);
	foreach($hasil as $data){
		if($username==$data['username']){
			header("Location:registrasi.php?alert=username_sudah_ada");die;
		}
	}

	$sql = "INSERT INTO user (username,password,nama_user,level) VALUES ('$username', '$password', '$nama', 1)";

	$query2 = "SELECT * FROM user ORDER BY id_user DESC LIMIT 1;";
	$hasil2 = mysqli_query($koneksi, $query2);
	foreach($hasil2 as $data2){
		$id = $data2['id_user']+1;
	}

	if ($koneksi->query($sql)===TRUE){
		$_SESSION['id_user'] = $id;
		$_SESSION['nama_user'] = $nama;
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header("Location:login.php?alert=akun_terdaftar");
	} else{
		echo "Terjadi Kesalahan: ".$sql."<br/>".$koneksi->error;
	}

	$koneksi->close();
?>

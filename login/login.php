<?php
include('koneksi.php');
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password']; 
	$sql = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'") or die(mysql_error());
	if(mysql_num_rows($sql) == 0){
		echo 'User tidak ditemukan';
	}else{
		$row = mysql_fetch_assoc($sql);
		if($row['level'] == 1){
			$_SESSION['admin']=$user;
			echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="admin/index.php";</script>';
		}else{
			$_SESSION['guest']=$user;
			echo '<script language="javascript">alert("Anda berhasil Login Guest!"); document.location="guest/index.php";</script>';
		}
	}
}
?>
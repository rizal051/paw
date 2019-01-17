<?php 
include 'config.php';
$user=$_POST['username'];
$lama=$_POST['lama']);
$baru=$_POST['baru'];
$ulang=$_POST['ulang'];

$cek=mysql_query("select * from users where password='$lama' and username='$username'");
if(mysql_num_rows($cek)==1){
	if($baru==$ulang){
		$b = md5($baru);
		mysql_query("update admin set password='$b' where username='$username'");
		header("location:ganti_pass.php?pesan=oke");
	}else{
		header("location:ganti_pass.php?pesan=tdksama");
	}
}else{
	header("location:ganti_pass.php?pesan=gagal");
}

 ?>
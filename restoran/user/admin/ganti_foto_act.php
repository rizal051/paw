<?php 
include 'config.php';
$username = $_POST['username'];
$filename=$_FILES['foto']['name'];

// move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name'])or die();
// 	mysql_query("update admin set foto='$foto' where uname='$user'");


$u=mysql_query("select * from users where username='$username'");
$us=mysql_fetch_array($u);
if(file_exists("foto/".$us['foto'])){
	unlink("foto/".$us['foto']);
	move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
	mysql_query("update users set foto='$foto' where uname='$user'");
	header("location:ganti_foto.php?pesan=oke");
}else{
	move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
	mysql_query("update users set foto='$foto' where username='$username'");
	header("location:ganti_foto.php?pesan=oke");
}
?>

<?php 
session_start();
include 'admin/config.php';
$username	= $_POST['username'];
$password	= $_POST['password'];
$level		= $_POST['level'];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($query) == 0){
						header ("location:index.php?pesan=gagal");
					}else{
						$row = mysqli_fetch_assoc($query);
						
						if($row['level'] == 1 && $level == 1){
							$_SESSION['username']=$username;
							$_SESSION['level']='admin';
							header("Location: admin/index.php");
						}else if($row['level'] == 2 && $level == 2){
							$_SESSION['username']=$username;
							$_SESSION['level']='user';
							header("Location: user/user/index.php");
						}else if($row['level'] == 3 && $level == 3){
							$_SESSION['username']=$username;
							$_SESSION['level']='mahasiswa';
							header("Location: user.php");
						}else{
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
						}
					}
				
// echo $pas;
 ?>
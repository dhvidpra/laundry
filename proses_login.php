<?php 

    if($_POST){

        $username=$_POST['username'];

        $password=$_POST['password'];

        if(empty($username)){

            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";

        } elseif(empty($password)){

            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";

        } else {

            include "koneksi.php";

            $qry_login=mysqli_query($conn,"select * from user where username = '".$username."' and password = '".md5($password)."'");

            if(mysqli_num_rows($qry_login)>0){

                $dt_login=mysqli_fetch_array($qry_login);

                session_start();

                $_SESSION['id_user']=$dt_login['id_user'];

                $_SESSION['nama_user']=$dt_login['nama_user'];

                $_SESSION['role']=$dt_login['role'];

                $_SESSION['status_login']=true;

                if($dt_login['role']=="admin"){
                    header("location: home_admin.php");
                }elseif($dt_login['role']=="kasir"){
                    header("location: home_kasir.php");
                }else{
                    
                }

                

            } else {

                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";

            }

        }

    }

?>
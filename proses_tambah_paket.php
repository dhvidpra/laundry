<?php

if($_POST){

    $jenis_paket=$_POST['jenis'];
    $harga=$_POST['harga'];

    if(empty($jenis_paket)){

        echo "<script>alert('jenis paket tidak boleh kosong');location.href='tambah_paket.php';</script>";

    } elseif(empty($harga)){

        echo "<script>alert('harga tidak boleh kosong');location.href='tambah_paket.php';</script>";

    } else {

        include "koneksi.php";

        $insert=mysqli_query($conn,"insert into paket (id_paket, jenis, harga) value (NULL, '".$jenis_paket."', '".$harga."')");

        if($insert){

            echo "<script>alert('Sukses menambahkan paket');location.href='tambah_paket.php';</script>";

        } else {

            echo "<script>alert('Gagal menambahkan paket');location.href='tambah_paket.php';</script>";

        }

    }

}

?>
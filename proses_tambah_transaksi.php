<?php
include "koneksi.php";
if(isset($_POST['simpan'])){

    $id_member=$_POST['id_member'];
    $tanggal=$_POST['tgl'];
    $batas_waktu=$_POST['batas_waktu'];
    $id_user=$_POST['id_user'];
    $id_paket=$_POST['id_paket'];
    $berat=$_POST['berat'];

    if(empty($id_member)){

        echo "<script>alert('id member tidak boleh kosong');location.href='tambah_transaksi.php';</script>";

    } elseif(empty($tanggal)){

        echo "<script>alert('tanggal tidak boleh kosong');location.href='tambah_transaksi.php';</script>";

    } elseif(empty($batas_waktu)){

        echo "<script>alert('batas waktu tidak boleh kosong');location.href='tambah_transaksi.php';</script>";

    } elseif(empty($id_paket)){

        echo "<script>alert('Pilihan paket tidak boleh kosong');location.href='tambah_transaksi.php';</script>";

    } elseif(empty($berat)){

        echo "<script>alert('berat tidak boleh kosong');location.href='tambah_transaksi.php';</script>";

    } elseif(empty($id_user)){

        echo "<script>alert('Kasir tidak boleh kosong');location.href='tambah_transaksi.php';</script>";

    } else {
        //insert ke tabel transaksi dulu
        $insert=mysqli_query($conn,"insert into transaksi (id_transaksi, id_member, tgl, batas_waktu, id_user) value (NULL, '".$id_member."', '".$tanggal."', '".$batas_waktu."','".$id_user."')");
        $last_insert_id_transaksi = mysqli_insert_id($conn);
       
        if($insert == TRUE){
             //insert ke detail transaksi
            $insert_detail = mysqli_query($conn, "insert into detail_transaksi (id_detail_transaksi, id_transaksi, id_paket, qty) value (NULL,'".$last_insert_id_transaksi."','".$_POST['id_paket']."','".$_POST['berat']."')");
            
           // echo mysqli_error($conn);
           
            echo "<script>alert('Sukses menambahkan transaksi');location.href='tambah_transaksi.php';</script>";

        } else {

            echo "<script>alert('Gagal menambahkan transaksi');location.href='tambah_transaksi.php';</script>";

        }

    }

}

?>
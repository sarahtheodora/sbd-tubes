<?php
    include "includes/koneksi.php";
    if(empty($_SESSION['nama_user'])) {
        header("Location:login.php"); die;
    }

    $user = $_SESSION['id_user'];
    $id_lukisan = $_POST['id_lukisan'];

        $query = "SELECT * FROM favorit WHERE id_user = $user AND id_lukisan = $id_lukisan";
        $hasil = mysqli_query($koneksi, $query);
        if($hasil->num_rows == 0){
            $sql1 = "INSERT INTO favorit (id_user,id_lukisan) VALUES ('$user','$id_lukisan')";
            if ($koneksi->query($sql1)===TRUE){
                header("Location:favorit.php");
            }
        }else{
            $sql2 = "DELETE FROM favorit WHERE id_user = $user AND id_lukisan = $id_lukisan";
            if ($koneksi->query($sql2)===TRUE){
                header("Location:lukisan.php?id_lukisan=$id_lukisan");
            }
        }
?>
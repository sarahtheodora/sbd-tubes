<?php
    include("includes/koneksi.php");
    $user = $_SESSION['id_user'];
    $id_fav = $_GET['id_favorit'];
        $sql = "DELETE FROM favorit WHERE id_favorit = $id_fav AND id_user = $user";
        if ($koneksi->query($sql)===TRUE){
            header("Location:favorit.php");
        }
?>
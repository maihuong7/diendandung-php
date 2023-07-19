<?php
      session_start();
      $conn = mysqli_connect("localhost","root","","diengiadung");
      mysqli_set_charset($conn, 'UTF8');
      $noidung = $_POST['noidung'];
      $id = $_POST['idsach'];
     $ids = $_POST['idrep'];
      $sql = "INSERT INTO replycmt( iduser,idrep,noidung,idsp) VALUES ($_SESSION[id],$ids,'$noidung',$id)";   
      $kq = mysqli_query($conn,$sql);
?>
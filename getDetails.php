<?php
include "koneksi.php";

$request = $_POST['request']; // request

// Get username list
if($request == 1){
 $search = $_POST['search'];

 $query = "SELECT * FROM barang WHERE kode_barang like'%".$search."%'";
 $result = mysqli_query($con,$query);
 
 while($row = mysqli_fetch_array($result) ){
  $response[] = array("value"=>$row['id_barang'],"label"=>$row['kode_barang']);
 }

 // encoding array to json format
 echo json_encode($response);
 exit;
}

// Get details
if($request == 2){
 $userid = $_POST['userid'];
 $sql = "SELECT * FROM barang WHERE id_barang=".$userid;

 $result = mysqli_query($con,$sql); 

 $users_arr = array();

 while( $row = mysqli_fetch_array($result) ){
  $userid = $row['kode_barang'];
  $nama = $row['nama_barang'];
  $harga = $row['jual_barang'];

  $users_arr[] = array("kode_barang" => $userid, "nama" => $nama,"harga" => $harga);
 }

 // encoding array to json format
 echo json_encode($users_arr);
 exit;
}
<?php
include '../configuration/konek.php';

if (isset($_GET['add'])) {
  $nama_item = $_POST['namabrg'];
  $harga_satuan = $_POST['hargabrg'];
  $jumlah_item = $_POST['jumlahbrg'];
  $total_harga_item = $_POST['totalbrg'];

  $quer = "insert into barang(nama_item,harga_satuan,jumlah_item,total_harga_item)values('$nama_item','$harga_satuan','$jumlah_item','$total_harga_item')";
  $query = $konek->query($query);

  if ($query) {
    echo "sukses update data";
  }else{
    echo "gagal update data";
  }
}
 ?>

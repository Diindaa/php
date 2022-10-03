<?php

//array scalar (1 dimensi)
$ar_judul = ['No','Nama Bidang', 'Keterangan', 'Luas bidang', 'Keliling bidang'];

require_once 'Lingkaran.php';
require_once 'PersegiPanjang.php';
require_once 'Segitiga.php';

$lk = new Lingkaran();
$pp = new PersegiPanjang();
$st = new Segitiga();

$bangunDatar = [$lk,$pp,$st];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas5_PHP_DindaPratiwi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
   
<div class="container">
<div class="row">
<div class="col-12 pt-3">  

<div class="card mt-3">
  <div class="card-header bg-dark text-white">
    Bangun Datar
  </div>

<div class="card-body">
<!--Awal table-->
<table class="table table-striped table-bordered">
 <thead>
    <tr bgcolor="#DDA0DD">
    <?php 
    foreach($ar_judul as $judul){
    ?>
        <th><?=$judul?></th>
    <?php } ?>
    </tr>
 </thead>

 <tbody>
 <?php 
 $no=1;
 foreach($bangunDatar as $bd){
    ?>
 <tr bgcolor="#D8BFD8">
        <td><?= $no ?></td>
            <td><?= $bd->namaBidang()?></td>
            <td><?= $bd->ket()?></td>
            <td><?= $bd->luasBidang()?></td>
            <td><?= $bd->kelilingBidang()?></td>
        </tr>
        <?php $no++; } ?>
 </tbody>
 </table>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
//array scalar (1 dimensi)
$m1 = ['nim'=>'200170001','nama'=>'Anggun','nilai'=>'50'];
$m2 = ['nim'=>'200170002','nama'=>'Bobby','nilai'=>'60'];
$m3 = ['nim'=>'200170003','nama'=>'Christie','nilai'=>'85'];
$m4 = ['nim'=>'200170004','nama'=>'Dandi','nilai'=>'90'];
$m5 = ['nim'=>'200170005','nama'=>'Elsa','nilai'=>'30'];
$m6 = ['nim'=>'200170006','nama'=>'Fandi','nilai'=>'90'];
$m7 = ['nim'=>'200170007','nama'=>'Gali','nilai'=>'70'];
$m8 = ['nim'=>'200170008','nama'=>'Hardy','nilai'=>'25'];
$m9 = ['nim'=>'200170009','nama'=>'Ilmi','nilai'=>'95'];
$m10 = ['nim'=>'200170010','nama'=>'Jameta','nilai'=>'55'];

$ar_judul = ['No','NIM','Nama','Nilai','Keterangan',
'Grade','Predikat'];

//array associative
$mahasiswa= [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

//agregate function in array
$jumlah_siswa= count($mahasiswa);
$jumlah_nilai = array_column($mahasiswa,'nilai');
$total_nilai = array_sum($jumlah_nilai);
$max_nilai = max($jumlah_nilai);
$min_nilai = min($jumlah_nilai);
$rata2= $total_nilai/$jumlah_siswa;

//keterangan
$ar_ket= ['Jumlah Siswa'=>$jumlah_siswa, 
'Jumlah Nilai Tertinggi'=>$max_nilai, 
'Jumlah Nilai Terendah'=>$min_nilai, 
'Rata-Rata'=>$rata2]
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas3_PHP_DindaPratiwi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
   
<div class="container">
<div class="row">
<div class="col-12 pt-3">  

<div class="card mt-3">
  <div class="card-header bg-dark text-white">
    Daftar Nilai Mahasiswa
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
            foreach($mahasiswa as $siswa){
            //keterangan
            $keterangan= ($siswa['nilai'] >=60 ) ? 'Lulus': 'Gagal';  
            
            //grade
            if($siswa['nilai'] >=85) $grade ='A';                     
            else if($siswa['nilai'] >=70 && $siswa['nilai'] <=85) $grade ='B';
            else if($siswa['nilai'] >=60 && $siswa['nilai'] <=70) $grade ='C';
            else if($siswa['nilai'] >=35 && $siswa['nilai'] <=60) $grade ='D';
            else $grade = 'E';

            //predikat
            switch($grade){
                case 'A' : $predikat = 'Sangat Memuaskan'; break;
                case 'B' : $predikat = 'Baik'; break;
                case 'C' : $predikat = 'Cukup'; break;
                case 'D' : $predikat = 'Kurang'; break;
                default : $predikat = 'Buruk';
            }
        ?>
        <tr bgcolor="#D8BFD8">
        <td><?= $no ?></td>
            <td><?= $siswa['nim']?></td>
            <td><?= $siswa['nama']?></td>
            <td><?= $siswa['nilai']?></td>
            <td><?= $keterangan?></td>
            <td><?= $grade?></td>
            <td><?= $predikat?></td>
        </tr>
        <?php $no++; } ?>
 </tbody>

 <tfoot>
 <?php 
            foreach($ar_ket as $ket =>$hasil){
            ?>
            <tr bgcolor="#DDA0DD">
               <th colspan="6"><?=$ket?></th>
               <th colspan="6"><?=$hasil?></th>
            </tr>
            <?php } ?>
 </tfoot>

</table>
</div>
</div>
</div>
</div>
</div>
</div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
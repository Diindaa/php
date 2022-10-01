<!DOCTYPE html>
<head>
    <title>Tugas4_php_DindaPratiwi</title>
</head>
<body bgcolor="Gainsboro">
</body>
</html>

<?php 
require 'Pegawai.php';

//menciptakan object
$mn = new Pegawai('001', 'Aca', 'Manager', 'Islam', 'Menikah');
$as = new Pegawai('002', 'Bima', 'Asmen', 'Buddha', 'Menikah');
$kbg = new Pegawai('003','Cici', 'Kabag', 'Konghucu', 'Belum Menikah');
$st1 = new Pegawai('004', 'Dika', 'Staff', 'Islam', 'Belum Menikah');
$st2= new Pegawai('005', 'Eva', 'Staff', 'Islam', 'Menikah');


echo '<h3 align="center">'.Pegawai::KEPEGAWAIAN.'</h3>';
$mn->mencetak();
$as->mencetak();
$kbg->mencetak();
$st1->mencetak();
$st2->mencetak();
echo 'Jumlah Pegawai '.Pegawai::$jumlah;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas2_PHP_DindaPratiwi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">
<div class="row">
<div class="col-12">

<!-- Awal Card Form --->
<div class="card mt-3">
<div class="card-header bg-primary text-white">
 Masukkan Data Pegawai
 </div>

<div class="card-body">
<div class="container px-5 my-5">
    <form method="post" action="" id="contactForm" data-sb-form-api-token="API_TOKEN">
    <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="agama">Agama</label>
            <select class="form-select" name="tagama" id="agama" aria-label="Agama">
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="manager" value="manager" type="radio" name="tjabatan" data-sb-validations="required" />
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="asistenManager" value="asistenManager" type="radio" name="tjabatan" data-sb-validations="required" />
                <label class="form-check-label" for="asistenManager">Asisten Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="kabag" type="radio" value="kabag" name="tjabatan" data-sb-validations="required" />
                <label class="form-check-label" for="kabag">Kabag</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="staff" value="staff" type="radio" name="tjabatan" data-sb-validations="required" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="tjabatan:required">One option is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="Menikah" value="Menikah" type="radio" name="tstatus" data-sb-validations="required" />
                <label class="form-check-label" for="Menikah">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="belum" value="belum" type="radio" name="tstatus" data-sb-validations="required" />
                <label class="form-check-label" for="belum">Belum Menikah</label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="tstatus:required">One option is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jumlahAnak">Jumlah Anak</label>
            <input class="form-control" name="tjumlahAnak" id="tjumlahAnak" type="text" placeholder="Jika Belum Mempunyai Anak Isi 0" data-sb-validations="required" />
        </div>
        <div class="d-grid">
        <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </form>
</div>
</div>
</div>
<!-- Akhir Card Form --->
<div class="row">
<div class="col-12 pt-5">

<!-- Awal Card Table --->
<table class="table table-success table-striped table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Agama</th>
      <th>Jabatan</th>
      <th>Status</th>
      <th>Jumlah Anak</th>
      <th>Gaji Pokok</th>
      <th>Tunjangan Jabatan</th>
      <th>Tunjangan Keluarga</th>
      <th>Gaji Kotor</th>
      <th>Zakat Profesi</th>
      <th>Take Home Pay</th>
    </tr>
  </thead>

  <?php 
        error_reporting(0);
        //tangkap request
        
        $nama = $_POST['nama'];
        $agama = $_POST['tagama'];
        $jabatan = $_POST['tjabatan'];
        $status = $_POST['tstatus'];
        $jumlahAnak = $_POST['tjumlahAnak'];
      
        //Menentukan gaji pokok
        switch ($jabatan) {              
            case 'manager': $gajiPokok = 20000000; break;
            case 'asistenManager': $gajiPokok = 15000000; break;
            case 'kabag': $gajiPokok = 10000000; break;
            case 'staff': $gajiPokok = 4000000; break;
            default: $gajiPokok = '';
        }
        
        //Menetukan tunjangan jabatan
        $tunjab= 0.2*$gajiPokok;

        //Menentukan tunjangan keluarga
        if($status == 'Menikah'&& $jumlahAnak <= 2 && $jumlahAnak >=1)$tunkel = 0.05*$gajiPokok;
        else if($status == 'Menikah'  && $jumlahAnak >2 && $jumlahAnak <6) $tunkel = 0.1*$gajiPokok;
        else if($status == 'Menikah'  && $jumlahAnak >5) $tunkel = 0.15*$gajiPokok;
        else if ($status=='belum')$tunkel = 0;

        //Menentukan gaji kotor
        $gajiKotor= $gajiPokok+$tunjab+$tunkel;
        //$gajiKotor=900;

        //Menentukan zakat profesi
        $zapro = ($agama == 'Islam' && $gajiKotor > '6000000')? 0.025*$gajiKotor : 0;

        //Menentuka take home pay
        $thp= $gajiKotor-$zapro;
    
    
if(isset($_POST['simpan'])){ ?>
<tr>
 <td><?=$nama?></td>
 <td><?=$agama?></td>
 <td><?=$jabatan?></td>
 <td><?=$status?></td>
 <td><?=$jumlahAnak?></td>
 <td><?=number_format($gajiPokok,2,',','.')?></td>
 <td><?=number_format($tunjab,2,',','.')?></td>
 <td><?=number_format($tunkel,2,',','.')?></td>
 <td><?=number_format($gajiKotor,2,',','.')?></td>
 <td><?=number_format($zapro,2,',','.')?></td>
 <td><?=number_format($thp,2,',','.')?></td>
</tr>
<?php } ?>
</table>

</div> 
</div> 
</div> 
</div> 
 
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
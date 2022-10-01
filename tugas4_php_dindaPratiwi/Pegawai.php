<?php 
class Pegawai{

//memberi variabel
public $nip;
public $nama;
public $jabatan;
public $agama;
public $status;

//variabel konstanta & static di dalam class
static $jumlah =0;
const KEPEGAWAIAN = 'Badan Kepegawaian Daerah (BKD)';

//konstruktor
public function __construct ($nip, $nama, $jabatan, $agama, $status){
    $this->nip =$nip;
    $this->nama=$nama;
    $this->jabatan=$jabatan;
    $this->agama=$agama;
    $this->status=$status;
    self::$jumlah++;
}

//fungsi gaji pokok
public function gajiPokok($jabatan){ 
    switch($jabatan){
        case 'Manager':return 15000000; break;
        case 'Asmen': return  10000000; break;
        case 'Kabag':return 7000000; break;
        case 'Staff': return  4000000; break;
        default: return 0;
    }
      
}

//fungsi tunjangan jabatan
public function tunJab($jabatan){
    return 0.2 * $this->gajiPokok($jabatan);
}

//fungsi tunjangan keluarga
public function tunkel($jabatan){ 
    return ($this->status == 'Menikah') ? $this->gajiPokok($jabatan) * 0.1 : 0;
}

//fungsi gaji kotor
public function gator($jabatan, $status){
    return $this->gajiPokok($jabatan)+$this->tunJab($jabatan)+$this->tunkel($jabatan, $status);
}

//fungsi zakat profesi
public function zapro($jabatan ,$status, $agama){
    if($this->gator($jabatan ,$status)>6000000 && $agama=='Islam') return 0.025*$this->gator($jabatan ,$status);
}


//fungsi gaji bersih
public function gajiBersih($jabatan, $status, $agama){
    return $this->gajiPokok($jabatan)+$this->tunJab($jabatan)+$this->tunkel($jabatan, $status)-$this->zapro($jabatan ,$status, $agama);
}

//fungsi mencetak
public function mencetak (){
    echo '<b><u>'.self ::KEPEGAWAIAN.'</u></b>';
    echo'<br>NIP: '.$this->nip;
    echo'<br>Nama: '.$this->nama;
    echo'<br>Jabatan: '.$this->jabatan;
    echo'<br>Agama: '.$this->agama;
    echo'<br>Status: '.$this->status;
    echo'<br>Gaji Pokok: Rp. '.number_format($this->gajiPokok($this->jabatan), 0, ',', '.');
    echo'<br>Tunjangan Jabatan: Rp. '.number_format($this->tunJab($this->jabatan), 0, ',', '.');
    echo '<br>Tunjangan Keluarga: Rp. '.number_format($this->tunkel($this->jabatan), 0, ',', '.');
    echo '<br>Gaji Kotor: Rp. '.number_format($this->gator($this->jabatan, $this->status), 0, ',', '.');
    echo '<br>Zakat Profesi: Rp. '.number_format($this->zapro($this->jabatan, $this->status, $this->agama), 0, ',', '.');
    echo '<br>Gaji Bersih: Rp. '.number_format($this->gajiBersih($this->jabatan, $this->status, $this->agama), 0, ',', '.');
    echo'<hr/>';
}
}
?>
<?php 
require_once 'BangunDatar.php';
class Segitiga extends BangunDatar{
    protected $alas = 4;
    protected $tinggi = 5;
    protected $miring = 7;

    public function namaBidang(){
        echo 'Segitiga';
    }

    public function ket(){
        echo 'Alas: 4, Tinggi: 5, Sisi Miring: 7';
    }

    public function luasBidang(){
        return (0.5 * $this->alas * $this->tinggi);
    }

    public function kelilingBidang(){
        return ($this->alas+$this->tinggi+$this->miring);
    }
}

?>
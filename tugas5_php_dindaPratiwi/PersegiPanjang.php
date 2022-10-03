<?php 
require_once 'BangunDatar.php';
class PersegiPanjang extends BangunDatar{
    protected $panjang = 7;
    protected $lebar = 9;

    public function namaBidang(){
        echo 'Persegi Panjang';
    }

    public function ket(){
        echo 'Panjang: 7, Lebar: 9';
    }

    public function luasBidang(){
        return ($this->panjang * $this->lebar);
    }

    public function kelilingBidang(){
        return (2*($this->panjang + $this->lebar));
    }
}

?>
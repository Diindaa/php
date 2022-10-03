<?php 
require_once 'BangunDatar.php';
class Lingkaran extends BangunDatar{
    protected $jarijari = 7;
    public function namaBidang(){
        echo 'Lingkaran';
    }

    public function ket(){
        echo 'Jari-Jari: 7';
    }

    public function luasBidang(){
        return (3.14 * pow($this->jarijari,2));
    }

    public function kelilingBidang(){
        return (2*3.14*$this->jarijari);
    }
}

?>
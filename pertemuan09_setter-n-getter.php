<?php
class Produk
{
  private $judul,
    $penulis,
    $penerbit,
    $harga,
    $diskon = 0;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }
  public function getJudul()
  {
    return $this->judul;
  }
  public function setJudul($judul)
  {
    if (!is_string($judul)) {
      throw new Exception("Judul harus string");
    }
    $this->judul = $judul;
  }
  public function getPenulis()
  {
    return $this->penulis;
  }
  public function setPenulis($penulis)
  {
    $this->penulis = $penulis;
  }
  public function getPenerbit()
  {
    return $this->penerbit;
  }
  public function setPenerbit($penerbit)
  {
    $this->penerbit = $penerbit;
  }
  public function setHarga($harga)
  {
    $this->harga = $harga;
  }
  public function getHarga()
  {
    return $this->harga - (($this->harga * $this->diskon) / 100);
  }
  public function setDiskon($diskon)
  {
    $this->diskon = $diskon;
  }
  public function getDiskon($diskon)
  {
    return $this->diskon;
  }
  public function getInfoLengkap()
  {
    $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    return $str;
  }
}

class Komik extends Produk
{
  public $jmlHalaman;
  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->jmlHalaman = $jmlHalaman;
  }
  public function getInfoLengkap()
  {
    $str = "Komik : " . parent::getInfoLengkap() . " - {$this->jmlHalaman} Halaman";
    return $str;
  }
}

class Game extends Produk
{
  public $waktuMain;
  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->waktuMain = $waktuMain;
  }
  public function getInfoLengkap()
  {
    $str = "Game : " . parent::getInfoLengkap() . " ~ {$this->waktuMain} Jam";
    return $str;
  }
}

class CetakInfoProduk
{
  public function cetak(Produk $produk)
  {
    echo "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
  }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);



echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();

echo "<hr>";

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
echo "<hr>";


$produk2->setDiskon(50);
echo $produk2->getHarga();
echo "<hr>";


$produk1->setJudul("Naruto Shipuden");
echo $produk1->getJudul();
echo "<hr>";

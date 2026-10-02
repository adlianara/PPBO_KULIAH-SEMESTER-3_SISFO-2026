<?php
// UTS PRAKTIKUM PEMROGRAMAN BERORIENTASI OBJEK
// ADLI ANARA SOFIAN_H1101251051

// Petunjuk: Buat program PHP OOP. Simpan sebagai UTS_26_<NIM>.php .
// 1. Buat abstrak class KamarHotel dengan protected $id, $nama, dan $hargaDasar,
// constructor, getter, dan abstract method hitungTotal() dan getJenis().
// 2. Buat 3 child class
// Standard -- private $malam; total = hargaDasar + (20000 * malam)
// Deluxe -- private $malam; total = hargaDasar + (50000 * malam),
// diskon 10% jika malam > 3
// Suite -- private $malam; total = hargaDasar + (100000 * malam)
// 3. Override kedua method abstract di semua child
// 4. Instansiasi 5 objek:
// Wajib: 3 objek pertama pakai nama anda + 2 teman
// 6. Tampilkan total keseluruhan
// Bonus (+10): Method cetakDetail() tiap child

abstract class KamarHotel{
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar){
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getNama(){
        return $this->nama;
    }

    public function getHargaDasar(){
        return $this->hargaDasar;
    }

    abstract public function hitungTotal();
    abstract public function getJenis();

}

class Standard extends KamarHotel{
    private $malam;

    public function __construct($id, $nama, $hargaDasar, $malam){
        parent::__construct($id, $nama, $hargaDasar);
        $this->malam = $malam;
    }

    public function hitungTotal(){
        return $this->hargaDasar + (20000 * $this->malam);
    }

    public function getJenis(){
        return "Standard";
    }

    public function cetakDetail(){
        return "Kamar Standard - " . $this->malam . " malam";
    }
}

class Deluxe extends KamarHotel{
    private $malam;

    public function __construct($id, $nama, $hargaDasar, $malam){
        parent::__construct($id, $nama, $hargaDasar);
        $this->malam = $malam;
    }

    public function hitungTotal(){
        $total = $this->hargaDasar + (50000 * $this->malam);

        if ($this->malam > 3) {
            $total = $total * 0.90;
        }

        return $total;
    }

    public function getJenis(){
        return "Deluxe";
    }

    public function cetakDetail(){
        return "Kamar Deluxe - " . $this->malam . " malam";
    }
}

class Suite extends KamarHotel{
    private $malam;

    public function __construct($id, $nama, $hargaDasar, $malam){
        parent::__construct($id, $nama, $hargaDasar);
        $this->malam = $malam;
    }

    public function hitungTotal(){
        return $this->hargaDasar + (100000 * $this->malam);
    }

    public function getJenis(){
        return "Suite";
    }

    public function cetakDetail(){
        return "Kamar Suite - " . $this->malam . " malam";
    }
}

$kamar1 = new Standard(11, "Adli", 25000, 1);
$kamar2 = new Deluxe(10, "Rasya", 50000, 5);
$kamar3 = new Suite(12, "Raihan", 100000, 2);
$kamar4 = new Standard(13, "Hafidz", 30000, 3);
$kamar5 = new Deluxe(14, "Deriel", 60000, 2);

$kamar = [
    $kamar1,
    $kamar2,
    $kamar3,
    $kamar4,
    $kamar5
];

$totalKeseluruhan = 0;

foreach ($kamar as $data) {
    echo "ID: " . $data->getId() . "<br>";
    echo "Nama: " . $data->getNama() . "<br>";
    echo "Jenis: " . $data->getJenis() . "<br>";
    echo "Total: " . $data->hitungTotal() . "<br><br>";
    $totalKeseluruhan += $data->hitungTotal();
}

echo "Total Keseluruhan: " . $totalKeseluruhan;


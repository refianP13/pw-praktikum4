<?php 
abstract class pegawai

{
    public $Nama;
    public $TTL;
    public $Jenis_kelamin;
    public $Jabatan;
    public $Status;
    public $Gaji;
    public $list_gaji_kotor = array(
    "Junior" => 2000000,
    "Amateur" => 3500000,
    "Senior" => 5000000
  );

  abstract public function __construct($Nama,$TTL,$Jenis_kelamin,$Jabatan);

  abstract protected function hitung_Gaji();

}

class pegawai_fulltime extends pegawai
{
    public function __construct($Nama, $TTL, $Jenis_kelamin, $Jabatan)
    {
        $this->Nama = $Nama;
        $this->TTL = $TTL;
        $this->Jenis_kelamin = $Jenis_kelamin;
        $this->Jabatan = $Jabatan;
        $this->Status = "Fulltime";
    }

    public function hitung_Gaji()
    {
        return $this->list_gaji_kotor[$this->Jabatan];
    }
}

class pegawai_parttime extends pegawai
{
    public function __construct($Nama, $TTL, $Jenis_kelamin, $Jabatan)
    {
        $this->Nama = $Nama;
        $this->TTL = $TTL;
        $this->Jenis_kelamin = $Jenis_kelamin;
        $this->Jabatan = $Jabatan;
        $this->Status = "Parttime";
    }

    public function hitung_Gaji(){
        return $this->list_gaji_kotor[$this->Jabatan] / 2;
    }
}

?>
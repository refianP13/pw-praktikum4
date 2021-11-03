<?php 
include 'pegawai.php';
$load_data = array(
    new pegawai_fulltime('Irene', '11 Jan 2009', 'Perempuan', 'Senior'),
    new pegawai_parttime('Seulgi', '16 Mar 2009', 'Perempuan', 'Senior'),
    new pegawai_fulltime('Wendy', '16 Mar 2009', 'Perempuan', 'Amateur'),
    new pegawai_parttime('Joy', '17 Mar 2010', 'Perempuan', 'Amateur'),
    new pegawai_fulltime('Ruby', '16 Mar 2009', 'Perempuan', 'Junior'),
    new pegawai_parttime('Yeri', '20 Mar 2011', 'Perempuan', 'Junior'),
);
if (isset($_GET["fill"])&& $_GET["fill"] != "" ) {
    $filter =  $_GET["fill"];
    $tampung = array();
    for( $i = 0; $i < 6;  $i++){
        
        if($load_data [$i]->Status == $filter){
            array_push($tampung, $load_data [$i]);
        }
        
    }
    $load_data = $tampung;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tugas Praktikum 4</title>
</head>

<body>
    <h1>Data Karyawan Red Velvet.corp</h1>
    <form action="./" method="GET">
        <div>
            <select name="fill" id="filter">
                <option value="">All</option>
                <option value="Fulltime">Fulltime</option>
                <option value="Parttime">Parttime</option>
            </select>
        </div>
        <button type="submit">submit</button>
    </form>
    <table id="table_pegawai">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Gaji Pegawai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($load_data as $index => $data) { ?>
            <tr class="<?= $data->Status ?>">
                <td><?= $index + 1 ?></td>
                <td><?= $data->Nama ?></td>
                <td><?= $data->TTL ?></td>
                <td><?= $data->Jenis_kelamin ?></td>
                <td><?= $data->Jabatan ?></td>
                <td><?= $data->Status ?></td>
                <td><?= $data->hitung_Gaji() ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
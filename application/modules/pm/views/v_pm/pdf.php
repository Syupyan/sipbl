<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Problem Based Learning</title>
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/pdf/style.css">
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
td, th {
    border: 3px solid #dddddd;
    text-align: left;
    padding: 8px;
}
tr:nth-child(even) {
    background-color: #cccccc;
} 
</style>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="header">
            <div class="gambar">
                <img src="<?= base_url() ?>asset/img/logo/logo.png" alt="">
            </div>
            <div class="text">
                <h3>KEMENTRIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI</h3>
                <h1>POLITEKNIK NEGERI TANAH LAUT</h1>
                <h4>Jl. A. Yani No.Km.06, Pemuda, Kec. Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan 70815</h4>
                <h3>Telp (0512) 2021065</h3>
                <h3>Email : mail@politala.ac.id</h3>
            </div>
            <div></div>
        </div>
        <div class="main">
            <div class="judul">
                <div class="kiri"></div>
                <div class="text">
                    <div class="atas">
                        <h2>Problem Based Learning</h2>
                    </div>
                    <div class="bawah">
                        <h3>Nomor : </h3>
                    </div>
                </div>
                <div class="kanan"></div>
            </div>
            <div class="isi">
                <div class="text">
                    <p>
Data dari Sistem Informasi Problem Based Learning:
                    </p>
                    <ol>
                        <div class="nama">
                            <li>Nama </li>
                            <div class="isi">:&ensp;
                                <div><?= $proyek->proyek_nama ?></div>
                            </div>
                        </div>
                        <div class="alamat">
                            <li>Mata Kuliah</li>
                            <div class="isi">:&ensp; 
                                <div><?= $proyek->matakuliah_nama ?></div>
                            </div>
                        </div>
                        <?php 

$proyekku = $this->db->select('*')
->from('tbl_rpp')
->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
<?php foreach($proyekku as $rpp) ?>
                        <div class="org">
                            <li>Sponsor</li>
                            <div class="isi">:&ensp;
                                <div><?= $rpp->rpp_sponsor ?></div>
                            </div>
                        </div>
                        <div class="indpen">
                            <li>Biaya</li>
                            <div class="isi">:&ensp;
                                <div><?= $rpp->rpp_biaya_proyek ?></div>
                            </div>
                        </div>
                        <div class="ktps">
                            <li>Waktu</li>
                            <div class="isi">:&ensp;
                                <div><?= $proyek->proyek_pengajuan ?> sampai <?= formatTanggal($proyek->proyek_penyelesaian) ?></div>
                            </div>
                        </div>
                    </ol>
                    <p>
                        Data alat dan bahanyang dibutuhkan :
                    </p>
                    <table>
                    <tr>
                                  <th>No</th>
                                  <th>Nama Alat dan Bahan</th>
                                  <th>Unit</th>
                                  <th>Harga</th>
                                  <th>Jumlah</th>
                                  <th>Total</th>
                              </tr>
    <?php 

$rppku = $this->db->select('*')
->from('tbl_alat_bahan')
->join('tbl_rpp', 'tbl_alat_bahan.rpp_id=tbl_rpp.id_rpp')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
<?php $no = 1; foreach($rppku as $rpp){ ?>
    <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $rpp->ab_nama ?></td>
                                  <td><?= $rpp->ab_unit ?></td>
                                  <td>Rp. <?= number_format($rpp->ab_harga,0,',','.'); ?></td>
                                  <td><?= $rpp->ab_jumlah ?></td>
                                  <td>Rp. <?= number_format($rpp->ab_total,0,',','.'); ?></td> 
                              </tr>
  <?php $no++; } ?>
</table>
<tr>
    <?php

//  buatkan query perhitungan rpp untuk total
    $rppku = $this->db->select('*')
    ->from('tbl_alat_bahan')
    ->join('tbl_rpp', 'tbl_alat_bahan.rpp_id=tbl_rpp.id_rpp')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
    $totalku = 0;
    foreach($rppku as $rpp){
        $totalku += $rpp->ab_harga * $rpp->ab_jumlah;
    }
    $totalku = number_format($totalku,0,',','.');
 ?>
        <td width=190 class="text-bold">Total Alat dan Bahan Rp. <?php echo $totalku; ?></td>
    </tr>
                    <p>Data Mahasiswa Terlibat</p>
                    <table>
                    <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Nim</th>
                                  <th>Prodi</th>
                              </tr>
                              <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_mahasiswa', 'tbl_mahasiswa.proyek_id=tbl_proyek.id_proyek')
->join('tbl_prodi', 'tbl_mahasiswa.prodi_id=tbl_prodi.id_prodi')
->where('tbl_mahasiswa.proyek_id',$proyek->id_proyek)
->get()->result();
?>
<?php $no = 1; foreach($proyekku as $mhs){ ?>
    <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $mhs->mahasiswa_nama ?></td>
                                  <td><?= $mhs->mahasiswa_nim ?></td>
                                  <td><?= $mhs->prodi_nama ?></td>
                              </tr>
  <?php $no++; } ?>
</table>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="ttd">
                <div class="kiri"></div>
                <div class="main">
                    <div class="atas">
                        <p>KETUA PELAKSANA</p>
                    </div>
                    <div class="sign">
                    </div>
                    <div class="bawah">
                    <?php 

$proyekku = $this->db->select('*')
->from('tbl_proyek')
->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_cpo')
->where('tbl_proyek.id_proyek',$proyek->id_proyek)
->get()->result();
?>
                         <?php foreach($proyekku as $proyek){ ?>
                        <p><b><?= $proyek->nama ?></b></p>
                        <p>NIP. <?= $proyek->nik_nip ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
function formatTanggal($date){
 // ubah string menjadi format tanggal
 return date('d-m-Y', strtotime($date));
}
?>
</body>

</html>
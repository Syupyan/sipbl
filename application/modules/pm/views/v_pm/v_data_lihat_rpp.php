<?php 

$proyekku = $this->db->select('*')
->from('tbl_rpp')
->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
<?php $no = 1; foreach($proyekku as $proyek){ ?>
<?php
    // buatkan saya if else
    if($proyek->rpp_status == 'Revisi'){
    ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="<?= base_url('pm/kelola-proyek/'). $proyek->id_proyek ?>" class="btn btn-danger"><i
                            class="fas fa-fw fa-arrow-left"></i></a>
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <?php 

$proyekku = $this->db->select('*')
->from('tbl_rpp')
->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
        <?php $no = 1; foreach($proyekku as $proyek){ ?>
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ajukan RPP</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class='table table-bordered'>
                        <form method="post" enctype="multipart/form-data"
                            action="<?= base_url('pm/Data_Kelola_Proyek_Manajer/revisi_rpp') ?>">
                            <input required="" value="<?= $proyek->id_proyek ?>" name="id_proyek" type="hidden"
                                class="form-control"></input>

                            <input required="" value="<?= $proyek->id_rpp ?>" name="id_rpp" type="hidden"
                                class="form-control"></input>
                            <tr>
                                <td width=190 class="text-bold">Sponsor</td>
                                <td>
                                    <input value="<?= $proyek->rpp_sponsor ?>" name="rpp_sponsor" type="text"
                                        class="form-control" size="70"></input>
                                </td>
                            </tr>
                            <tr>
                                <td width=190 class="text-bold">Biaya</td>
                                <td>
                                    <input value="<?= $proyek->rpp_biaya_proyek ?>" name="rpp_biaya_proyek" type="text"
                                        class="form-control" size="70"></input>
                                </td>
                            </tr>
                            <tr>
                                <td width=190 class="text-bold">Klien</td>
                                <td>
                                    <input value="<?= $proyek->rpp_klien ?>" name="rpp_klien" type="text"
                                        class="form-control" size="70"></input>
                                </td>
                            </tr>
                            <tr>
                                <td width=190 class="text-bold">Tanggal Waktu Pengajuan</td>
                                <td>
                                    <input value="<?= $proyek->rpp_waktu ?>" readonly type="text"
                                        class="form-control" size="70" required></input>
                                </td>
                            </tr>
                            <tr>
                                <td width=190 class="text-bold">Komentar</td>
                                <td>
                                    <textarea readonly required=""
                                        class="form-control"><?= $proyek->rpp_komentar ?></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td width=190 class="text-bold">Status</td>
                                <td>
                                    <input value="<?= $proyek->rpp_status ?>" readonly name="rpp_waktu" type="text"
                                        class="form-control" size="70" required></input>
                                </td>
                            </tr>

                    </table>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ajukan Kembali</button>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <?php $no++; } ?>
        </div><!-- /.container-fluid -->

        <!-- /.card -->
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Monitoring</h3>
                    <div class="float-right">
        <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi1"><i class="fas fa-fw fa-info"></i></button>
                        <?php

//  buatkan query perhitungan total 
    $rppku = $this->db->select('*')
    ->from('tbl_monitoring')
    ->join('tbl_rpp', 'tbl_monitoring.rpp_id=tbl_rpp.id_rpp')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
    $total = 0;
    foreach($rppku as $rpp){
        $total += $rpp->monitoring_bobot;
    }
 ?>
                        <?php

//  buatkan query perhitungan total 
    $rppku = $this->db->select('*')
    ->from('tbl_rpp')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
?>
                        <?php foreach($rppku as $rpp){ ?>
                        <?php if($rpp->proyek_id == $proyek->id_proyek){ ?>
                        <?php if($total < 100){ ?>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-mt"><i
                                class="fas fa-fw fa-plus"></i> Tambah Data</button>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bobot</th>
                                <th>Tahapan Pengerjaan</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Tanggal Penyelesaian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

$rppku = $this->db->select('*')
->from('tbl_monitoring')
->join('tbl_rpp', 'tbl_monitoring.rpp_id=tbl_rpp.id_rpp')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                            <?php $no = 1; foreach($rppku as $mt){ ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $mt->monitoring_bobot ?>%</td>
                                <td><?= $mt->monitoring_tahapan_pengerjaan ?></td>
                                <td><?= formatTanggal($mt->monitoring_tanggal_pelaksanaan) ?></td>
                                <td><?= formatTanggal($mt->monitoring_tanggal_penyelesaian) ?></td>
                                <td>
                                    <a href="<?= base_url('pm/Data_Kelola_Proyek_Manajer/delete_mt/'). $mt->id_monitoring ?>"
                                        class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                            class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $no++;
                                    } ?>
                        </tbody>
                    </table>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <td width=190 class="text-bold">Total Bobot</td>
                            <td>
                                <input disabled type="text" value="<?php echo $total; ?>%" class="form-control"
                                    size="70"></input>
                            </td>
                        </tr>
                    </table>

                    </hr>
                </div>
            </div>
            <!-- /.card-body -->
        </div><!-- /.container-fluid -->

        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Alat dan Bahan</h3>
                    <div class="float-right">
        <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi1"><i class="fas fa-fw fa-info"></i></button>
                        <?php

//  buatkan query perhitungan rpp untuk total
    $rppku = $this->db->select('*')
    ->from('tbl_alat_bahan')
    ->join('tbl_rpp', 'tbl_alat_bahan.rpp_id=tbl_rpp.id_rpp')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
    $total = 0;
    foreach($rppku as $rpp){
        $total += $rpp->ab_harga * $rpp->ab_jumlah;
    }
    $total;
 ?>
                        <?php

//  buatkan query perhitungan total 
    $rppku = $this->db->select('*')
    ->from('tbl_rpp')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
?>
                        <?php foreach($rppku as $rpp){ ?>
                        <?php if($rpp->proyek_id == $proyek->id_proyek){ ?>
                        <?php 

$proyekku = $this->db->select('*')
->from('tbl_rpp')
->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                        <?php $no = 1; foreach($proyekku as $proyek1){ ?>
                        <?php if($proyek1->rpp_biaya_proyek - 1 >= $total){ ?>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i
                                class="fas fa-fw fa-plus"></i> Tambah Data</button>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
 </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alat dan Bahan</th>
                                <th>Unit</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td>
                                    <button title="Edit Alat dan Bahan" id="<?= $rpp->id_ab ?>"
                                        class="btn btn-primary btn-edit1"><i class="fas fa-fw fa-edit"></i></button>
                                    <a href="<?= base_url('pm/Data_Kelola_Proyek_Manajer/delete_alat/').$rpp->id_ab ?>"
                                        class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                            class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $no++;
                                    } ?>
                        </tbody>
                    </table>
                    <hr>
                    <table class="table table-bordered">
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
                            <td width=190 class="text-bold">Total Alat dan Bahan</td>
                            <td>
                                <input disabled type="text" value="Rp. <?php echo $totalku; ?>" class="form-control"
                                    size="70"></input>
                            </td>
                        </tr>
                        <tr>

                            <?php

//  buatkan query perhitungan rpp untuk total
    $rppku = $this->db->select('*')
    ->from('tbl_rpp')
    ->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
    $totalku1 = 0; 
    foreach($rppku as $rpp){
        $totalku1 += $rpp->rpp_biaya_proyek - $total;
    }
    $totalku1 = number_format($totalku1,0,',','.');
 ?>
                            <td width=190 class="text-bold">Total Modal RPP</td>
                            <td>
                                <input disabled type="text" value="Rp. <?php echo $totalku1; ?>" class="form-control"
                                    size="70"></input>
                            </td>
                        </tr>
                    </table>

                    </hr>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
</div><!-- /.container-fluid -->
<!-- /.content -->
<?php }else{ ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="<?= base_url('pm/kelola-proyek/'). $proyek->id_proyek ?>" class="btn btn-danger"><i
                            class="fas fa-fw fa-arrow-left"></i></a>
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <?php 

$proyekku = $this->db->select('*')
->from('tbl_rpp')
->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
        <?php $no = 1; foreach($proyekku as $proyek){ ?>
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ajukan RPP</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class='table table-bordered'>
                        <input required="" value="<?= $proyek->id_proyek ?>" name="id_proyek" type="hidden"
                            class="form-control"></input>

                        <tr>
                            <td width=190 class="text-bold">Sponsor</td>
                            <td>
                                <input disabled value="<?= $proyek->rpp_sponsor ?>" name="rpp_sponsor" type="text"
                                    class="form-control" size="70"></input>
                            </td>
                        </tr>
                        <tr>
                            <td width=190 class="text-bold">Biaya</td>
                            <td>
                                <input disabled value="<?= $proyek->rpp_biaya_proyek ?>" name="rpp_biaya_proyek"
                                    type="text" class="form-control" size="70"></input>
                            </td>
                        </tr>
                        <tr>
                            <td width=190 class="text-bold">Klien</td>
                            <td>
                                <input disabled value="<?= $proyek->rpp_klien ?>" name="rpp_klien" type="text"
                                    class="form-control" size="70"></input>
                            </td>
                        </tr>
                        <tr>
                            <td width=190 class="text-bold">Tanggal Waktu Pengajuan</td>
                            <td>
                                <input value="<?= $proyek->rpp_waktu ?>" readonly name="rpp_waktu" type="text"
                                    class="form-control" size="70" required></input>
                            </td>
                        </tr>
                        <tr>
                            <td width=190 class="text-bold">Komentar CPO</td>
                            <td>
                                <textarea readonly required=""
                                    class="form-control"><?= $proyek->rpp_komentar ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td width=190 class="text-bold">Status RPP</td>
                            <td>
                                <input disabled value="<?= $proyek->rpp_status ?>" readonly name="rpp_waktu" type="text"
                                    class="form-control" size="70" required></input>
                            </td>
                        </tr>

                    </table>
                    <br>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <?php $no++; } ?>
        </div><!-- /.container-fluid -->

        <!-- /.card -->
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Monitoring</h3>
                    <div class="float-right">
                <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi1"><i class="fas fa-fw fa-info"></i></button>
                        <?php

//  buatkan query perhitungan total 
    $rppku = $this->db->select('*')
    ->from('tbl_monitoring')
    ->join('tbl_rpp', 'tbl_monitoring.rpp_id=tbl_rpp.id_rpp')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
    $total = 0;
    foreach($rppku as $rpp){
        $total += $rpp->monitoring_bobot;
    }
 ?>
                        <?php

//  buatkan query perhitungan total 
    $rppku = $this->db->select('*')
    ->from('tbl_rpp')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
?>
                        <?php foreach($rppku as $rpp){ ?>
                        <?php if($rpp->proyek_id == $proyek->id_proyek){ ?>
                        <?php if($total < 100){ ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bobot</th>
                                <th>Tahapan Pengerjaan</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Tanggal Penyelesaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

$rppku = $this->db->select('*')
->from('tbl_monitoring')
->join('tbl_rpp', 'tbl_monitoring.rpp_id=tbl_rpp.id_rpp')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                            <?php $no = 1; foreach($rppku as $mt){ ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $mt->monitoring_bobot ?>%</td>
                                <td><?= $mt->monitoring_tahapan_pengerjaan ?></td>
                                <td><?= formatTanggal($mt->monitoring_tanggal_pelaksanaan) ?></td>
                                <td><?= formatTanggal($mt->monitoring_tanggal_penyelesaian) ?></td>
                            </tr>
                            <?php $no++;
                                    } ?>
                        </tbody>
                    </table>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <td width=190 class="text-bold">Total Bobot</td>
                            <td>
                                <input disabled type="text" value="<?php echo $total; ?>%" class="form-control"
                                    size="70"></input>
                            </td>
                        </tr>
                    </table>

                    </hr>
                </div>
            </div>
            <!-- /.card-body -->
        </div><!-- /.container-fluid -->

        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Alat dan Bahan</h3>
                    <div class="float-right">
                <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi2"><i class="fas fa-fw fa-info"></i></button>
                        <?php

//  buatkan query perhitungan rpp untuk total
    $rppku = $this->db->select('*')
    ->from('tbl_alat_bahan')
    ->join('tbl_rpp', 'tbl_alat_bahan.rpp_id=tbl_rpp.id_rpp')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
    $total = 0;
    foreach($rppku as $rpp){
        $total += $rpp->ab_harga * $rpp->ab_jumlah;
    }
    $total;
 ?>
                        <?php

//  buatkan query perhitungan total 
    $rppku = $this->db->select('*')
    ->from('tbl_rpp')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
?>
                        <?php foreach($rppku as $rpp){ ?>
                        <?php if($rpp->proyek_id == $proyek->id_proyek){ ?>
                        <?php 

$proyekku = $this->db->select('*')
->from('tbl_rpp')
->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                        <?php $no = 1; foreach($proyekku as $proyek1){ ?>
                        <?php if($proyek1->rpp_biaya_proyek >= $total){ ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alat dan Bahan</th>
                                <th>Unit</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            <?php $no++;
                                    } ?>
                        </tbody>
                    </table>
                    <hr>
                    <table class="table table-bordered">
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
                            <td width=190 class="text-bold">Total Alat dan Bahan</td>
                            <td>
                                <input disabled type="text" value="Rp. <?php echo $totalku; ?>" class="form-control"
                                    size="70"></input>
                            </td>
                        </tr>
                        <tr>

                            <?php

//  buatkan query perhitungan rpp untuk total
    $rppku = $this->db->select('*')
    ->from('tbl_rpp')
    ->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
    $totalku1 = 0; 
    foreach($rppku as $rpp){
        $totalku1 += $rpp->rpp_biaya_proyek - $total;
    }
    $totalku1 = number_format($totalku1,0,',','.');
 ?>
                            <td width=190 class="text-bold">Total Modal RPP</td>
                            <td>
                                <input disabled type="text" value="Rp. <?php echo $totalku1; ?>" class="form-control"
                                    size="70"></input>
                            </td>
                        </tr>
                    </table>

                    </hr>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- Tambah Data Prodi Modal -->
<?php }
     ?>
<?php $no++; } ?>
<!--  -->
<!-- Tambah Data Prodi Modal -->
<?php
// buatkan query builder menampilkan data rpp
$rppku = $this->db->select('*')
->from('tbl_rpp')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--  -->

            <form method="post" name="autoSumForm"
                action="<?= base_url('pm/Data_Kelola_Proyek_Manajer/add_alat_bahan') ?>">
                <div class="modal-body">
                    <?php
      foreach($rppku as $rpp){
?>
                    <input type="hidden" value="<?= $rpp->id_rpp ?>" required="" name="rpp_id"
                        class="form-control"></input>
                    <input type="hidden" value="<?= $proyek->id_proyek ?>" required="" name="id_proyek"
                        class="form-control"></input>
                    <?php } ?>
                    <div class="form-group">
                        <label for="">Nama Alat dan Bahan</label>
                        <input type="text" required="" name="ab_nama" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Unit</label>
                        <input required="" name="ab_unit" type="text" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="ab_harga" onFocus="startCalc();" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" name="ab_jumlah" onFocus="startCalc();" onBlur="stopCalc();"
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" name="ab_total" onchange="tryNumberFormat(this.form.thirdBox);"
                            class="form-control"></input>
                    </div>
                    <?= get_csrf() ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <script>
            function startCalc() {
                interval = setInterval("calc()", 1);
            }

            function calc() {
                y = document.autoSumForm.ab_harga.value;
                z = document.autoSumForm.ab_jumlah.value;

                document.autoSumForm.ab_total.value = (y * z);
            }

            function stopCalc() {
                clearInterval(interval);
            }
            </script>
            <!--  -->
        </div>
    </div>
</div>
</div>
</div>

<!-- Edit Data Prodi Modal -->
<div class="modal fade" id="modal-edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--  -->

            <form method="post" name="autoSumForm1"
                action="<?= base_url('pm/Data_Kelola_Proyek_Manajer/edit_alat_bahan') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="id_ab" required="" name="id_ab" class="form-control"></input>
                        <input type="hidden" value="<?= $proyek->id_proyek ?>" required="" name="id_proyek"
                            class="form-control"></input>
                        <label for="">Nama Alat dan Bahan</label>
                        <input type="text" required="" id="ab_nama" name="ab_nama" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Unit</label>
                        <input required="" id="ab_unit" name="ab_unit" type="text" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" id="ab_harga" name="ab_harga" onFocus="startCalc1();"
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" id="ab_jumlah" name="ab_jumlah" onFocus="startCalc1();" onBlur="stopCalc1();"
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" id="ab_total" name="ab_total" onchange="tryNumberFormat(this.form.thirdBox);"
                            class="form-control"></input>
                    </div>
                    <?= get_csrf() ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <script>
            function startCalc1() {
                interval = setInterval("calc1()", 1);
            }

            function calc1() {
                y = document.autoSumForm1.ab_harga.value;
                z = document.autoSumForm1.ab_jumlah.value;

                document.autoSumForm1.ab_total.value = (y * z);
            }

            function stopCalc1() {
                clearInterval(interval);
            }
            </script>
            <!--  -->
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $(".btn-edit1").click(function() {
        let id_ab = $(this).attr("id")
        $.get("<?= base_url('pm/Data_Kelola_Proyek_Manajer/show_alat_bahan/') ?>" + id_ab, function(
            response) {
            let result = JSON.parse(response)
            $("#modal-edit1").modal("show")
            console.log(result)
            $("#id_ab").val(result.id_ab)
            $("#ab_nama").val(result.ab_nama)
            $("#ab_unit").val(result.ab_unit)
            $("#ab_harga").val(result.ab_harga)
            $("#ab_jumlah").val(result.ab_jumlah)
            $("#ab_total").val(result.ab_total)
        })
    })

})
</script>

<!--  -->
<div class="modal fade" id="modal-tambah-mt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah monitoring</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--  -->

            <form method="post" action="<?= base_url('pm/Data_Kelola_Proyek_Manajer/add_monitoring') ?>">
                <div class="modal-body">
                    <?php 

$rppku = $this->db->select('*')
->from('tbl_rpp')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                    <?php $no = 1; foreach($rppku as $rpp){ ?>
                    <input type="hidden" value="<?= $rpp->id_rpp ?>" required="" name="rpp_id"
                        class="form-control"></input>
                    <?php } ?>
                    <div class="form-group">
                        <label for="">Bobot</label>
                        <input type="number" required="" name="monitoring_bobot" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Tahapan Pengerjaan</label>
                        <input type="text" required="" name="monitoring_tahapan_pengerjaan"
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Pengerjaan</label>
                        <input type="date" required="" name="monitoring_tanggal_pelaksanaan"
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal penyelesaian</label>
                        <input type="date" required="" name="monitoring_tanggal_penyelesaian"
                            class="form-control"></input>
                    </div>
                    <?= get_csrf() ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
            </form>


        </div>
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
    <!-- Informasi Data Modal -->
    <div class="modal fade" id="modal-informasi1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <ol>
                          <li>Bobot adalah hitungan <i>%</i> pada monitoring.</li>
                          <li>Tahapan Pengerjaan adalah hal apa yang akan dilakukaan, untuk monitoring, contohnya <i>Desain</i>.</li>
                          <li>Tanggal Pengerjaan dan Tanggal Penyelesaian adalah waktu berjalan nya monitoring.</li>
                      </ol>
                  </div>
              </div>
              <div class="modal-footer">
              </div>
          </div>
      </div>
  </div>

      <!-- Informasi Data Modal -->
      <div class="modal fade" id="modal-informasi2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <ol>
                          <li>Alat dan Bahan adalah nama hal yang dibutuhkan untuk dibeli.</li>
                          <li>Unit untuk membedakan barang yang satu dengan yang lain.</li>
                          <li>Harga adalah suatu nilai alat dan bahan.</li>
                      </ol>
                  </div>
              </div>
              <div class="modal-footer">
              </div>
          </div>
      </div>
  </div>

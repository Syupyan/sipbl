 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
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
          <div class="container-fluid">

             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title">Data Proyek</h3>
                        <?php foreach($proyekku1 as $rpp){ ?>
                            <?php if($rpp->rpp_status == 'Diterima'){ ?>
                                <a style="float: right;" title="Kelola Proyek" href="<?= base_url('pm/Data_Kelola_Proyek_Manajer/pdf/' .$proyek->id_proyek); ?>"><button class="btn btn-danger"><i class="fa fa-file-pdf"></i></button></a>
                 <?php } ?>
                 <?php } ?>
                    </div>
                 <!-- /.card-header -->
                 <div class="card-body table-responsive">
                     <table class='table table-bordered'>

                         <tr>
                             <td width=190 class="text-bold">Judul Proyek</td>
                             <td><input name="nama_gangguan" type="text" class="form-control" size="70"
                             readonly value="<?= $proyek->proyek_nama ?>"
                                     required ></input>
                             </td>
                         </tr>

                         <tr>
                             <td width=190 class="text-bold">Nama Pemilik</td>
                             <td>
                                 <input name="nama_gangguan" type="text" class="form-control" size="70"
                                 readonly value="<?= $proyek->proyek_pemilik ?>"
                                     required></input>
                             </td>
                         </tr>

                         <tr>
                             <td width=190 class="text-bold">Waktu</td>
                             <td>
                                 <input name="nama_gangguan" type="text" class="form-control" size="70"
                                 readonly value="<?= formatTanggal($proyek->proyek_penyelesaian) ?>"
                                     required></input>
                             </td>
                         </tr>
                         <?php foreach($proyekku1 as $rpp){ ?>
                            <?php if($rpp->rpp_status == 'Diterima'){ ?>
                                <tr>
                             <td width=190 class="text-bold">Proses Monitoring</td>
                             <td>
                             <?php

    $total = 0;
    foreach($rppku as $rpp){
        $total += $rpp->monitoring_bobot;
    }
 ?>
                                 <input type="text" class="form-control" size="70"
                                 readonly value="<?php echo $total; ?>%"
                                     required></input>
                             </td>
                         </tr>
                         <?php } ?>
                 <?php } ?>
                     </table>
                     <br>

                     <div class="row">
                         <div class="dropright d-block">
                             <button class="btn1 mb-2 mb-md-0 btn1-primary dropdown-toggle" type="button"
                                 id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">
                                 <i class="fa fa-edit"> RPP Proyek</i>
                             </button>
                             <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                 <a href="<?= base_url('pm/ajukan-rpp/' .$proyek->id_proyek); ?>"
                                     class="dropdown-item">Ajukan RPP</a>
                                 <a href="<?= base_url('pm/lihat-rpp/' .$proyek->id_proyek); ?>"
                                     class="dropdown-item">Lihat RPP diajukan</a>
                             </div>
                         </div>
                         <div class="dropright d-block">
                             <button class="btn1 mb-2 mb-md-0 btn1-success dropdown-toggle" type="button"
                                 id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">
                                 <i class="fa fa-edit"> Monitoring Proyek</i>
                             </button>
                             <div class="dropdown-menu dropdown-menu-left" disabled aria-labelledby="dropdownMenuButton2">
                                
                             <a href="<?= base_url('pm/data-monitoring/' .$proyek->id_proyek); ?>"
                                     class="dropdown-item">Lihat Monitoring</a>
                             </div>
                         </div>
                         <div class="dropright d-block">
                             <button class="btn1 mb-2 mb-md-0 btn1-danger dropdown-toggle" type="button"
                                 id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">
                                 <i class="fa fa-edit"> Quality Control</i>
                             </button>
                             <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton3">
                             <a href="<?= base_url('pm/data-qc/' .$proyek->id_proyek); ?>"
                                     class="dropdown-item">Lihat Quality Control</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->
         <div class="container-fluid">
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title">Hasil Review</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body table-responsive">
                 <table class='table table-bordered'>

                     <tr>
                         <td width=190 class="text-bold">Status Proyek</td>
                         <td><input name="nama_gangguan" type="text" class="form-control" size="70"
                         readonly value="<?= $proyek->proyek_status ?>" required
                                ></input>
                         </td>
                     </tr>

                     <tr>
                         <td width=190 class="text-bold">Komentar</td>
                         <td>
                             <textarea readonly type="text" class="form-control"
                                 size="70"><?= $proyek->proyek_komentar ?></textarea>
                         </td>
                     </tr>

                 </table>
             </div>
             </div>
             <!-- /.card-body -->
         </div>
         <div class="container-fluid">
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title">Detail Proyek</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body table-responsive">
                 <table class='table table-bordered'>

                     <tr>
                         <td width=190 class="text-bold">Nama Proyek</td>
                         <td><input readonly type="text" class="form-control" size="70"
                                 value="<?= $proyek->proyek_nama ?>" required
                                 ></input>
                         </td>
                     </tr>
                     <tr>
                         <td width=190 class="text-bold">Mata Kuliah</td>
                         <td><input readonly type="text" class="form-control" size="70"
                                 value="<?= $proyek->matakuliah_nama ?>" required
                                 ></input>
                         </td>
                     </tr>
                     <tr>
                         <td width=190 class="text-bold">Nama Ruangan</td>
                         <td><input readonly type="text" class="form-control" size="70"
                                 value="<?= $proyek->ruangan_nama ?>" required
                                 ></input>
                         </td>
                     </tr>
                     <tr>
                         <td width=190 class="text-bold">Nama Gedung</td>
                         <td><input readonly type="text" class="form-control" size="70"
                                 value="<?= $proyek->nama_gedung ?>" required
                                 ></input>
                         </td>
                     </tr>
                     <tr>
                         <td width=190 class="text-bold">Ruangan Fasilitas</td>
                         <td>
                             <div class="card">

                                 <div class="card-body">
                                     <p class="card-text"><?= $proyek->ruangan_fasilitas ?></p>
                                 </div>
                         </td>
                     </tr>

                     <tr>
                         <td width=190 class="text-bold">Kompetensi Proyek</td>
                         <td>
                             <textarea readonly type="text" class="form-control"
                                 size="70"><?= $proyek->proyek_kompetensi ?></textarea>
                         </td>
                     </tr>
                     <tr>
                         <td width=190 class="text-bold">Deskripsi Proyek</td>
                         <td>
                             <div class="card">

                                 <div class="card-body">
                                     <p class="card-text"><?= $proyek->proyek_deskripsi ?></p>
                                 </div>
                         </td>
                     </tr>

                     <tr>
                         <td width=190 class="text-bold">Pengusul Proyek</td>
                         <td><input readonly type="text" class="form-control" size="70"
                                 value="<?= $proyek->proyek_pemilik ?>" required
                                 ></input>
                         </td>
                     </tr>

                     <tr>
                         <td width=190 class="text-bold">Pengajuan Proyek</td>
                         <td><input readonly type="text" class="form-control" size="70"
                                 value="<?= $proyek->proyek_pengajuan ?>" required
                                 ></input>
                         </td>
                     </tr>

                     <tr>
                         <td width=190 class="text-bold">Penyelesaian Proyek</td>
                         <td><input readonly type="text" class="form-control" size="70"
                                 value="<?= $proyek->proyek_penyelesaian ?>" required
                                 ></input>
                         </td>
                     </tr>

                     <tr>
                         <td width=190 class="text-bold">Nama Proyek Manajer</td>
                         <?php $no = 1; foreach($proyekku2 as $proyek){ ?>
                         <td><input readonly type="text" class="form-control" size="70"
                                 value="<?= $proyek->nama?>" required
                                 ></input>
                         </td>
                         <?php } ?>
                     </tr>

                     <tr>
                         <td width=190 class="text-bold">Nama CPO</td>
                         <?php $no = 1; foreach($proyekku3 as $proyek){ ?>
                         <td><input readonly type="text" class="form-control" size="70"
                                 value="<?= $proyek->nama ?>" required
                                 ></input>
                         </td>
                         <?php } ?>
                     </tr>

                 </table>



             </div>
             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->
         <div class="container-fluid">
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title">Tim Mahasiswa PBL</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body table-responsive">
                 <div class="table-responsive-sm">
                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Nim</th>
                                 <th scope="col">Prodi</th>
                                 <th scope="col">Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1; foreach($proyekku4 as $proyek){ ?>
                             <tr>
                                 <th scope="row"><?= $no ?></th>
                                 <td><?= $proyek->mahasiswa_nama ?></td>
                                 <td><?= $proyek->mahasiswa_nim ?></td>
                                 <td><?= $proyek->prodi_nama ?></td>
                                 <td><button title="Detail Mahasiswa" class="btn btn-danger" data-toggle="modal"
                                         data-target="#modal-lihat-mhs<?= $proyek->id_mahasiswa ?>"><i
                                             class="fas fa-fw fa-eye"></i></button></td>
                             </tr>
                             <?php $no++; } ?>
                         </tbody>
                     </table>

                 </div>
                 </div>
                 <!-- /.card-body -->
                 <!-- Lihat Data Mahasiswa -->
                 <?php $no = 1; foreach($proyekku5 as $proyek){ ?>
                 <div class="modal fade" id="modal-lihat-mhs<?= $proyek->id_mahasiswa ?>" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <div class="form-group">
                                     <input required="" value="" id="id_mahasiswa" name="id_mahasiswa" type="hidden"
                                         readonly class="form-control" placeholder=""></input>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Nama Mahasiswa</label>
                                     <input required="" readonly value="<?= $proyek->mahasiswa_nama ?>" id="mahasiswa_nama"
                                         name="mahasiswa_nama" type="text" placeholder="Nama Mahasiswa"
                                         class="form-control"></input>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Nim</label>
                                     <input required="" readonly value="<?= $proyek->mahasiswa_nim ?>" id="mahasiswa_nim"
                                         name="mahasiswa_nim" type="text" placeholder="Nim"
                                         class="form-control"></input>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Prodi</label>
                                     <input required="" readonly value="<?= $proyek->prodi_nama ?>" id="mahasiswa_nim"
                                         name="mahasiswa_nim" type="text" placeholder="Nim"
                                         class="form-control"></input>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Jurusan</label>
                                     <input required="" readonly value="<?= $proyek->jurusan ?>" id="mahasiswa_nim"
                                         name="mahasiswa_nim" type="text" placeholder="Nim"
                                         class="form-control"></input>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Jenis Kelamin</label>
                                     <input required="" readonly value="<?= $proyek->mahasiswa_jk ?>" id="mahasiswa_nim"
                                         name="mahasiswa_nim" type="text" placeholder="Nim"
                                         class="form-control"></input>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Tanggal Lahir</label>
                                     <input required="" readonly value="<?= $proyek->mahasiswa_tanggallahir ?>"
                                         id="mahasiswa_tanggallahir" name="mahasiswa_tanggallahir" type="date"
                                         placeholder="Tanggal Lahir" class="form-control"></input>
                                 </div>

                                 <div class="form-group">
                                     <label for="">Alamat</label>
                                     <textarea required="" readonly type="text" placeholder="alamat"
                                         class="form-control"><?= $proyek->mahasiswa_alamat ?></textarea>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <?php $no++; } ?>
             <!-- Lihat data mahasiswa -->
             <!-- ###################################  MODAL Prodi   ################################ -->


 <!-- Edit Data Prodi Modal -->
 </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 <!-- Edit Data Modal -->
 <?php
function formatTanggal($date){
 // ubah string menjadi format tanggal
 return date('d-m-Y', strtotime($date));
}
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
             <a href="<?= base_url('cpo/kelola-proyek/'). $proyek->id_proyek ?>" class="btn btn-danger"><i class="fas fa-fw fa-arrow-left"></i></a>
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
        <h3 class="card-title">Ajukan RPP</h3>
        <div class="float-right">
        <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi "><i class="fas fa-fw fa-info"></i></button>
              </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Bobot</th>
                                  <th>Tahapan Pengerjaan</th>
                                  <th>Tanggal Pelaksanaan</th>
                                  <th>Tanggal Penyelesaian</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 

$rppku = $this->db->select('*')
->from('tbl_rpp')
->join('tbl_monitoring', 'tbl_rpp.id_rpp=tbl_monitoring.rpp_id')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                              <?php $no = 1; foreach($rppku as $mt){ ?>
                              <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $mt->monitoring_bobot ?></td>
                                  <td><?= $mt->monitoring_tahapan_pengerjaan ?></td>
                                  <td><?= $mt->monitoring_tanggal_pelaksanaan ?></td>
                                  <td><?= $mt->monitoring_tanggal_penyelesaian ?></td>
                                  <td><?php if ($mt->monitoring_status == 'Pelaksanaan Proyek'): ?>
                                      <center><span class="badge badge-info"><?= $mt->monitoring_status ?></span>
                                      </center>
                                      <?php elseif($mt->monitoring_status == 'Selesai'): ?>
                                      <center><span class="badge badge-success"><?= $mt->monitoring_status ?></span>
                                      </center>
                                      <?php elseif($mt->monitoring_status == 'Belum ada'): ?>
                                      <center><span class="badge badge-danger"><?= $mt->monitoring_status ?></span>
                                      </center>
                                      <?php endif ?>
                                  </td>
                                  <td>

                                                <?php if($mt->monitoring_status == 'Selesai'): ?>
                                             <?php if(empty($mt->monitoring_komentar)): ?>
                                                <button class="btn btn-primary" data-toggle="modal"
                                         data-target="#modal-edit-mt<?= $mt->id_monitoring ?>"><i
                                             class="fas fa-fw fa-edit"></i></button>
                                             <?php elseif(isset($mt->monitoring_komentar)): ?>
                                             <?php endif ?>
                                             <?php endif ?>
                                            
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
        <?php

//  buatkan query perhitungan total 
    $rppku = $this->db->select('*')
    ->from('tbl_monitoring')
    ->join('tbl_rpp', 'tbl_monitoring.rpp_id=tbl_rpp.id_rpp')
    ->where('tbl_monitoring.monitoring_status', "Selesai")
    ->where('tbl_rpp.proyek_id',$proyek->id_proyek)
    ->get()->result();
    $total = 0;
    foreach($rppku as $rpp){
        $total += $rpp->monitoring_bobot;
    }
 ?>
            <input disabled type="text" value="<?php echo $total; ?>%" class="form-control" size="70"></input>
        </td>
    </tr>
</table>

 </hr>
    </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

</div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 <!-- Tambah Data Prodi Modal -->
<?php 

$rppku = $this->db->select('*')
->from('tbl_rpp')
->join('tbl_monitoring', 'tbl_rpp.id_rpp=tbl_monitoring.rpp_id')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
                              <?php $no = 1; foreach($rppku as $mt){ ?>
<!-- Edit Data Prodi Modal -->
<div class="modal fade" id="modal-edit-mt<?= $mt->id_monitoring ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Komentar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!--  -->
      
      <form method="post" action="<?= base_url('cpo/Data_Kelola_Cpo/edit-mt') ?>">
      <div class="modal-body">
      <input type="hidden" value="<?= $proyek->id_proyek ?>" required="" name="id_proyek" class="form-control"></input>
      <input type="hidden" value="<?= $mt->id_monitoring ?>" required="" name="id_monitoring" class="form-control"></input>
      <div class="form-group">
          <label for="monitoring_status">Status</label>
      <textarea name="monitoring_komentar" class="form-control"><?= $mt->monitoring_komentar ?></textarea>
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
<?php } ?>
    <!-- Informasi Data Modal -->
    <div class="modal fade" id="modal-informasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                      <i>
                          <b>Perhatian!</b> <br>
                          <ul>
                          <li>Aksi komentar monitoring akan muncul ketika status monitoring di tahap selesai.</li>
                          </ul>
                      </i>
                  </div>
              </div>
              <div class="modal-footer">
              </div>
          </div>
      </div>
  </div>
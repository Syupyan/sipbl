 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
             <a href="<?= base_url('direktur/kelola-proyek/'). $proyek->id_proyek ?>" class="btn btn-danger"><i class="fas fa-fw fa-arrow-left"></i></a>
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
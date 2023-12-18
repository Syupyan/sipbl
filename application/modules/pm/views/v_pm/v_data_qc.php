 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
             <a href="<?= base_url('pm/kelola-proyek/'). $proyek->id_proyek ?>" class="btn btn-danger"><i class="fas fa-fw fa-arrow-left"></i></a>
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
                     <h3 class="card-title">Quality Control</h3>
                     <div class="float-right">
                     </div>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Status</th>
                                 <th>Kesesuain rencana</th>
                                 <th>Catatan</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php 

$qc = $this->db->select('*')
->from('tbl_quality_control')
->where('proyek_id',$proyek->id_proyek)
->get()->result();
?>
                             <?php $no = 1; foreach($qc as $qc1){ ?>
                             <tr>
                                 <th scope="row"><?= $no ?></th>
                                 <td><?= $qc1->qc_status  ?></td>
                                 <td><?= $qc1->qc_kesesuaian_rencana ?></td>
                                 <td><?= $qc1->qc_catatan ?></td>
                             </tr>
                             <?php $no++;
                                    } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->

 </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 <!-- Tambah Data Prodi Modal -->
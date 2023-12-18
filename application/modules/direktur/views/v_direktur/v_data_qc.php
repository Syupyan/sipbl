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
 <?php
// buatkan query builder menampilkan data rpp
$rppku = $this->db->select('*')
->from('tbl_rpp')
->where('tbl_rpp.proyek_id',$proyek->id_proyek)
->get()->result();
?>
 <div class="modal fade" id="modal-tambah-qc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Quality Control</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <!--  -->

             <form method="post" action="<?= base_url('cpo/Data_Kelola_Cpo/add_qc') ?>">
                 <div class="modal-body">

                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Kesesuain Rencana</th>
                                 <th scope="col">catatan</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                             <input type="hidden" value="<?= $proyek->id_proyek ?>" required="" name="id_proyek1" class="form-control"></input>
                             <input type="hidden" value="<?= $proyek->id_proyek ?>" required="" name="id_proyek[]"
                                     class="form-control"></input>
                                 <th scope="row">1</th>
                                 <td>
                                     <div class="form-group">
                                         <select name="qc_status[]" class="form-control">
                                             <option>Sesuai</option>
                                             <option>Tidak Sesuai</option>
                                         </select>
                                     </div>
                                 </td>
                                 <td><textarea readonly class="form-control" type="text" name="qc_kesesuaian_rencana[]"
                                        >Realiasasi Waktu Pengerjaan Proyek</textarea></td>
                                 <td><textarea class="form-control" name="qc_catatan[]"></textarea></td>
                             </tr>
                             <tr>
                             <input type="hidden" value="<?= $proyek->id_proyek ?>" required="" name="id_proyek[]"
                                     class="form-control"></input>
                                 <th scope="row">1</th>
                                 <td>
                                     <div class="form-group">
                                         <select name="qc_status[]" class="form-control">
                                             <option>Sesuai</option>
                                             <option>Tidak Sesuai</option>
                                         </select>
                                     </div>
                                 </td>
                                 <td><textarea readonly class="form-control" type="text" name="qc_kesesuaian_rencana[]"
                                         >Kesesuaian dengan spesifikasi dalam rencana pelaksanaan PBL</textarea></td>
                                 <td><textarea class="form-control" name="qc_catatan[]"></textarea></td>
                             </tr>
                             <tr>
                             <input type="hidden" value="<?= $proyek->id_proyek ?>" required="" name="id_proyek[]"
                                     class="form-control"></input>
                                 <th scope="row">1</th>
                                 <td>
                                     <div class="form-group">
                                         <select name="qc_status[]" class="form-control">
                                             <option>Sesuai</option>
                                             <option>Tidak Sesuai</option>
                                         </select>
                                     </div>
                                 </td>
                                 <td><textarea readonly class="form-control" type="text" name="qc_kesesuaian_rencana[]"
                                         >Jumlah Produk</textarea></td>
                                 <td><textarea class="form-control" name="qc_catatan[]"></textarea></td>
                             </tr>
                             <tr>
                             <input type="hidden" value="<?= $proyek->id_proyek ?>" required="" name="id_proyek[]"
                                     class="form-control"></input>
                                 <th scope="row">1</th>
                                 <td>
                                     <div class="form-group">
                                         <select name="qc_status[]" class="form-control">
                                             <option>Sesuai</option>
                                             <option>Tidak Sesuai</option>
                                         </select>
                                     </div>
                                 </td>
                                 <td><textarea readonly class="form-control" type="text" name="qc_kesesuaian_rencana[]"
                                         value="Keberfungsian / Kelaikan penggunaan">Keberfungsian / Kelaikan penggunaan</textarea></td>
                                 <td><textarea class="form-control" name="qc_catatan[]"></textarea></td>
                             </tr>
                             
                         </tbody>
                     </table>
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

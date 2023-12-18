
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
              <h3 class="card-title"><?= $title; ?></h3>
              <div class="card-tools">
                              <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi"><i class="fas fa-fw fa-info"></i></button>
                      </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Pengusul</th>
                  <th>Tanggal Usulan</th>
                  <th>Nama Mata Kuliah</th>
                  <th>Status Proyek</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($usulan1 as $usulan): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $usulan['proyek_nama'] ?></td>
                  <td><?= $usulan['proyek_pemilik'] ?></td>
                  <td><?=  date('d-m-Y',strtotime($usulan['dibuat_sejak'])) ?></td>
                  <td><?= $usulan['matakuliah_nama'] ?></td>
                  <td><?php if ($usulan['proyek_status'] == 'Menunggu menetapkan Mahasiswa dan Reviewer'): ?>
                    <center><span class="badge badge-warning"><?= $usulan['proyek_status'] ?></span></center>
                    <?php endif ?></td>
                  <td>
                    <button title="Menetapkan Mahasiswa dan Reviewer" id="<?= $usulan['id_proyek'] ?>" class="btn btn-success btn-edit1"><i class="fas fa-fw fa-clipboard"></i></button>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <!-- menetapkan mahasiswa dan reviewer Data Modal -->
    <div class="modal fade" id="modal-edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menetapkan Mahasiswa dan Reviewer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('admin/Master_Usulan/tambah_mr') ?>">
      <div class="modal-body">
          <input required="" id="id_proyek1" name="proyek_id" type="hidden" readonly class="form-control"></input>
        <div class="form-group">
            <label for="">Pilih Mahasiswa</label>
    <div class="col-md-12"> <select name="id_mahasiswa[]" id="choices-multiple-remove-button" placeholder="Maksimal 10 mahasiswa" multiple>
    <?php foreach ($mahasiswa as $mh): ?>
              <option value="<?= $mh['id_mahasiswa'] ?>"><?= $mh['mahasiswa_nama'] ?></option>
            <?php endforeach; ?>
        </select> </div>
</div>
        <div class="form-group">
          <label for="id_pengguna">Pilih Reviewer</label>
          <select name="id_pengguna" class="form-control">
          <option >Pilih Data</option>
            <?php foreach ($dosenku as $dosen): ?>
              <option value="<?= $dosen['id_pengguna'] ?>"><?= $dosen['nama'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      
      </div>
      <?= get_csrf() ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>

    <!-- Informasi Data Modal -->
    <div class="modal fade" id="modal-informasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <li>Tombol menetapkan <i class="fa  fa-clipboard" style="color: red"></i> berfungsi untuk menetapkan mahasiswa dan reviewer untuk proyek yang diusulkan.</li>
        </ol>
        <i>
            <b>Perhatian!</b> <br>
            <ul>
                <li>Mahasiswa maksimal hanya bisa 10 untuk dipilih.</li>
            </ul>
        </i>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- script menampilkan dan menambahkan data  mahasiswa dan reviewer -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-edit1").click(function(){
      let id_proyek = $(this).attr("id")
      $.get("<?= base_url('admin/Master_Usulan/show_usulan/') ?>"+id_proyek,function(response){
        let result = JSON.parse(response)
        $("#modal-edit1").modal("show")
        $("#id_proyek1").val(result.id_proyek)
        $("#proyek_nama1").val(result.proyek_nama)
      })
    })

  })
  $(document).ready(function(){
    
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
       removeItemButton: true,
       maxItemCount:10,
       searchResultLimit:10,
     }); 
    
    
});
</script>

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
              <div class="float-right">
              <button title="Informasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-informasi"><i class="fas fa-fw fa-info"></i></button>
                <button title="Tambah Prodi" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-fw fa-plus"></i> Tambah Data</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-5 float-right">
              </div>
              </div>  
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar Prodi</th>
                  <th>Prodi</th>
                  <th>Prodi Alias</th>
                  <th>Jurusan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($prodi as $po): ?>
                    <tr>
                  <th><?= $no++ ?></th>
                  <td><img src="<?= base_url('asset/img/prodi/').$po['prodi_gambar'] ?>" width="40"></td>
                  <td><?= $po['prodi_nama'] ?></td>
                  <td><?= $po['prodi_alias'] ?></td>
                  <td><?= $po['jurusan'] ?></td>
                  <td>
                    <button title="Edit Prodi" id="<?= $po['id_prodi'] ?>" class="btn btn-primary btn-edit"><i class="fas fa-fw fa-edit"></i></button>
                    <a title="Hapus Prodi" href="<?= base_url('admin/Master_Prodi/delete_Prodi/').$po['id_prodi'] ?>" class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i class="fas fa-fw fa-trash"></i></a>
                  </td>
                </tr>  

                  <?php endforeach; ?>
                
                </tbody>
              </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



<!-- ###################################  MODAL Prodi   ################################ -->

<!-- Tambah Data Prodi Modal -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/Master_Prodi/add_Prodi') ?>">
      <div class="modal-body">
        <div class="form-group">
        <label for="">Nama Prodi</label>
          <input type="text" required="" name="prodi_nama" placeholder="Nama Prodi" class="form-control"></input>
        </div>
        <div class="form-group">
        <label for="">Alias</label>
          <input required="" name="prodi_alias" type="text" placeholder="Alias" class="form-control"></input>
        </div>
          
        <div class="form-group">
          <label >kategori jurusan</label>
          <select name="jurusan" id="jurusan" class="form-control">
              <option >Komputer dan Bisnis</option>
              <option >Teknologi Rekayasa Industri</option>
              <option >Teknologi Industri Pertanian</option>
          </select>
        </div>
        
        <div class="form-group">
        <label for="">Deskripsi Prodi</label>
          <textarea class="form-control" required="" placeholder="Deskripsi Prodi" name="prodi_deskripsi"></textarea>
        </div>

        <div class="form-group">
          <label>Foto Prodi</label>
          <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>
      
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


<!-- Edit Data Prodi Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/Master_Prodi/update_Prodi') ?>">
      <div class="modal-body">
          <input required="" id="id_Prodi" name="id_Prodi" type="hidden" readonly class="form-control" placeholder="Nama Prodi"></input>
        <div class="form-group">
        <label for="">Nama Prodi</label>
          <input required="" id="prodi_nama" name="prodi_nama" type="text" class="form-control" placeholder="Nama Prodi"></input>
        </div>
        <div class="form-group">
        <label for="">Alias</label>
          <input required="" id="prodi_alias" name="prodi_alias" placeholder="Alias" class="form-control"></input>
          <small id="emailHelp" class="form-text text-muted">contoh : TKR</small>
        </div>
        <div class="form-group">
        <label for="">Deskripsi Prodi</label>
          <textarea required="" id="prodi_deskripsi" name="prodi_deskripsi" type="text" placeholder="Deskripsi Prodi" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
          <label for="id_pengguna">kategori jurusan</label>
          <select name="jurusan" id="jurusan" class="form-control">
              <option >Komputer dan Bisnis</option>
              <option >Teknologi Rekayasa Industri</option>
              <option >Teknologi Industri Pertanian</option>
          </select>
        </div>
        
        <input type="hidden" id="oldimage" name="oldimage">
        <div class="form-group">
          <label>Gambar Prodi</label>
          <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
            <small id="emailHelp" class="form-text text-muted">Masukan gambar jika ingin merubah gambar</small>
          </div>
        </div>
      </div>
      <?= get_csrf() ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ##################################  MODAL Prodi   ################################ -->

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
            <li>Tombol  <i class="fa  fa-plus" style="color: red"></i> berfungsi untuk tambah data prodi.</li>
            <li>Tombol  <i class="fa  fa-edit" style="color: red"></i> berfungsi untuk edit data prodi.</li>
            <li>Tombol  <i class="fa  fa-trash" style="color: red"></i> berfungsi untuk hapus data prodi.</li>
        </ol>
        <i>
            <b>Perhatian!</b> <br>
            <ul>
                <li>Tombol hapus <i class="fa  fa-trash" style="color: red"></i> akan tidak bisa digunakan ketika data prodi digunakan data lain </li>
                <li>Data prodi untuk saat ini bertipe tetap, tidak bisa ditambah, namun bisa dirubah</li>
            </ul>
        </i>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-edit").click(function(){
      let id_prodi = $(this).attr("id")
      $.get("<?= base_url('admin/Master_Prodi/show_Prodi/') ?>"+id_prodi,function(response){
        let result = JSON.parse(response)
        $("#modal-edit").modal("show")
        console.log(result)
        $("#id_Prodi").val(result.id_prodi)
        $("#prodi_nama").val(result.prodi_nama)
        $("#prodi_alias").val(result.prodi_alias)
        $("#prodi_deskripsi").val(result.prodi_deskripsi)
        $("#oldimage").val(result.prodi_gambar)
        $("#jurusan").val(result.jurusan)
      })
    })

  })
</script>
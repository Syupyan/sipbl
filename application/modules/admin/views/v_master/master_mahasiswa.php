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
                <button title="Tambah Mahasiswa" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-fw fa-plus"></i> Tambah Data</button>
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
                  <th>Nama</th>
                  <th>Nim</th>
                  <th>Tanggal lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Prodi</th>
                  <th>Jurusan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($mahasiswa as $mahasiswaku): ?>
                    <tr>
                  <th><?= $no++ ?></th>
                  <td><?= $mahasiswaku['mahasiswa_nama'] ?></td>
                  <td><?= $mahasiswaku['mahasiswa_nim'] ?></td>
                  <td><?= formatTanggal($mahasiswaku['mahasiswa_tanggallahir']) ?></td>
                  <td><?= $mahasiswaku['mahasiswa_jk'] ?></td>
                  <td><?= $mahasiswaku['mahasiswa_alamat'] ?></td>
                  <td><?= $mahasiswaku['prodi_nama'] ?></td>
                  <td><?= $mahasiswaku['jurusan'] ?></td>
                  <td>
                    <button title="Edit Mahasiswa" id="<?= $mahasiswaku['id_mahasiswa'] ?>" class="btn btn-primary btn-edit"><i class="fas fa-fw fa-edit"></i></button>
                    <?php if($mahasiswaku['proyek_id'] == 0): ?>
                    <a title="Hapus Mahasiswa" href="<?= base_url('admin/Master_Mahasiswa/delete_mahasiswa/').$mahasiswaku['id_mahasiswa'] ?>" class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i class="fas fa-fw fa-trash"></i></a>
                  <?php endif; ?>
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

            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



<!-- ###################################  MODAL Mahasiswa   ################################ -->

<!-- Tambah Data Mahasiswa Modal -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/Master_Mahasiswa/add_mahasiswa') ?>">
      <div class="modal-body">
        <div class="form-group">
        <label for="">Nama Mahasiswa</label>
          <input type="text" required="" name="mahasiswa_nama" placeholder="Nama Mahasiswa" class="form-control"></input>
          <?= form_error('mahasiswa_nama','<small class="text-danger">','</small>') ?>
        </div>
        <div class="form-group">
        <label for="">Nim</label>
          <input required="" name="mahasiswa_nim" type="text" placeholder="Nim" class="form-control"></input>
          <?= form_error('mahasiswa_nim','<small class="text-danger">','</small>') ?>
        </div>
        <div class="form-group">
        <label for="">Tangga Lahir</label>
          <input required="" name="mahasiswa_tanggallahir" type="date" placeholder="Tanggal Lahir" class="form-control"></input>
        </div>
        <div class="form-group">
        <label for="">Alamat</label>
          <textarea required="" name="mahasiswa_alamat" type="text" placeholder="alamat" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="id_pengguna">Jenis Kelamin</label>
          <select name="mahasiswa_jk" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      
        <div class="form-group">
          <label for="id_pengguna">Kategori Prodi</label>
          <select name="prodi_id" class="form-control">
            <?php foreach ($get_prodi as $prodi): ?>
              <option value="<?= $prodi['id_prodi'] ?>"><?= $prodi['prodi_nama'] ?></option>
            <?php endforeach; ?>
          </select>
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


<!-- Edit Data Mahasiswa Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/Master_Mahasiswa/update_mahasiswa') ?>">
      <div class="modal-body">
        <div class="form-group">
          <input required="" id="id_mahasiswa" name="id_mahasiswa" type="hidden" readonly class="form-control" placeholder=""></input>
        </div>
        <div class="form-group">
        <label for="">Nama Mahasiswa</label>
          <input required="" id="mahasiswa_nama" name="mahasiswa_nama" type="text" placeholder="Nama Mahasiswa" class="form-control"></input>
        </div>
        <div class="form-group">
        <label for="">Nim</label>
          <input required="" id="mahasiswa_nim" name="mahasiswa_nim" type="text" placeholder="Nim" class="form-control"></input>
        </div>
        <div class="form-group">
        <label for="">Tanggal Lahir</label>
          <input required="" id="mahasiswa_tanggallahir" name="mahasiswa_tanggallahir" type="date" placeholder="Tanggal Lahir" class="form-control"></input>
        </div>

        <div class="form-group">
        <label for="">Alamat</label>
          <textarea required="" name="mahasiswa_alamat" id="mahasiswa_alamat" type="text" placeholder="alamat" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <label for="id_pengguna">Jenis Kelamin</label>
          <select id="mahasiswa_jk"  name="mahasiswa_jk" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="id_pengguna">Kategori Prodi</label>
          <select name="prodi_id" class="form-control">
            <?php foreach ($get_prodi as $prodi): ?>
              <option value="<?= $prodi['id_prodi'] ?>"><?= $prodi['prodi_nama'] ?></option>
            <?php endforeach; ?>
          </select>
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
<!-- ##################################  MODAL Mahasiswa   ################################ -->

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
            <li>Tombol  <i class="fa  fa-plus" style="color: red"></i> berfungsi untuk tambah data mahasiswa.</li>
            <li>Tombol  <i class="fa  fa-edit" style="color: red"></i> berfungsi untuk edit data mahasiswa .</li>
            <li>Tombol  <i class="fa  fa-trash" style="color: red"></i> berfungsi untuk hapus data mahasiswa.</li>
        </ol>
        <i>
            <b>Perhatian!</b> <br>
            <ul>
                <li>Tombol hapus <i class="fa  fa-trash" style="color: red"></i> akan hilang ketika data mahasiswa digunakan proyek </li>
            </ul>
        </i>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
  
<!-- js menampilkan update data mahasiswa -->

<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-edit").click(function(){
      let id_mahasiswa = $(this).attr("id")
      $.get("<?= base_url('admin/Master_Mahasiswa/show_mahasiswa/') ?>"+id_mahasiswa,function(response){
        let result = JSON.parse(response)
        $("#modal-edit").modal("show")
        console.log(result)
        $("#id_mahasiswa").val(result.id_mahasiswa)
        $("#mahasiswa_nama").val(result.mahasiswa_nama)
        $("#mahasiswa_nim").val(result.mahasiswa_nim)
        $("#mahasiswa_tanggallahir").val(result.mahasiswa_tanggallahir)
        $("#mahasiswa_jk").val(result.mahasiswa_jk)
        $("#mahasiswa_alamat").val(result.mahasiswa_alamat)
      })
    })


  })
</script>
<!-- script merubah tampil tanggal ddmmyyyy -->
<?php
function formatTanggal($date){
 // ubah string menjadi format tanggal
 return date('d-m-Y', strtotime($date));
}
?>
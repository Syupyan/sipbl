  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <a href="<?= base_url('sadmin/master-menu')?>" class="btn btn-danger"><i
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
          <div class="container-fluid">



              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title"><?= $title; ?></h3>
                      <button title="Tambah Menu Manager" type="button" class="btn btn-primary float-sm-right"
                          data-toggle="modal" data-target="#tambah-data"><i class="fas fa-fw fa-plus"></i>
                          Tambah Data
                      </button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Role</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no=1; foreach ($all_menu as $menu): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= $menu['menu'] ?></td>
                                  <td>
                                      <button title="Edit Menu Manager" id="<?= $menu['id_menu'] ?>"
                                          class="btn btn-primary btn-edit"><i class="fas fa-fw fa-edit"></i></button>
                                      <?php
                    // query builder mengambil data tbl_menu_pengguna
                    $pengguna = $this->db->select('*')
										->from('tbl_pengguna_menu')
										->get()->result_array();
                    $menu1 = 0;
                    foreach($pengguna as $mhs){
                      $menu1 = $mhs['menu_id'];
                    }
                  ?>
                                      <?php if($menu == $menu['id_menu']): ?>
                                      <a title="Hapus Manager" onclick="return confirm('Yakin ?')"
                                          href="<?= base_url('sadmin/Menu_Manager/delete_menu/').$menu['id_menu'] ?>"
                                          class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                      <?php endif ?>
                                  </td>
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


      <!-- Modal -->
      <div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="<?= base_url('sadmin/Menu_Manager/add_menu') ?>">
                          <div class="form-group">
                              <label for="">Role</label>
                              <input class="form-control" name="menu" placeholder="Role"></input>
                          </div>
                          <?= get_csrf() ?>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <!-- Edit Data Prodi Modal -->
      <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form method="post" action="<?= base_url('sadmin/Menu_Manager/update_menu') ?>">
                      <div class="modal-body">
                          <div class="form-group">
                              <input required="" id="id_menu" name="id_menu" type="hidden" readonly class="form-control"
                                  placeholder=""></input>
                          </div>
                          <div class="form-group">
                              <label for="">Role</label>
                              <input required="" id="menu" name="menu" class="form-control" placeholder=""></input>
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


  <!-- ###################################  MODAL KATEGORI Prodi   ################################ -->


  <script type="text/javascript">
$(document).ready(function() {
    $(".btn-edit").click(function() {
        let id_menu = $(this).attr("id")
        $.get("<?= base_url('sadmin/Menu_Manager/show_menu/') ?>" + id_menu, function(response) {
            let result = JSON.parse(response)
            $("#modal-edit").modal("show")
            console.log(result)
            $("#id_menu").val(result.id_menu)
            $("#menu").val(result.menu)
        })
    })


})
  </script>
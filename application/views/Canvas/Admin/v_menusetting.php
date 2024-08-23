<?php include(APPPATH . 'views/Canvas/header.php'); ?>
<?php include(APPPATH . 'views/Canvas/sidebar.php'); ?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <!-- Tombol "Buat Menu" di kanan atas -->
          <div class="d-sm-flex align-items-center justify-content-between border-bottom mb-3">
            <h2 class="mb-0">Data Menu</h2>
            <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#createModal">Buat Menu</button>
          </div>
          <?php echo show_notification(); ?>
          <!-- Tabel dengan ikon aksi -->
          <div class="table-responsive text-nowrap">
            <table id="example" class="table table-striped" style="width: 100%;">
              <thead>
                <tr>
                  <th class="text-center">Nama Menu</th>
                  <th class="text-center">Menu Parent</th>
                  <th class="text-center">Viewer</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Tanggal Dibuat</th>
                  <th class="text-center" style="width:10%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <? foreach ($menu as $row) { ?>
                <tr>
                  <td style="text-align: left;"><?= $row['nama_menu']; ?></td>
                  <td style="text-align: left;"><?= $row['menu_parent']; ?></td>
                  <td style="text-align: left;"><?= $row['id_viewer']; ?></td>
                  <td class="text-center">
                      <?php if ($row['publish'] == 1): ?>
                          <label class="badge badge-success">Publik</label>
                      <?php else: ?>
                          <label class="badge badge-warning">Privat</label>
                      <?php endif; ?>
                  </td>
                  <td class="text-center" data-date="<?= $row['ts']; ?>"></td>
                  <td class="text-center">
                    <label class="badge badge-info" data-toggle="modal" data-target="#editModal">
                      <i class="mdi mdi-pencil"></i>
                    </label>
                    <label class="badge badge-danger" data-toggle="modal" data-target="#deleteModal">
                      <i class="mdi mdi-delete"></i>
                    </label>
                  </td>
                </tr>
                <? } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Buat Menu -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="createModalLabel">Buat Menu Baru</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('admin/saveMenu') ?>" method="POST" id="formValidationExamples" class="forms-sample">
                      <div class="form-group row">
                          <div class="col">
                              <label>Nama Menu</label>
                              <div id="the-basics">
                                  <input class="typeahead" type="text" placeholder="Masukkan Nama Menu" name="nama_menu" required>
                              </div>
                          </div>
                          <div class="col">
                              <label>Menu Parent</label>
                              <div id="bloodhound">
                                  <input class="typeahead" type="text" placeholder="Masukkan Menu Parent" name="menu_parent" required>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col">
                              <label>Viewer</label>
                              <div id="the-basics">
                                  <input class="typeahead" type="text" placeholder="Masukkan Viewer" name="viewer" required>
                              </div>
                          </div>
                          <div class="col">
                              <label>Urutan</label>
                              <div id="bloodhound">
                                  <input class="typeahead" type="text" placeholder="Masukkan Urutan" name="urutan" required>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col">
                              <div class="form-checkbox">
                                  <input type="checkbox" class="form-check-input" id="publish" name="publish" >
                                  <label class="form-check-label" for="publish" style="margin-left: 2%;">Publish</label>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer" style="margin-top: 10px;">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal Edit -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form edit menu -->
          <form>
            <div class="form-group">
              <label for="menuName">Nama Menu</label>
              <input type="text" class="form-control" id="menuName" placeholder="Masukkan nama menu">
            </div>
            <div class="form-group">
              <label for="createdDate">Tanggal Dibuat</label>
              <input type="date" class="form-control" id="createdDate">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Hapus -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Hapus Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus menu ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger">Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Script untuk inisialisasi DataTable -->
  <script>
    $(document).ready(function() {
      $('#example').DataTable({
      });
    });
  </script>
<?php include(APPPATH . 'views/Canvas/footer.php'); ?>

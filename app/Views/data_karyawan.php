<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

   <div class="row column_title">
      <div class="col-md-12">
         <div class="page_title">
            <h2>Data Karyawan</h2>
         </div>
      </div>
   </div>

   <div class="row column1">

      <div class="col-md-12">
         <div class="white_shd full margin_bottom_30">
            <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
               <div class="heading1 margin_0">
                  <h2 class="text-white">List Data Karyawan</h2>
               </div>
               <div>
                  <button type="button" class="btn btn-success" style="margin-right: 10px;" data-toggle="modal" data-target="#formTambahData"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
               </div>
            </div>

            <div class="table_section padding_infor_info">
               <div class="table-responsive-sm">
                  <table id="myTable" class="table">
                     <thead>
                        <tr>
                           <th>Nama Lengkap</th>
                           <th>Email</th>
                           <th>Alamat lengkap</th>
                           <th>No. HP</th>
                           <th>Jabatan</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($karyawan as $row) : ?>
                           <tr>
                              <td><?= ucwords($row['name']) ?></td>
                              <td><?= ucwords($row['email']) ?></td>
                              <td><?= ucwords($row['alamat']) ?></td>
                              <td><?= ucwords($row['no_hp']) ?></td>
                              <td><?= ucwords($row['divisi']) ?></td>
                              <td>
                                 <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning fa fa-pencil-square-o" style="margin-right: 5px;" data-toggle="modal" data-target="#editModal<?= $row['id'] ?>"></button>
                                    <button href="#" data-href="<?= base_url('data_karyawan/' . $row['id']) ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-danger fa fa-trash"></button>
                                 </div>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal Tambah Data -->
      <div class="modal fade" id="formTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header dash_head">
                  <h4 class="modal-title text-white font-weight-normal" id="modalTambahTitle">Tambah Data Karyawan</h4>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body modal-padding">
                  <!-- Form tambah data disini -->
                  <form action="<?= base_url('data_karyawan/store') ?>" method="post">
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="name">Nama Lengkap</label>
                           <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="divisi">Jabatan</label>
                           <input type="text" class="form-control" id="divisi" name="divisi" required>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="no_hp">No. HP</label>
                           <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="alamat">Alamat</label>
                           <textarea class="form-control" id="alamat" name="alamat" required>
                           </textarea>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($karyawan as $row) : ?>
   <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header dash_head">
               <h4 class="modal-title text-white font-weight-normal" id="editModalLabel">Edit Data Karyawan</h4>
               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body modal-padding">
               <!-- Form edit data karyawan -->
               <form action="<?= base_url('update_karyawan/' . $row['id']) ?>" method="post">
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>" required>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>" required>
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="divisi">Jabatan</label>
                        <input type="text" class="form-control" id="divisi" name="divisi" value="<?= $row['divisi'] ?>" required>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="no_hp">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $row['no_hp'] ?>" required>
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-12">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required><?= $row['alamat'] ?></textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
<?php endforeach; ?>

<script src="<?= base_url('assets/js/edit_modal.js') ?>"></script>

<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-body text-center">
            <h4 class="h2">Apa Anda Yakin ??</h4>
            <p>Data tersebut akan terhapus dan hilang selamanya</p>
         </div>
         <div class="modal-footer justify-content-center">
            <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
         </div>
      </div>
   </div>
</div>

<!-- footer -->
<div class="container-fluid">
   <div class="footer">
      <p>Copyright © 2024 Designed and built with all the love by the Taro & Friend.</p>
   </div>
</div>


<?= $this->endSection(); ?>
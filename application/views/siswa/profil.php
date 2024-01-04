 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
                <div class="card mb-4">
            <?= $this->session->flashdata('message'); ?>
                <div class="card-header">
                    <h3>Profil Siswa</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                                <div class="d-flex justify-content-center">
                                <?php if($siswa == 0 || $siswa['pas_foto'] == ' ') :?>
                                 <img src="<?= base_url('assets/img/profile/default.png') ?>" class="rounded-circle author-box-picture" width="200px" height="200px">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/img/').$siswa['no_pendaftaran'].'/'.$siswa['pas_foto'] ?>" class="rounded-circle author-box-picture" width="200px" height="200px">
                                <?php endif; ?>
                                </div>
                                <div class="mb-3 d-flex justify-content-center">
                                <?php if($siswa == 0) : ?>
                                    <span class="badge badge-primary mx-auto"><a href="<?= base_url('siswa/daftar') ?>" class="text-white">Daftar untuk edit profil</a></span>
                                <?php else : ?>
                                    <span class="badge badge-primary mx-auto" data-toggle="modal" data-target="#modalEditProfile">Edit Foto Profile <i class="fas fa-pencil-alt"></i></span>
                                <?php endif; ?>
                                    
                                   
                                </div>
                                <div class="mb-0 d-flex justify-content-center">
                                <p>Status Pendaftaran</p>
                                </div>
                                <div class=" mb-3 d-flex justify-content-center">
                                        <?php if($siswa == 0) : ?>
                                        <span class="badge badge-warning">Anda Belum Mendaftar</span>
                                        <?php else : ?>
                                        <span class="badge badge-warning"><?= $siswa['status_pendaftaran']; ?></span>
                                        <?php endif; ?>
                                </div>        
                        </div>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama</th>
                                            <td><?= $user['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">No Pendaftaran</th>
                                            <?php if($siswa == 0) :?>
                                                <td>-</td>
                                            
                                            <?php else : ?>
                                                <td><?= $siswa['no_pendaftaran']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">NISN</th>
                                            <?php if($siswa == 0) :?>
                                                <td>-</td>
                                            <?php else: ?>
                                            <td><?= $siswa['nisn']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jenis Kelamin</th>
                                            <?php if($siswa == 0 ) :?>
                                                <td>-</td>
                                            <?php else: ?>
                                            
                                            <td><?= $siswa['jenis_kelamin']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">No HP</th>
                                            <?php if($siswa == 0) :?>
                                                <td>-</td>
                                            <?php else: ?>
                                            
                                                <td><?= $siswa['no_hp']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td><?= $user['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat</th>
                                            <?php if($siswa == 0) :?>
                                                <td>-</td>
                                            <?php else: ?>
                                                <td><?= $siswa['alamat']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tempat Lahir</th>
                                            <?php if($siswa == 0) :?>
                                            <td>-</td>
                                            <?php else: ?>
                                            <td><?= $siswa['tempat_lahir']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tanggal Lahir</th>
                                            <?php if($siswa == 0) :?>
                                            <td>-</td>
                                            <?php else: ?>
                                            <td><?= date('d-m-Y', strtotime($siswa['tgl_lahir'])); ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Sekolah Asal</th>
                                            <?php if($siswa == 0) :?>
                                            <td>-</td>
                                            <?php else: ?>
                                            <td><?= $siswa['sekolah_asal']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Orang Tua/Wali</th>
                                            <?php if($siswa == 0) :?>
                                            <td>-</td>
                                            <?php else: ?>
                                            <td><?= $siswa['orang_tua']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nomor Hp Orang Tua</th>
                                            <?php if($siswa == 0) :?>
                                            <td>-</td>
                                            <?php else: ?>
                                            <td><?= $siswa['hp_ortu']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jurusan Yang Dipilih</th>
                                            <?php if($siswa == 0) :?>
                                            <td>-</td>
                                            <?php else: ?>
                                            <td><?= $siswa['jurusan']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalEditProfile" tabindex="-1" aria-labelledby="modalEditProfileLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditProfileLabel">Edit Foto Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?= form_open_multipart('siswa/editFotoProfile');?>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pas_foto" name="pas_foto" required>
                        <label class="custom-file-label" id="label-pas-foto" for="pas_foto">Choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>

   
 </div>
 <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
                    
     

     <div class="row">
        <div class="col-lg-12 md-12 sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                <h3 class=><?= $title; ?></h3>
                </div>
                <div class="card-body">
                   <div class="row ml-5">
                    <div class="col-md-4 mb-3">
                        <div class="card text-center" style="width: 18rem;">
                        <div class="card-header bg-info text-white">
                        <h5 class="card-title">Pendaftaran</h5>
                        </div>
                            <div class="card-body text-center mx-auto" style="height: 250px; width: 250px">
                               
                                    <?php if($siswa == 0) :?>
                                        <img src="<?= base_url('assets/img/ban.png') ?>" width="100px" height="100px" class="mb-3">
                                      <a href="<?= base_url('siswa/daftar') ?>" type="button" class="btn btn-danger">Anda Belum Mendaftar</a>
                                    
                                    <?php elseif($siswa['status_pendaftaran'] == 'Menunggu Diverifikasi') : ?>
                                        <img src="<?= base_url('assets/img/wait.png') ?>" width="100px" height="100px" class="mb-3">
                                    <a href="<?= base_url('siswa/profil') ?>" type="button" class="btn btn-warning"><?= $siswa['status_pendaftaran']; ?></a>
                                    <?php else :?>
                                        <img src="<?= base_url('assets/img/check.png') ?>" width="100px" height="100px" class="mb-3">
                                        <br>
                                    <a href="<?= base_url('siswa/profil') ?>" type="button" class="btn btn-success"><?= $siswa['status_pendaftaran']; ?></a>
                                    <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card text-center" style="width: 18rem;">
                            <div class="card-header bg-info text-white">
                                <h5 class="card-title">Upload Berkas</h5>
                            </div>
                            <div class="card-body text-center mx-auto" style="height: 250px; width: 250px">
                                <?php if($siswa == 0) :?>
                                    <img src="<?= base_url('assets/img/ban.png') ?>" width="100px" height="100px" class="mb-3">
                                    <a href="<?= base_url('siswa/upload') ?>" class="btn btn-danger">Anda Belum Upload Berkas</a>
                                <?php elseif($siswa['pas_foto'] = '') :?>
                                    <img src="<?= base_url('assets/img/ban.png') ?>" width="100px" height="100px" class="mb-3">
                                    <a href="<?= base_url('siswa/upload') ?>" class="btn btn-danger">Anda Belum Upload Berkas</a>
                                <?php else :?>
                                    <img src="<?= base_url('assets/img/check.png') ?>" width="100px" height="100px" class="mb-3">
                                    <a href="<?= base_url('siswa/profil') ?>" class="btn btn-success">Berkas Berhasil Di Upload</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card text-center" style="width: 18rem;">
                            <div class="card-header bg-info text-white">
                              <h5 class="card-title">Pembayaran</h5>
                            </div>
                            <div class="card-body text-center mx-auto" style="height: 250px; width: 250px">
                                <?php if( $siswa == 0 || $siswa['bukti_bayar'] = '') :?>
                                    <img src="<?= base_url('assets/img/ban.png') ?>" width="100px" height="100px" class="mb-3">  
                                    <a href="<?= base_url('siswa/bayar') ?>" class="btn btn-danger">Anda Belum Melakuan Pembayaran</a>
                                <?php elseif($siswa['status_pembayaran'] == 'Menunggu Verifikasi Pembayaran') : ?>
                                    <img src="<?= base_url('assets/img/wait.png') ?>" width="100px" height="100px" class="mb-3">
                                    <a href="<?= base_url('siswa/profil') ?>" class="btn btn-warning"><?= $siswa['status_pembayaran']; ?></a>
                                <?php else :?>
                                    <img src="<?= base_url('assets/img/check.png') ?>" width="100px" height="100px" class="mb-3">
                                    <br>
                                    <a href="<?= base_url('siswa/profil') ?>" class="btn btn-success"><?= $siswa['status_pembayaran']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                   </div>
                </div>
            </div>
        </div>
     </div>
</div>
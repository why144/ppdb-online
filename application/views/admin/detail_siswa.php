<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
     <div class="row">
        <div class="col-12 col-sm-12 col-lg-12 mb-4">
            <div class="card">
                <h3 class="card-header bg-primary text-white"><?= $title; ?></h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                        <tr>
                                            <td>Nama</td>
                                            <td>: <?= $data_siswa['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Pendaftaran</td>
                                            <td>: <?= $data_siswa['no_pendaftaran']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>: <?= $data_siswa['jenis_kelamin']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>
                                            <td>: <?= $data_siswa['nisn']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Sekolah Asal</td>
                                            <td>: <?= $data_siswa['sekolah_asal']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Hp</td>
                                            <td>: <?= $data_siswa['no_hp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: <?= $data_siswa['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: <?= $data_siswa['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat, Tgl lahir</td>
                                            <td>: <?= $data_siswa['tempat_lahir'];?>, <?= date('d-m-Y', strtotime($data_siswa['tgl_lahir'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td>
                                            <td>: <?= $data_siswa['jurusan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pendaftaran</td>
                                            <td>: <?= date('d-m-Y',$data_siswa['tanggal_pendaftaran']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>KTP Orang Tua</td>
                                            <?php if($berkas['ktp_ortu'] == ' ') : ?>
                                            <td>: Berkas Belum Diupload </td>
                                            <?php else : ?>
                                                <td>: <a href="<?= base_url('assets/img/').$berkas['no_pendaftaran'].'/'.$berkas['ktp_ortu'] ?>" target="_blank"><span class="badge badge-primary">Lihat</span></a> </td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td>Kartu Keluarga</td>
                                            <?php if($berkas['kk'] == ' ') : ?>
                                            <td>: Berkas Belum Diupload</td>
                                            <?php else : ?>
                                                <td>: <a href="<?= base_url('assets/img/').$berkas['no_pendaftaran'].'/'.$berkas['kk'] ?>" target="_blank"><span class="badge badge-primary">Lihat</span></a> </td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td>Akte Kelahiran</td>
                                            <?php if($berkas['akte'] == ' ') : ?>
                                                <td>: Berkas Belum Diupload</td>
                                            <?php else : ?>
                                                <td>: <a href="<?= base_url('assets/img/').$berkas['no_pendaftaran'].'/'.$berkas['akte'] ?>" target="_blank"><span class="badge badge-primary">Lihat</span></a> </td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td>Ijazah/SKL</td>
                                            <?php if($berkas['ijazah'] == ' ') : ?>
                                                <td>: Berkas Belum Diupload</td>
                                            <?php else : ?>
                                                <td>: <a href="<?= base_url('assets/img/').$berkas['no_pendaftaran'].'/'.$berkas['ijazah'] ?>" target="_blank"><span class="badge badge-primary">Lihat</span></a> </td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td>Status Pembayaran</td>
                                            <?php if($pembayaran == 0) : ?>
                                                <td>: Belum Melakukan Pembayaran</td>
                                            <?php else : ?>
                                            <td>: <?= $pembayaran['status_pembayaran']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td>Status Pendaftaran</td>
                                            <td>: <?= $data_siswa['status_pendaftaran']; ?></td>
                                        </tr>
                                </table>

                            
                                    </div>
                                    <div class="row float-right">
                                        <div class="col ">
                                        <a href="<?= base_url('admin/dataSiswa'); ?>" type="button" class="btn btn-primary ">Kembali</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                           
                    
                </div>
            </div>
        </div>
     </div>
</div>
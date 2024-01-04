 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
     <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3><?= $title; ?></h3>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">No. Pendaftaran</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor Hp</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                        <?php foreach($data_siswa as $data) : ?>
                            <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $data['no_pendaftaran']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['no_hp']; ?></td>
                            <td><?= $data['status_pendaftaran']; ?></td>
                            <?php if($data['status_pendaftaran'] == 'Menunggu Diverifikasi') : ?>
                                <td>
                                    <a href="<?= base_url('admin/detailSiswa/') ?><?= $data['no_pendaftaran']; ?>" role="button" class="btn btn-info"><i class="fas fa-eye fa-lg"></i></a>
                                    <a href="<?= base_url('admin/verifikasiSiswa/') ?><?= $data['no_pendaftaran']; ?>" role="button" onclick="return confirm('Yakin ingin memverifikasi data siswa?')" class="btn btn-warning"><i class="fas fa-check"></i></a>
                                </td>
                            <?php else :?>
                                <td>
                                    <a href="<?= base_url('admin/detailSiswa/') ?><?= $data['no_pendaftaran']; ?>" role="button" class="btn btn-info"><i class="fas fa-eye fa-lg"></i></a>
                                    <a href="<?= base_url('admin/terimaSiswa/') ?><?= $data['no_pendaftaran']; ?>" class="btn btn-success" onclick="return confirm('Yakin ingin update data siswa menjadi diterima?')" role="button"><i class="fas fa-check-double"></i></a>
                                    <a href="<?= base_url('admin/tolakSiswa/') ?><?= $data['no_pendaftaran']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin update data siswa menjadi ditolak?')" role="button"><i class="fas fa-times"></i></a>
                                </td>
                                
                            <?php endif; ?>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
       
        </div>
     </div>
 </div>

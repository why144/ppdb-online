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
                                    <th scope="col">No Pendaftaran</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status Pendaftaran</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                <?php foreach($data_siswa as $data): ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $data['no_pendaftaran']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['status_pendaftaran']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/detailSiswa/').$data['no_pendaftaran']; ?>" type="button" class="btn btn-info"><i class="fas fa-eye fa-lg"></i></a>
                                            <a href="<?= base_url('admin/checkKembali/').$data['no_pendaftaran']; ?>" type="button" onclick="return confirm('Yakin ingin mengembalikasi data siswa menjadi menunggu diverifikasi?')" class="btn btn-warning"><i class="fas fa-undo-alt"></i></a>
                                        </td>
                                    </tr>
                            </tbody>   
                            
                            <?php $i++; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
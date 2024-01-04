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
                                    <th scope="col">Email</th>
                                    <th scope="col">Tanggal Pembayaran</th>
                                    <th scope="col">Status Pembayaran</th>
                                    <th scope="col">Bukti Pembayaran</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            <?php foreach($pembayaran as $data) : ?>
                                <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $data['no_pendaftaran']; ?></td>
                                        <td><?= $data['email']; ?></td>
                                        <td><?= date('d-m-Y',$data['tanggal_pembayaran']);?></td>
                                        <?php if($data['status_pembayaran'] == 'Menunggu Verifikasi Pembayaran'): ?>
                                            <td><?= $data['status_pembayaran']; ?></td>
                                            <td><a href="<?= base_url('assets/img/').$data['no_pendaftaran'].'/'.$data['bukti_bayar'] ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a></td>
                                            <td><a href="<?= base_url('admin/verifikasiPembayaran/').$data['id_pembayaran'] ?>" class="btn btn-warning" onclick="return confirm('Yakin?')"><i class="fas fa-check"></i></a> <a href="<?= base_url('admin/tolakPembayaran/').$data['id_pembayaran'] ?>" class="btn btn-danger"><i class="fas fa-times"></i></a></td>
                                        <?php elseif($data['status_pembayaran'] == 'Ditolak'): ?>
                                            <td><?= $data['status_pembayaran']; ?></td>
                                            <td><a href="<?= base_url('assets/img/').$data['no_pendaftaran'].'/'.$data['bukti_bayar'] ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a></td>
                                            <td><a href="<?= base_url('admin/verifikasiPembayaran/').$data['id_pembayaran'] ?>" class="btn btn-warning" onclick="return confirm('Yakin?')"><i class="fas fa-check"></i></a></td>
                                        <?php else : ?>
                                            <td><?= $data['status_pembayaran']; ?></td>
                                            <td><a href="<?= base_url('assets/img/').$data['no_pendaftaran'].'/'.$data['bukti_bayar'] ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a></td>
                                            <td><button class="btn btn-success"><i class="fas fa-check"></i></button></td>
                                        <?php endif; ?>
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
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
                            <th scope="col">No HP</th>
                            <th scope="col">Kartu Keluarga</th>
                            <th scope="col">Akte Kelahiran</th>
                            <th scope="col">KTP Orang Tua</th>
                            <th scope="col">Ijazah/SKL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                        <?php foreach($berkas as $data) : ?>
                            <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $data['no_pendaftaran']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['no_hp']; ?></td>
                            <?php if($data['kk'] == ' ') : ?>
                                <td>Data Belum Ada</td>
                            <?php else : ?>
                                <td><a href="<?= base_url('assets/img/').$data['no_pendaftaran'].'/'.$data['kk'] ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a></td>
                            <?php endif; ?>
                            <?php if($data['akte'] == ' ') : ?>
                                <td>Data Belum Ada</td>
                            <?php else : ?>
                                <td><a href="<?= base_url('assets/img/').$data['no_pendaftaran'].'/'.$data['akte'] ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a></td>
                            <?php endif; ?>
                            <?php if($data['ktp_ortu'] == ' ') :?>
                                <td>Data Belum Ada</td>
                            <?php else : ?>
                                <td><a href="<?= base_url('assets/img/').$data['no_pendaftaran'].'/'.$data['ktp_ortu'] ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a></td>
                            <?php endif; ?>
                            <?php if($data['ijazah'] == ' ') : ?>
                                <td>Data Belum Ada</td>
                            <?php else : ?>
                                <td><a href="<?= base_url('assets/img/').$data['no_pendaftaran'].'/'.$data['ijazah'] ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a></td>
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
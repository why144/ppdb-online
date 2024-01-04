 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
     
        <div class="card">
            <div class="card-header bg-primary text-white">
            <h3><?= $title; ?></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header text-center bg-info text-white">
                                <h3>Siswa Teregistrasi</h3>
                            </div>
                            <div class="card-body" style="height: 150px;">
                                <table class="table table-borderless">
                                    <tbody style="font-size: 20px;">
                                        <tr>
                                            <td>Terverifikasi</td>
                                            <td>: <?= $siswaTerverifikasi; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Menunggu Verifikasi</td>
                                            <td>: <?= $menungguVerifikasi; ?></td>
                                        </tr>
                                        
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <div class="card">
                            <div class="card-header text-center bg-info text-white">
                                <h3>Pembayaran Siswa</h3>
                            </div>
                            <div class="card-body" style="height: 150px;">
                            <table class="table table-borderless">
                                    <tbody style="font-size: 20px;">
                                        <tr>
                                            <td>Lunas</td>
                                            <td>: <?= $pembayaranLunas; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Menunggu Verifikasi</td>
                                            <td>: <?= $pembayaranMenungguVerifikasi; ?></td>
                                        </tr>
                                        
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <div class="card text-center">
                            <div class="card-header bg-info text-white">
                                <h3>Siswa Diterima</h3>
                            </div>
                            <div class="card-body" style="height: 150px;">
                                <h5 class="card-title mb-4 text-bold" style="font-size: 36px"><?= $jumSiswaDiterima; ?></h5>
                                <a href="<?= base_url('admin/siswaDiterima'); ?>" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <div class="card">
                            <div class="card-header text-center bg-info text-white">
                                <h3>User</h3>
                            </div>
                            <div class="card-body" style="height: 150px;">
                                <table class="table table-borderless">
                                        <tbody style="font-size: 20px;">
                                            <tr>
                                                <td>Mendaftar Sekolah</td>
                                                <td>: <?= $userTerdaftar; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Belum Mendaftar</td>
                                                <td>: <?= $userBelumTerdaftar; ?> </td>
                                            </tr>
                                            
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </div>
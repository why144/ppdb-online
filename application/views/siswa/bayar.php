  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->

     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        
            <div class="col-lg mb-4">
                <div class="card">
                <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <div class="row">
                        
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/') ?>/img/bank-mandiri.png" class="rounded mx-auto d-block" width="200px" height="200px">
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title mt-4">Bank Mandiri 12611617162</h5>
                                <h5>A/N Yayasan Habiburrahman</h5>
                                <p>Biaya Pendaftaran : Rp. 150.000</p>
                                <p class="card-text">Silahkan Lakukan Pembayaran Untuk Biaya Pendaftaran Masuk SMK Excellent 1 Kota Tangerang Pada Rekeing Di Atas, Kemudian Lakukan Konfirmasi Pembayaran Pada Form Di Bawah Ini.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mt-3">
                                <?= form_open_multipart('siswa/konfirmasiPembayaran');?>
                                    <div class="form-goup row mb-3">
                                            <div class="col-md-4 ">
                                                <div class="row">
                                                    <div class="col"> 
                                                        <h4 class=" d-flex justify-content-center">Bukti Pembayaran</h4>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="bukti_bayar" name="bukti_bayar" required>
                                                            <label class="custom-file-label" id="label-bukti-bayar" for="bukti_bayar">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-goup row float-right ">
                                        <div class="col-sm-10 ">
                                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
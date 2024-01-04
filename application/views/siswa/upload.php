
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                        
                        <div class="row">
                            <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <?= $this->session->flashdata('message'); ?>
                                        <?= form_open_multipart('siswa/uploadFile');?>
                                            <div class="form-goup row mb-3">
                                                <div class="col-sm-2">Pas Foto</div>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="pas_foto" name="pas_foto" required>
                                                                <label class="custom-file-label" id="label-pas-foto" for="pas_foto">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-goup row mb-3">
                                                <div class="col-sm-2">KTP Orang Tua</div>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="ktp_ortu" name="ktp_ortu" required>
                                                                <label class="custom-file-label" id="label-ktp-ortu" for="ktp_ortu">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-goup row mb-3">
                                                <div class="col-sm-2">Kartu Keluarga</div>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="kk" name="kk" required>
                                                                <label class="custom-file-label" id="label-kk" for="kk">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-goup row mb-3">
                                                <div class="col-sm-2">Akte Kelahiran</div>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="akte" name="akte" required>
                                                                <label class="custom-file-label" id="label-akte" for="akte">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-goup row mb-3">
                                                <div class="col-sm-2">Ijazah/SKL</div>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="ijazah" name="ijazah" required>
                                                                <label class="custom-file-label" id="label-ijazah" for="ijazah">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <p class="text-danger">*Pastikan berkas yang di upload adalah file pdf/png/jpg dan ukuran file tidak lebih dari 2MB dan khusus pas foto harus png/jpg!</p>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-goup row float-right mr-1">
                                                            <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                   
                    

                    <!-- Content Row -->
                   

                </div>
                <!-- /.container-fluid -->

  
          
    
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-primary text-white">
                <h3><?= $title; ?></h3>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('admin/editPassword') ?>" method="post">
                    <div class="form-group row">
                            <label for="passSekarang"">Password Saat Ini</label>

                            <input type="text" class="form-control" id="passSekarang" name="passSekarang">
                            <?= form_error('passSekarang', '<small class="text-danger pl-3" >','</small>') ?>
                            
                    </div>
                    <div class="form-group row">
                            <label for="passBaru1"">Password Baru</label>

                            <input type="text" class="form-control" id="passBaru1" name="passBaru1">
                            <?= form_error('passBaru1', '<small class="text-danger pl-3" >','</small>') ?>
                            
                    </div>
                    <div class="form-group row">
                            <label for="passbaru2"">Konfirmasi Password Baru</label>

                            <input type="text" class="form-control" id="passbaru2" name="passbaru2">
                            <?= form_error('passbaru2', '<small class="text-danger pl-3" >','</small>') ?>
                            
                    </div>
                    <div class="form-group row float-right">
                        <button type="submit" onclick="return confirm('Yakin ingin mengganti password?')" class="btn btn-primary">Simpan</button>
                   
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
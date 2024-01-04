
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                        <div class="row">
                            <div class="col">
                           
                                <div class="card mb-4">
                                    <div class="card-header">
                                       <h3>Formulir Pendaftaran Siswa Baru</h3> 
                                       <?= $this->session->flashdata('message'); ?>
                                    </div>
                                    <div class="card-body">
                                        <form class="user" method="post" action="<?= base_url('siswa/daftar'); ?>">
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama']; ?>">
                                                <?= form_error('nama', '<small class="text-danger pl-3" >','</small>') ?>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nisn">NISN</label>
                                                    <input type="text" class="form-control" name="nisn" id="nisn">
                                                    <?= form_error('nisn', '<small class="text-danger pl-3" >','</small>') ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="sekolah_asal">Sekolah Asal</label>
                                                    <input type="text" class="form-control" name="sekolah_asal" id="sekolah_asal">
                                                    <?= form_error('sekolah_asal', '<small class="text-danger pl-3" >','</small>') ?>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="no_hp">Nomor Hp</label>
                                                    <input type="text" class="form-control" name="no_hp" id="no_hp">
                                                    <?= form_error('no_hp', '<small class="text-danger pl-3" >','</small>') ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
                                                    <?= form_error('email', '<small class="text-danger pl-3" >','</small>') ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat Lengkap</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder=" ">
                                                <?= form_error('alamat', '<small class="text-danger pl-3" >','</small>') ?>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
                                                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3" >','</small>') ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                                                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3" >','</small>') ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" >
                                                    <option selected>Pilih Jenis Kelamin</option>
                                                    <option value="L">L</option>
                                                    <option value="L">P</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="orang_tua">Nama Orang Tua/Wali</label>
                                                    <input type="text" class="form-control" name="orang_tua" id="orang_tua" placeholder=" ">
                                                    <?= form_error('orang_tua', '<small class="text-danger pl-3" >','</small>') ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="hp_ortu">No Hp Orang Tua/Wali</label>
                                                    <input type="text" class="form-control" name="hp_ortu" id="hp_ortu" placeholder=" ">
                                                    <?= form_error('hp_ortu', '<small class="text-danger pl-3" >','</small>') ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jurusan">Jurusan</label>
                                                <select id="jurusan" name="jurusan" class="form-control" >
                                                    <option selected>Pilih Jurusan</option>
                                                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                                    <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                                                    <option value="Otomatisasi dan Tata Kelola Perkantoran">Otomatisasi dan Tata Kelola Perkantoran</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary float-right">Daftar</button>
                                        </form>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    

                    <!-- Content Row -->
                   

                </div>
                <!-- /.container-fluid -->
          
    
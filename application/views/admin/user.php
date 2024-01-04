  <!-- Begin Page Content -->
  <div class="container-fluid">
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
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($users as $user): ?>
                                    <td><?= $i; ?></td>
                                    <td><?= $user['nama']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    
                                    <td><a href="<?= base_url('admin/hapusUser/').$user['id_user']; ?>" onclick="return confirm('Yakin ingin hapus user?')" class="btn btn-danger" type="button" ><i class="fas fa-trash-alt fa-lg"></i></a></td>
                               
                            </tbody>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
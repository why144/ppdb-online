<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- <style>
        #sidebar {
            position: fixed;
            left: 0px;
            height: 100%;
            background: #e4f1f2;
            transition: all 0.5s ease;
        }
    </style> -->
      
    <title>Halaman Login</title>

  </head>

  <body>
        <div class="row">
            <div class="col-md-3" id="sidebar">
                <div>
                    <p class="text-bold"">© PPDB ONLINE V.1</p>
                </div>
                <div class="mx-auto ml-1 mr-1 mt-5">
                   <h3 class="text-bold" style="font-size: 54px;">Aplikasi PPDB Online</h3>
                   <p>SMK Excellent 1 Kota Tangerang</p>
                   <div class="card ">
                        <div class="card-body bg-light">
                            <form>
                            <?= $this->session->flashdata('message'); ?>
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control bg-light" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukan email">
                                    <?= form_error('email', '<small class="text-danger pl-3" >','</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control bg-light" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger pl-3" >','</small>') ?>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9" style="background-image: url('./back.jpg');">
                <div class="float-right">
                    <img src="<?= base_url('assets/img/logo.png') ?>" height="75">
                </div>
            </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
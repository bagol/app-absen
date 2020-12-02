<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Absen Total Buah Segar</title>
        <link href="<?=base_url("assets/sb-admin/dist/css/styles.css") ?>" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header text-center"><img src="<?=base_url("assets/images/logo/logo.png") ?>" width="150px" alt="logo"></div>
                                    <div class="card-body">
                                    <?php if ($this->session->flashdata("msg_err")) { ?>
                                        <div class="alert alert-danger mt-1"><?=$this->session->flashdata("msg_err") ?></div>
                                    <?php } ?>
                                        <form action="<?=base_url("Auth/cekDevice") ?>" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="device">Device</label>
                                                <input class="form-control py-4" name="kode" id="device" type="text" placeholder="Masukan kode device" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="lokasi">Lokasi</label>
                                                <input class="form-control py-4" name="lokasi" id="lokasi" type="text" placeholder="Masukan lokasi device" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a href=""></a>
                                                <button type="submit" class="btn btn-primary" width="100%">Masuk</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">created by ibnu fajar yusuf</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?=base_url("assets/js/jquery.js") ?>" crossorigin="anonymous"></script>
        <script src="<?=base_url("assets/js/bootstrap.js") ?>" crossorigin="anonymous"></script>
        <script src="<?=base_url("assets/sb-admin/dist/js/scripts.js") ?>"></script>
    </body>
</html>

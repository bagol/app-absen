<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Monitor</title>
        <link href="<?=base_url("assets/sb-admin/dist/css/styles.css") ?>" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
        <style>
            img{
                margin: auto !important;
            }
        </style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5 col-lg-4">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class=" font-weight-light my-4"><?=$this->session->userdata("device_name") ?></h3></div>
                                    <input type="hidden" id="device-id" value="<?=$this->session->userdata("device") ?>">
                                    <div class="card-body">
                                      <h4 class="text-center mb-2">Scann disini!!!</h4>
                                          <div id="qrcode" class="text-center pl-1"></div>
                                    </div>
                                    <div class="card-footer">
                                      Lokasi : <?=$this->session->userdata("lokasi") ?>
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
        <script src="<?=base_url("assets/js/jquery.js") ?>" ></script>
        <script src="<?=base_url("assets/js/bootstrap.js") ?>" ></script>
        <script src="<?=base_url("assets/sb-admin/dist/js/scripts.js") ?>"></script>
        <script src="<?=base_url("assets/js/qrcode.js") ?>"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="<?=base_url("assets/js/script.js") ?>"></script>
    </body>
</html>

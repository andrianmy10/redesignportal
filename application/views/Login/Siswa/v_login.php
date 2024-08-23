<?php include(APPPATH . 'views/Login/header.php'); ?>
<body class="img js-fullheight" style="background-image: url(assets/images/snapedit_1724307822281.jpeg); ">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <img src="assets/images/aplogo.png" alt="Login Image" class="img-fluid w-50">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h4 class="mb-4 text-center" style="color:white;">&mdash; Portal Yayasan Asih Putera &mdash;</h4>
                    <div class="social d-flex text-center mb-3">
                        <a href="<?php echo base_url('/'); ?>" class="px-2 py-2 mr-md-1 rounded">
                            Login Sebagai Pegawai
                        </a>
                    </div>
                    <!-- Form Login -->
                    <form action="#" class="signin-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" class="form-control" placeholder="Password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3" style="background: white !important;border: 1px solid white !important; color: #000 !important;">Sign In</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary" style="color:white;">Remember Me
                                    <input type="checkbox" checked style="color:white;">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </form>
                    <p class="w-100 text-center">Mengalami Kendala ?</p>
                    <div class="social d-flex text-center">
                        <a href="#" class="px-2 py-2 mr-md-1 rounded" data-toggle="modal" data-target="#contactModal">
                            &mdash; Kontak Kami &mdash;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Kontak Kami -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <!-- Kelas modal-dialog-centered untuk menempatkan modal di tengah -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Kontak Kami</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style='text-align: justify;'>Email & Password Menggunakan Email Tagihan & Nomor HP/WA Yang Didaftarkan Untuk Menerima Tagihan Siswa. Bila Ada Pertanyaan, Bisa Menghubungi CS ( Customer Service ) Madrasah di Bawah Ini :</p>
                <p style='text-align: center;'>&mdash; Kontak CS Kami &mdash;</p>

                <div class="row">
                    <div class="col-6">CS Daycare Asih Putera</div>
                    <div class="col-6">
                      <a target="_blank" href="<?php echo $wa_dc ?>">
                        <span style="color:gray;"><? echo $no_dc; ?></span>
                      </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">CS TK Asih Putera</div>
                    <div class="col-6">
                      <a target="_blank" href="<?php echo $wa_tk ?>">
                        <span style="color:gray;"><? echo $no_tk; ?></span>
                      </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">CS MI Asih Putera</div>
                    <div class="col-6">
                      <a target="_blank" href="<?php echo $wa_mi ?>">
                        <span style="color:gray;"><? echo $no_mi; ?></span>
                      </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">CS MTs & MAMT Asih Putera</div>
                    <div class="col-6">
                      <a target="_blank" href="<?php echo $wa_mtsma ?>">
                        <span style="color:gray;"><? echo $no_mtsma; ?></span>
                      </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>



<?php include(APPPATH . 'views/Login/footer.php'); ?>

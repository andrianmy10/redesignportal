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
                <a href="<? echo base_url('/login'); ?>" class="px-2 py-2 mr-md-1 rounded">
                    Login Sebagai Orang Tua
                </a>
            </div>
            <!-- Form Login -->
            <form action="<?php echo base_url('login/aksi_login'); ?>" method="post" class="signin-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div>
                <div class="form-group">
                    <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <input type="hidden" class="form-control" placeholder="email" name="email">
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
                    <div class="w-50 text-md-right">
                        <a href="#" data-toggle="modal" data-target="#helpModal" style="color: #fff">Mengalami Kendala ?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

		</div>
	</section>
  <!-- Modal -->
<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="helpModalLabel">Bantuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:justify;">
                Username dan Password yang digunakan adalah akun dari BPM atau Processmaker Yayasan Asih Putera.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

	<?php include(APPPATH . 'views/Login/footer.php'); ?>

<div class="d-flex align-items-center">
    <div class="d-none d-lg-block position-relative container-left">
        <div class="container-image-login">
            <img src="./assets/img/ornament3.png" alt="ornament-img">
        </div>
        <img class="logo" src="./assets/img/mybranch-white.png" alt="bg-img">
        <img class="ornament2" src="./assets/img/ornament2.png" alt="bg-img-2">
    </div>
    <img class="ornament2-mobile" src="./assets/img/ornament2.png" alt="container-img">
    <div class="position-relative container-right">
        <img class="logo-mobile" src="./assets/img/logowarna.png" alt="logo-img">
        <div class="ms-5 p-5 container-form ml-5">
            <h3 class="text-login text-gray-900 wow fadeInUp" data-wow-delay="0s">Selamat Datang</h3>
            <h5 class="subtext-login text-gray-900 mb-4 wow fadeInUp" data-wow-delay="0.2s">Silahkan Log in terlebih
                dahulu</h5>
            <form class="user" id="form" method="post">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                    value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <div class="form-group wow fadeInUp" data-wow-delay="0.4s">
                    <div class="mb-2">Username/Email</div>
                    <input type="text" class="form-control form-control-user" id="username" name="username"
                        placeholder="Masukkan Username" value="<?= set_value('username') ?>">
                    <small class="notyf-err text-danger pl-3 d-none"></small>
                </div>
                <div class="form-group password-container wow fadeInUp" data-wow-delay="0.6s">
                    <div class="mb-2">Password</div>
                    <input type="password" class="form-control form-control-user" id="password" name="password"
                        placeholder="Password">
                    <i class="bx bx-low-vision eye-hide" onclick="toggle()" id="eyes"></i>
                    <small class="notyf-err text-danger pl-3 d-none"></small>
                </div>
                <div class="form-group wow fadeInUp" data-wow-delay="0.9s">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_me">
                        <label class="custom-control-label" for="customCheck">Stay logged in</label>
                    </div>
                </div>
                <button type="button" onclick="authLogin()" class="btn btn-primary btn-user btn-block wow fadeInUp"
                    id="btn-auth" data-wow-delay="1.1s">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>
<div class="container" style="margin-top:70px;"s>
    <div class="pagetitle mx-auto">
        <h1>Profile</h1>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="<?=_DIR_ROOT_?>/public/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2><?=$info['name'] ?? 'No name'?></h2>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Họ tên</div>
                                    <div class="col-lg-9 col-md-8"><?=$info['name'] ?? 'No name'?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Ngày sinh</div>
                                    <div class="col-lg-9 col-md-8"><?=$info['birthday'] ?? ''?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Địa chỉ</div>
                                    <div class="col-lg-9 col-md-8"><?=$info['address'] ?? ''?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">email</div>
                                    <div class="col-lg-9 col-md-8"><?=$info['email'] ?? ''?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
                                    <div class="col-lg-9 col-md-8"><?=$info['phone'] ?? ''?></div>
                                </div>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
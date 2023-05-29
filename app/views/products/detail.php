<div class="container" style="margin-top:70px;"s>
    <div class="pagetitle mx-auto">
        <h1>Chi tiết sản phẩm</h1>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                                <h5 class="card-title">Sản phẩm <?=$detail_product['id'] ?? 0?></h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Tên sản phẩm</div>
                                    <div class="col-lg-9 col-md-8"><?=$detail_product['name'] ?? 'Chưa rõ'?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Ảnh sản phẩm</div>
                                    <div class="col-lg-9 col-md-8"><img width="150px" src="<?=_DIR_ROOT_."/".$detail_product['image'] ?? ''?>" alt=""></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Giá</div>
                                    <div class="col-lg-9 col-md-8"><?=$detail_product['price'] ?? '0'?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Số lượng</div>
                                    <div class="col-lg-9 col-md-8"><?=$detail_product['quantity'] ?? '0'?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Mô tả</div>
                                    <div class="col-lg-9 col-md-8"><?=$detail_product['description'] ?? ''?></div>
                                </div>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<div class="container" style="margin-top:70px;">
    <div class="col-lg-6  mx-auto">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Cập nhật khách hàng</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <input type="hidden" name="id" value="<?=$info['id'] ?? 0?>">
                        <label for="inputNanme4" class="form-label">Tên khách hàng</label>
                        <input type="text" name="name" class="form-control" id="inputNanme" value="<?=$_POST['name'] ?? $info['name']?>">
                        <span class="text-danger fs-8"><?=$errors['name'] ?? ''?></span>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Ngày sinh</label>
                        <input type="date" name="birthday" class="form-control" id="inputEmail" value="<?=$_POST['birthday'] ??$info['birthday'] ?? ''?>">
                        <span class="text-danger fs-8"><?=$errors['birthday'] ?? ''?></span>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" id="inputPassword" value="<?=$_POST['address'] ??$info['address'] ?? ''?>">
                        <span class="text-danger fs-8"><?=$errors['address'] ?? ''?></span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="inputAddress" placeholder="" value="<?=$_POST['email'] ??$info['email'] ?? ''?>">
                        <span class="text-danger fs-8"><?=$errors['email'] ?? ''?></span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" id="inputAddress" placeholder="" value="<?=$_POST['phone'] ??$info['phone'] ?? ''?>">
                        <span class="text-danger fs-8"><?=$errors['phone'] ?? ''?></span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="image" class="form-control" placeholder="" accept="image/*">
                        <span class="text-danger fs-8"><?=$errors['image'] ?? ''?></span>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?=_DIR_ROOT_?>/customer/list_customer" class="btn btn-primary">Back</a>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div
</div>
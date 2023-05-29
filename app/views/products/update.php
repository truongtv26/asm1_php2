
<div class="container" style="margin-top:70px;">
    <div class="col-lg-6  mx-auto">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Cập nhật sản phẩm</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" id="inputNanme" value="<?=$_POST['name'] ?? $detail_product['name']?>">
                        <span class="text-danger fs-8"><?=$errors['name'] ?? ''?></span>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Giá sản phẩm</label>
                        <input type="text" name="price" class="form-control" id="inputEmail" value="<?=$_POST['price'] ?? $detail_product['price']?>">
                        <span class="text-danger fs-8"><?=$errors['price'] ?? ''?></span>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Số lượng</label>
                        <input type="text" name="quantity" class="form-control" id="inputPassword" value="<?=$_POST['quantity'] ?? $detail_product['quantity']?>">
                        <span class="text-danger fs-8"><?=$errors['quantity'] ?? ''?></span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Mô tả</label>
                        <input type="text" name="description" class="form-control" placeholder="" value="<?=$_POST['description'] ?? $detail_product['description']?>">
                        <span class="text-danger fs-8"><?=$errors['desciption'] ?? ''?></span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Ảnh Sản phẩm</label>
                        <input type="file" name="image" class="form-control" placeholder="" accept="image/*">
                        <span class="text-danger fs-8"><?=$errors['image'] ?? ''?></span>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?=_DIR_ROOT_?>/danh-sach-san-pham" class="btn btn-primary">Back</a>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div
</div>
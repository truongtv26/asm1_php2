<div class="container" style="margin-top:70px;">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Danh sách sản phẩm</h5>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col" colspan="3"><a href="<?=_DIR_ROOT_?>/them-san-pham">Thêm sản phẩm</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($list_product ?? [] as $product):
                        extract($product);
                        ?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$name?></td>
                            <td><img width="100px" src="<?=_DIR_ROOT_ . "/".$image?>" alt=""></td>
                            <td><?=number_format($price, 0, '', ',')?> VND</td>
                            <td><?=$quantity?></td>
                            <td><?=$description?></td>
                            <td><a href="<?=_DIR_ROOT_?>/chi-tiet-san-pham/<?=$id?>">detail</a></td>
                            <td><a href="<?=_DIR_ROOT_?>/cap-nhat-san-pham/<?=$id?>" class="text-success">update</a></td>
                            <td><a onclick="return confirm('Xác nhận xóa')" href="<?=_DIR_ROOT_?>/xoa-san-pham/<?=$id?>" class="text-danger">delete</a></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
        </div>
    </div>
</div>


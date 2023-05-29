<div class="container" style="margin-top:70px;">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin khách hàng</h5>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col" colspan="3"><a href="<?=_DIR_ROOT_?>/them-khach-hang">Thêm khách hàng</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data_content ?? [] as $customer):
                        extract($customer);
                        $year_old = date_diff(date_create($birthday), date_create(date('Y-m-d')))->format('%y');
                        ?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$name?></td>
                            <td><img class="rounded-circle" width="50" src="<?=_DIR_ROOT_ . "/".$image?>" alt=""></td>
                            <td class="text-nowrap"><?=$birthday?><br>(<?=$year_old?> tuổi)</td>
                            <td><?=$address?></td>
                            <td><?=$email?></td>
                            <td><?=$phone?></td>
                            <td><a href="<?=_DIR_ROOT_?>/chi-tiet-khach-hang/<?=$id?>">detail</a></td>
                            <td><a href="<?=_DIR_ROOT_?>/cap-nhat-khach-hang/<?=$id?>" class="text-success">update</a></td>
                            <td><a onclick="return confirm('Xác nhận xóa')" href="<?=_DIR_ROOT_?>/xoa-khach-hang/<?=$id?>" class="text-danger">delete</a></td>
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


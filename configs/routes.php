<?php
/*Customer Router*/
$routes['khach-hang'] = 'Customer';
$routes['danh-sach-khach-hang'] = 'Customer/list_customer';
$routes['them-khach-hang'] = 'Customer/add';
$routes['cap-nhat-khach-hang'] = 'Customer/update';
$routes['xoa-khach-hang'] = 'Customer/delete';
$routes['chi-tiet-khach-hang'] = 'Customer/detail';
$routes['khach-hang/chi-tiet'] = 'Customer/detail';

/*Product Router*/
$routes['san-pham'] = 'Product/list_product';
$routes['danh-sach-san-pham'] = 'Product/list_product';
$routes['them-san-pham'] = 'Product/add';
$routes['chi-tiet-san-pham'] = 'Product/detail';
$routes['cap-nhat-san-pham'] = 'Product/update';
$routes['xoa-san-pham'] = 'Product/delete';


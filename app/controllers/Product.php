<?php

namespace controllers;

use core\Controller;
use core\Request;

class Product extends Controller
{
    private object $model;
    public function __construct()
    {
        $this->model = $this->model('Product');
    }

    public function list_product() {
        $this->data['main']['list_product'] = $this->model->listProduct();
        $this->data['page_title'] = 'Danh sách sản phẩm';
        $this->data['layout'] = 'products/list';
        $this->render('client', $this->data);

        if (isset($_SESSION['notify'])) {
            $this->data['message'] = $_SESSION['notify'];
            $this->render('notify/modal', $this->data);
            unset($_SESSION['notify']);
        }
    }

    public function detail($id = 0) {
        if ($id > 0)
            $this->data['main']['detail_product'] = $this->model->detailProduct($id);

        $this->data['page_title'] = 'Chi tiết sản phẩm';
        $this->data['layout'] = "products/detail";
        $this->render('client', $this->data);
    }

    public function add() {
        $req = new Request();

        $req->setRules([
            'name'=>'required|min:5|max:30',
            'price'=>'required|min:1|number',
            'quantity'=>'required|min:1|number',
            'image'=>'required'
        ]);

        $req->setMessage([
            'name.required' => 'Trường này không được để trống',
            'name.min' => 'Tối thiểu 5 ký tự',
            'name.max' => 'Tối đa 30 ký tự',
            'price.required' => 'Trường này không được để trống',
            'price.min' => 'Giá tối thiểu là 1',
            'price.number' => 'Vui lòng nhập số',
            'quantity.required' => 'Trường này không được để trống',
            'quantity.min' => 'Số lượng tối thiểu là 1',
            'quantity.number' => 'Vui lòng nhập số',
            'image.required' => 'Trường này không được để trống',
        ]);

        $req->setInputImage('image');
        $req->setTargetImage('public/assets/img/product/');

        if ($req->isPost()) {
            if ($req->isValid()) {
                $data = $req->getFields();
                $data['image'] = $req->uploadImage();
                $this->model->insertProduct($data);
                $_SESSION['notify'] = '<span class="text-success">Thêm mới sản phẩm thành công</span>';
                header("location:http://localhost/asm1_php2/danh-sach-san-pham");
            }

        }

        $this->data['main']['errors'] = $req->getError();
        $this->data['page_title'] = 'Thêm sản phẩm';
        $this->data['layout'] = "products/add";
        $this->render('client', $this->data);
    }

    public function update($id = 0) {
        if ($id > 0)
            $this->data['main']['detail_product'] = $this->model->detailProduct($id);

        $req = new Request();

        $req->setRules([
            'name'=>'required|min:5|max:30',
            'price'=>'required|min:1|number',
            'quantity'=>'required|min:1|number'
        ]);

        $req->setMessage([
            'name.required' => 'Trường này không được để trống',
            'name.min' => 'Tối thiểu 5 ký tự',
            'name.max' => 'Tối đa 30 ký tự',
            'price.required' => 'Trường này không được để trống',
            'price.min' => 'Giá tối thiểu là 1',
            'price.number' => 'Vui lòng nhập số',
            'quantity.required' => 'Trường này không được để trống',
            'quantity.min' => 'Số lượng tối thiểu là 1',
            'quantity.number' => 'Vui lòng nhập số'
        ]);

        $req->setInputImage('image');
        $req->setTargetImage('public/assets/img/product/');

        if ($req->isPost()) {
            $arrChange = array_diff_assoc($req->getFields(), $this->data['main']['detail_product']);
            $arrChange = array_filter($arrChange);
            if ($arrChange) {
                if ($req->isValid()) {
                    $arrChange['image'] = $req->uploadImage();
                    $this->model->updateProduct($id, $arrChange);
                    $_SESSION['notify'] = '<span class="text-success">Cập nhật sản phẩm thành công</span>';
                    header("location:http://localhost/asm1_php2/danh-sach-san-pham");
                }
            }else {
                $this->data['message'] = '<span class="text-warning">Thông tin sản phẩm không thay đổi</span>';
                $this->render('notify/modal', $this->data);
                unset($_SESSION['notify']);
            }

        }


        $this->data['main']['errors'] = $req->getError();
        $this->data['layout'] = "products/update";
        $this->data['page_title'] = "Cập nhật sản phẩm";
        $this->render('client', $this->data);
    }
    public function delete($id = 0) {
        if ($id > 0) {
            $field = 'image';
            $old_image = $this->model->getFieldFromTable(0, 'product',$field, "id=$id");
            $this->model->deleteProduct($id);
            if (file_exists($old_image[$field]))
                unlink($old_image[$field]);
            $_SESSION['notify'] = '<span class="text-success">Xóa thành công</span>';
            header("location:http://localhost/asm1_php2/danh-sach-san-pham");
        }
    }

}
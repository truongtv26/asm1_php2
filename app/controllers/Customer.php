<?php

namespace controllers;

use core\Controller;
use core\Request;

class Customer extends Controller
{
    private bool|object $model;

    public function __construct()
    {
        $this->model = $this->model('Customer');
    }

    public function list_customer() {
        $this->data['main']['data_content'] = $this->model->listCustomer();
        $this->data['layout'] = 'customers/list';
        $this->data['page_title'] = 'Danh sách khách hàng';
        $this->render('client', $this->data);


        if (isset($_SESSION['notify'])) {
            $this->data['message'] = $_SESSION['notify'];
            $this->render('notify/modal', $this->data);
            unset($_SESSION['notify']);
        }
    }

    public function add() {
        $req = new Request();

        $req->setRules([
            'name' => 'required|min:2|max:20|only:customer',
            'email' => 'required|email',
            'birthday' => 'required',
            'image' => 'required|filemin:1|filemax:2'
        ]);

        $req->setMessage([
            'name.required' => 'Trường này không được để trống',
            'name.min' => 'Tối thiểu 2 ký tự',
            'name.max' => 'Tối đa 20 ký tự',
            'name.only' => 'Tên khách hàng đã tồn tại',
            'email.required' => 'Trường này không được để trống',
            'email.email' => 'Định dạng email không hợp lệ',
            'birthday.required' => 'Trường này không được để trống',
            'image.required' => 'Vui lòng chọn ảnh',
            'image.filemin' => 'Tối thiểu 1MB',
            'image.filemax' => 'Tối đa 2MB'
        ]);

        $req->setTargetImage('public/assets/img/profile/');
        $req->setInputImage('image');

        if ($req->isPost()) {
            $isValid = $req->isValid();
            if ($isValid) {
                $data = $req->getFields();
                $data['image'] = $req->uploadImage();
                $this->model->insertCustomer($data);
                $_SESSION['notify'] = '<span class="text-success">Thêm mới khách hàng thành công</span>';
                header("location:http://localhost/asm1_php2/customer/list_customer");
            }
        }

        $this->data['main']['errors'] = $req->getError();
        $this->data['main']['dataFields'] = $req->getFields();
        $this->data['layout'] = 'customers/add';
        $this->data['page_title'] = 'Thêm khách hàng';
        $this->render('client', $this->data);
    }

    public function detail($id = 0) {
        if ($id > 0) {
            $this->data['main']['info'] = $this->model->detailCustomer($id);
        }

        $this->data['layout'] = 'customers/detail';
        $this->data['page_title'] = 'Thông tin khách hàng';
        $this->render('client', $this->data);
    }
    public function update($id = 0) {
        $req = new Request();

        $req->setRules([
            'name' => 'required|min:2|max:20',
            'email' => 'required|email',
            'birthday' => 'required'
        ]);

        $req->setMessage([
            'name.required' => 'Trường này không được để trống',
            'name.min' => 'Tối thiểu 2 ký tự',
            'name.max' => 'Tối đa 20 ký tự',
            'email.required' => 'Trường này không được để trống',
            'email.email' => 'Định dạng email không hợp lệ',
            'birthday.required' => 'Trường này không được để trống'
        ]);

        $req->setTargetImage('public/assets/img/profile/');
        $req->setInputImage('image');

        if ($req->isPost()) {

            $fieldsChange = array_diff_assoc($req->getFields(), $this->model->detailCustomer($id));
            $fieldsChange = array_filter($fieldsChange);
            if ($fieldsChange) {
                // kiểm tra người dùng cập nhật lại tên
                if (!empty($fieldsChange['name'])) {
                    $req->setRules(['name' => 'only:customer']);
                    $req->setMessage(['name.only'=>'Tên khách hàng đã tồn tại']);
                }

                // validate
                $isValid = $req->isValid();
                if ($isValid) {
                    $fieldsChange['image'] = $req->uploadImage();
                    $this->model->updateCustomer($id, $fieldsChange);
                    $_SESSION['notify'] = '<span class="text-success">Cập nhật khách hàng thành công</span>';
                    header("location:http://localhost/asm1_php2/danh-sach-khach-hang");
                }
            } else {
                $this->data['message'] = '<span class="text-warning">Thông tin khách hàng không thay đổi</span>';
                $this->render('notify/modal', $this->data);
                unset($_SESSION['notify']);
            }
        }

        if ($id > 0)
            $this->data['main']['info'] = $this->model->detailCustomer($id);

        $this->data['main']['errors'] = $req->getError();
        $this->data['layout'] = 'customers/update';
        $this->data['page_title'] = 'Cập nhật khách hàng';
        $this->render('client', $this->data);
    }
    public function delete($id = 0) {
        if ($id > 0) {
            $field = 'image';
            $old_image = $this->model->getFieldFromTable(0, 'customer',$field, "id=$id");
            $this->model->deleteCustomer($id);
            if (file_exists($old_image[$field]))
                unlink($old_image[$field]);
            $_SESSION['notify'] = '<span class="text-success">Xóa thành công</span>';
            header("location:http://localhost/asm1_php2/customer/list_customer");
        }
    }
}
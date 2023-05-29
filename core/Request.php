<?php

namespace core;

class Request
{
    private $rules = [], $messages = [], $targetImage, $inputName;
    public $errors;

    public function getFields() {
        $data = [];
        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $data[$key] = $value;
            }
        }

        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $data[$key] = $value;
            }

            if (isset($_FILES)) {
                foreach ($_FILES as $key => $value) {
                    if (!empty($value['name'])){
                        $data[$key] = 'file selected';
                    }else {
                        $data[$key] = '';
                    }
                }
            }
        }

        return $data;
    }

    public function uploadImage() {
        $file = $_FILES[$this->inputName];
        if (!$file['error']) {
            $target = $this->targetImage . $file['name'];
            while (file_exists($target)) {
                $target = $this->targetImage . rand(1000000, 100000000000).".".pathinfo($target,PATHINFO_EXTENSION);
            }
            if (move_uploaded_file($file['tmp_name'], $target))
                return $target;
        }

        return false;
    }

    public function getMethod():string {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost():bool {
        if ($this->getMethod() == 'post')
            return true;
        return false;
    }
    public function isGet():bool {
        if ($this->getMethod() == 'get')
            return true;
        return false;
    }


    public function isValid() {
        $isValid = true;
        if (!empty($this->rules)) {

            $dataFields = $this->getFields();

            foreach ($this->rules as $fieldName => $rules) {
                $ruleItem = explode('|',$rules);

                foreach ($ruleItem as $rule) {
                    $ruleArr = explode(':', $rule);

                    $ruleName = reset($ruleArr);
                    $ruleValue = '';
                    if (count($ruleArr) > 1) {
                        $ruleValue = end($ruleArr);
                    }

                    if ($ruleName == 'required') {
                        if (empty(trim($dataFields[$fieldName]))) {
                            $this->setError($fieldName, $ruleName);
                            $isValid = false;
                        }
                    }
                    if ($ruleName == 'min') {
                        if (strlen(trim($dataFields[$fieldName])) < $ruleValue) {
                            $this->setError($fieldName, $ruleName);
                            $isValid = false;
                        }
                    }
                    if ($ruleName == 'max') {
                        if (strlen(trim($dataFields[$fieldName])) > $ruleValue) {
                            $this->setError($fieldName, $ruleName);
                            $isValid = false;
                        }
                    }
                    if ($ruleName == 'email') {
                        if (!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)) {
                            $this->setError($fieldName, $ruleName);
                            $isValid = false;
                        }
                    }
                    if ($ruleName == 'match') {
                        if (trim($dataFields[$fieldName]) != trim($dataFields[$ruleValue])) {
                            $this->setError($fieldName, $ruleName);
                            $isValid = false;
                        }
                    }
                    if ($ruleName == 'only') {
                        $valuesExist = Database::$db->getFieldFromTable(1,$ruleValue, $fieldName);

                        foreach ($valuesExist as $key => $value) {
                            if (!strcmp($dataFields[$fieldName], $valuesExist[$key][$fieldName])) {
                                $this->setError($fieldName, $ruleName);
                                $isValid = false;
                                break;
                            }
                        }
                    }
                    if ($ruleName == 'filemin') {
                        $file = $_FILES[$fieldName];
                        if ($file['size'] < (1024*1024) * (int)$ruleValue){
                            $this->setError($fieldName, $ruleName);
                            $isValid = false;
                        }
                    }
                    if ($ruleName == 'filemax') {
                        $file = $_FILES[$fieldName];
                        if ($file['size'] > (1024*1024) * (int)$ruleValue) {
                            $this->setError($fieldName, $ruleName);
                            $isValid = false;
                        }
                    }

                }
            }
        }

        return $isValid;
    }

    public function setRules($rules = []) {
        $this->rules = $rules;
    }

    public function setMessage($messages = []) {
        $this->messages = $messages;
    }

    public function setTargetImage($target) {
        $this->targetImage = $target;
    }
    public function setInputImage($inputName) {
        $this->inputName = $inputName;
    }

    public function setError($fieldName, $ruleName) {

        if ($this->messages) {
            if (array_key_exists("$fieldName.$ruleName", $this->messages))
                $this->errors[$fieldName][$ruleName] = $this->messages[$fieldName . '.' . $ruleName];
        }
    }
    public function getError($fieldName = '') {

        if (!empty($this->errors)) {
            if (empty($fieldName)) {
                $errors = [];
                foreach ($this->errors as $fieldName => $error) {
                    $errors[$fieldName] = reset($error);
                }
                return $errors;
            }
            return reset($this->errors[$fieldName]);
        }
        return false;
    }


}
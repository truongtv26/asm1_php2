<?php

namespace core;

class Request
{
    private $rules = [], $messages = [];
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
        }

        return $data;
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

    public function setRules($rules = []) {
        $this->rules = $rules;
    }

    public function setMessage($messages = []) {
        $this->messages = $messages;
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
                        if (trim($dataFields[$fieldName]) != trim()) {
                            $this->setError($fieldName, $ruleName);
                            $isValid = false;
                        }
                    }
                    if ($ruleName == 'only') {
                        $valuesExist = Database::$db->getFieldFromTable($ruleValue, $fieldName);

                        foreach ($valuesExist as $key => $value) {
                            // kiểm tra sự thay đổi giá trị
                            if (strcmp($dataFields[$fieldName], $valuesExist[$key][$fieldName]) == 0) {
                                $this->setError($fieldName, $ruleName);
                                $isValid = false;
                            }
                            // kiểm tra giá trị đã tồn tại
                            if (!strcmp($dataFields[$fieldName], $valuesExist[$key][$fieldName])) {
                                $this->setError($fieldName, $ruleName);
                                $isValid = false;
                                break;
                            }
                        }
                    }

                }
            }
        }

        return $isValid;
    }

    public function setError($fieldName, $ruleName) {
        if ($this->messages) {
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
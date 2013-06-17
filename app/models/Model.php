<?php

class Model extends PropertyBase {

    private $errors = array();

    public function addError($key, $value) {
        if (!array_key_exists($key, $this->errors)) {
            $this->errors[$key] = $value;
        }
    }

    public function hasError($key = NULL) {
        if (isset($key)) {
            return array_key_exists($key, $this->errors);
        }
        return !empty($this->errors);
    }

    protected function get_errors() {
        return $this->errors;
    }

}

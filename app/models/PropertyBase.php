<?php

class PropertyBase {

    public function __get($name) {
        if (method_exists($this, ($method = 'get_' . $name))) {
            return $this->$method();
        } else {
            throw new Exception('Could not find property: ' . $name . '.');
        }
    }

    public function __set($name, $value) {
        if (method_exists($this, ($method = 'set_' . $name))) {
            $this->$method($value);
        } else {
            throw new Exception('Could not find property: ' . $name . '.');
        }
    }

}

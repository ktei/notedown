<?php

class Column {

    const ATTR_PRIMARY_KEY = 1;
    const ATTR_AUTO_INCREAMENT = 2;
    const ATTR_REQUIRED = 3;
    
    const DATA_TYPE_INT = 11;
    const DATA_TYPE_BOOL = 12;
    const DATA_TYPE_DATE = 13;
    const DATA_TYPE_STR = 14;

    private $name;
    private $type = self::DATA_TYPE_STR;
    private $attributes = array();
    private $default;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function getDefault() {
        return $this->default;
    }

    public function setDefault($default) {
        $this->default = $default;
        return $this;
    }

    public function hasAttribute($attr) {
        return in_array($attr, $this->attributes);
    }

    public function addAttribute($attr) {
        if (!in_array($attr, $this->attributes)) {
            $this->attributes[] = $attr;
        }
        return $this;
    }

    public function isRequired() {
        return $this->hasAttribute(self::ATTR_PRIMARY_KEY) ||
                $this->hasAttribute(self::ATTR_REQUIRED);
    }

}

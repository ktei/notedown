<?php

class SubmitModel extends Model {

    public function submit() {
        $this->validate();
        if (!$this->hasError()) {
            $execResult = $this->_do();
            if ($execResult === false) {
                return false;
            }
            return true;
        }
        return false;
    }

    public function validate() {
        return true;
    }

    protected function _do() {
        
    }

}


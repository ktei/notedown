<?php

function smarty_function_field_error($params, $template) {

    if (!empty($params) && is_array($params)
            && array_key_exists('model', $params)
            && array_key_exists('name', $params)) {

        $model = $params['model'];
        $name = $params['name'];
        if ($model->hasError($name)) {
            return '<small class="error">' . $model->errors[$name] . '</small>';
        }
    }

    return '';
}


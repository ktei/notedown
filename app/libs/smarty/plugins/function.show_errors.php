<?php

function smarty_function_show_errors($params, $template) {

    if (!empty($params) && is_array($params)
            && array_key_exists('model', $params)) {

        $model = $params['model'];
        $name = null;
        if (array_key_exists('name', $params)) {
            $name = $params['name'];
        }
        $html = '<div data-alert class="alert-box alert">';
        if (array_key_exists('title', $params)) {
            $html = $html . '<h4>' . $params['title'] . '</h4>';
        }

        $hasError = false;
        if (isset($name)) {
            if ($model->hasError($name)) {
                $hasError = true;
                $html = $html . $model->errors[$name];
            }
        } else {
            // Ignore error name, just show them all
            $errors = array();
            foreach ($model->errors as $k => $v) {
                $errors[] = $v;
            }
            
            if (!empty($errors)) {
                $hasError = true;
                $html = $html . implode('<br>', $errors);
            }
        }
        
        if (!$hasError) {
            return '';
        }
        
        if (array_key_exists('close', $params) && $params['close'] == true) {
            $html = $html . '<a href="#" class="close">&times;</a>';
        }
        $html = $html . '</div>';
        return $html;
    }

    return '';
}


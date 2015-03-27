<?php

/*
 * Validator.php Class
 * 
 *  * Validation :
 *      - Stings:           checkStings
 *      - email:            checkEmail
 *      - url               checkUrl
 *      - ip                checkIP
 *      - integer value:    checkInteger
 *      - requied:          checkRequired
 * 
 *  * Sanitization:         sanitizeItem
 *      - Stings
 *      - email
 *      - url
 *      - ip
 *      - INT
 * 
 *  * is_clean_file By: CLIPRZ
 */

/**
 * Description of Validator
 *
 * @author Ali7amdi
 */
class Validator {

    function validate($data, $rules) {
        $valid = TRUE;

        foreach ($rules as $key => $rule) {
            // Extract rules 
            $callbacks = explode('|', $rule);
            foreach ($callbacks as $callback) {
                $value = isset($data[$key]) ? $data[$key] : NULL;
                if (is_array($value)) {
                    foreach ($value as $val) {
                        if ($this->$callback($val, $key) == FALSE)
                            $valid = FALSE;
                    }
                } else {
                    if ($this->$callback($value, $key) == FALSE)
                        $valid = FALSE;
                }
            }
        }
        return $valid;
    }

    function checkStings($value, $key) {
        $pattern = "/^[a-zA-Z\p{Cyrillic}0-9\s\-]+$/u";
        $validate = preg_match($pattern, $value);

        if ($validate == FALSE)
            throw new Exception("Error: the $key must be a string");

        return $validate;
    }

    function checkEmail($value, $key) {
        $validate = filter_var($value, FILTER_VALIDATE_EMAIL);

        if ($validate == FALSE)
            throw new Exception("Error: the $key must be a valid email");

        return $validate;
    }

    function checkUrl($value, $key) {
        $validate = filter_var($value, FILTER_VALIDATE_URL);

        if ($validate == FALSE)
            throw new Exception("Error: the $key must be a valid URL");

        return $validate;
    }

    function checkIP($value, $key) {
        $validate = filter_var($value, FILTER_VALIDATE_IP);

        if ($validate == FALSE)
            throw new Exception("Error: the $key must be a valid IP");

        return $validate;
    }

    function checkInteger($value, $key) {
        $validate = filter_var($value, FILTER_VALIDATE_INT);

        if ($validate == FALSE)
            throw new Exception("Error: the $key must be a valid INT");

        return $validate;
    }

    function checkRequired($value, $key) {
        $validate = !empty($value);

        if ($validate == FALSE)
            throw new Exception("Error: the $key is required");

        return $validate;
    }

    function sanitizeItem($value, $key) {
        $flag = NULL;

        switch ($key) {
            case 'email':
                $value = substr($value, 0, 250);
                $filter = FILTER_SANITIZE_EMAIL;
                break;

            case 'url':
                $filter = FILTER_SANITIZE_URL;
                break;

            case 'int':
                $filter = FILTER_SANITIZE_NUMBER_INT;
                break;

            default:
                $filter = FILTER_SANITIZE_STRING;
                $flag = FILTER_FLAG_NO_ENCODE_QUOTES;
                break;
        }
        $validate = filter_var($value, $filter, $flag);
        if ($validate == FALSE)
            throw new Exception("Error: the $key is invalid!");

        return $validate;
    }

    /**
     * A simple function to check file from bad codes.
     *
     * @param (string) $file - file path.
     * @author Yousef Ismaeil - Cliprz[at]gmail[dot]com.
     */
    function is_clean_file($file) {
        if (file_exists($file)) {
            $contents = file_get_contents($file);
        } else {
            exit($file . " Not exists.");
        }

        if (preg_match('/(base64_|eval|system|shell_|exec|php_)/i', $contents)) {
            return true;
        } else if (preg_match("#&\#x([0-9a-f]+);#i", $contents)) {
            return true;
        } elseif (preg_match('#&\#([0-9]+);#i', $contents)) {
            return true;
        } elseif (preg_match("#([a-z]*)=([\`\'\"]*)script:#iU", $contents)) {
            return true;
        } elseif (preg_match("#([a-z]*)=([\`\'\"]*)javascript:#iU", $contents)) {
            return true;
        } elseif (preg_match("#([a-z]*)=([\'\"]*)vbscript:#iU", $contents)) {
            return true;
        } elseif (preg_match("#(<[^>]+)style=([\`\'\"]*).*expression\([^>]*>#iU", $contents)) {
            return true;
        } elseif (preg_match("#(<[^>]+)style=([\`\'\"]*).*behaviour\([^>]*>#iU", $contents)) {
            return true;
        } elseif (preg_match("#</*(applet|link|style|script|iframe|frame|frameset|html|body|title|div|p|form)[^>]*>#i", $contents)) {
            return true;
        } else {
            return false;
        }
    }

}

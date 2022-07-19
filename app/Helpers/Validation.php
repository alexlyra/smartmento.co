<?php

use Illuminate\Http\UploadedFile;

if (!function_exists('filledWithContent')) {
    function filledWithContent (array $haystack, string $needle, array $options = ['type' => 'string', 'in' => [], 'max' => null, 'min' => null]) {
        if (!$haystack) {
            return false;
        } else if (gettype($haystack) !== 'array') {
            return false;
        } else if (gettype($haystack) === 'array' && count($haystack) <= 0) {
            return false;
        }

        $options['type'] = isset($options['type']) && gettype($options['type']) === 'string' && trim($options['type']) !== '' && $options['type'] !== null ? $options['type'] : 'string';

        if (!isset($haystack[$needle])) {
            return false;
        } else if ($haystack[$needle] === null) {
            return false;
        } else if ($haystack[$needle] === 'null') {
            return false;
        } else if ($haystack[$needle] === 'undefined') {
            return false;
        }


        if ($options['type'] === 'string') {
            if (gettype($haystack[$needle]) === 'string' && trim($haystack[$needle]) === '') {
                return false;
            }

            if (isset($options['in']) && gettype($options['in']) === 'array' && count($options['in']) > 0) {
                if (!in_array($haystack[$needle], $options['in'])) {
                    return false;
                }
            }

            if (isset($options['min']) && gettype($options['min']) === 'integer' && $options['min'] !== null) {
                if (strlen($haystack[$needle]) < $options['min']) {
                    return false;
                }
            }

            if (isset($options['max']) && gettype($options['max']) === 'integer' && $options['max'] !== null) {
                if (strlen($haystack[$needle]) > $options['max']) {
                    return false;
                }
            }
        } else if ($options['type'] === 'array') {
            if (count($haystack[$needle]) <= 0) {
                return false;
            }
        } else if ($options['type'] === 'boolean') {
            if (gettype($haystack[$needle]) === 'boolean') {
                if (!in_array($haystack[$needle], [true, false])) {
                    return false;
                }
            } else if (gettype($haystack[$needle]) === 'string') {
                if (!in_array($haystack[$needle], ['true', 'false'])) {
                    return false;
                }
            } else {
                return false;
            }
        }else if ($options['type'] === 'file') {
            if (!($haystack[$needle] instanceof UploadedFile)) {
                return false;
            }

            if (isset($options['mimes']) && gettype($options['mimes']) === 'array') {
                if (!in_array($haystack[$needle]->getClientMimeType(), $options['mimes'])) {
                    return false;
                }
            }
        } else if ($options['type'] === 'json') {
            if (in_array(gettype($haystack[$needle]), ['object', 'array', 'string'])) {
                if (gettype($haystack[$needle]) === 'object') {
                    if (isset($options['has']) && gettype($options['has']) === 'array') {
                        foreach ($options['has'] as $has) {
                            if (!in_array($has, get_object_vars($haystack[$needle]))) {
                                return false;
                            }
                        }
                    }
                } else if (gettype($haystack[$needle]) === 'array') {
                    if (isset($options['has']) && gettype($options['has']) === 'array') {
                        foreach ($options['has'] as $has) {
                            if (!in_array($has, array_keys($haystack[$needle]))) {
                                return false;
                            }
                        }
                    }
                } else if (gettype($haystack[$needle]) === 'string') {
                    if (isset($options['has']) && gettype($options['has']) === 'array') {
                        foreach ($options['has'] as $has) {
                            if (!in_array($has, array_keys(json_decode($haystack[$needle], true)))) {
                                return false;
                            }
                        }
                    }
                }
            } else {
                return false;
            }
        }

        return true;
    }
}

?>
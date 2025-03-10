<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Json implements CastsAttributes {
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get ($model, string $key, $value, array $attributes) {
        if (!$value || is_null($value) || empty($value)) {
            return $value;
        }

        return json_decode($value, true);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set ($model, string $key, $value, array $attributes) {
        if (!$value || is_null($value) || empty($value)) {
            return $value;
        }

        return json_encode($value);
    }
}

<?php

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {

        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'mm-active';

        } else {
            return '';
        }
    }
}
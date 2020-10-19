<?php

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {

        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'menu-item-here menu-item-open menu-item-here menu-item-open';

        } else {
            return '';
        }
    }
}
if (!function_exists('getSubMenuActivo')) {
    function getSubMenuActivo($ruta)
    {

        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'menu-item-active';

        } else {
            return '';
        }
    }
}
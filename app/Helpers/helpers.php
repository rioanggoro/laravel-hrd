
<?php

function set_active($routes)
{
    foreach ($routes as $route) {
        if (request()->is($route)) {
            return 'active';
        }
    }
    return '';
}

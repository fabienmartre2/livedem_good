<?php

spl_autoload_register('dev_autoload');
function dev_autoload($class_name) {
    @include LOCALISATION."classes/".$class_name . '.php';
}
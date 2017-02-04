<?php

spl_autoload_extensions('.php');
spl_autoload_register(function($classname){
    set_include_path('./' . __DIR__);
    spl_autoload($classname);
});
<?php

if(file_exists('admin/lib/php/pgConnect.php')){
    require 'admin/lib/php/pgConnect.php';
    require 'admin/lib/php/autoload.php';
}else
    if (file_exists('lib/php/pgConnect.php')){
        require 'lib/php/pgConnect.php';
        require 'lib/php/autoload.php';
    }
<?php
spl_autoload_register(function($name) {
    foreach (glob(PROJECT_PATH . UTILS_DIRNAME . DIRECTORY_SEPARATOR . "*.php") as $filename)
    {
        if(strpos($filename, 'CustomAutoload.php') <= 0)
            include_once $filename;
    }
    
    $include = "";
    
    if(strpos($name, 'Controller') > 0) {
        $include = PROJECT_PATH . CONTROLLERS_DIRNAME . DIRECTORY_SEPARATOR . "$name.php";
    } 
    else if(strpos($name, 'Model') > 0) {
        $include = PROJECT_PATH . MODELS_DIRNAME . DIRECTORY_SEPARATOR . "$name.php";
    }

    if( file_exists($include) ) {
        include $include;
    }
});

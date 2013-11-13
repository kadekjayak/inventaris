<?php
include 'function/session.php';
include 'function/dbFunction.php';
include 'function/function.php';
include 'template/templateFunction.php';
//ambil semua parameter GET di URL
//$params=GetDataGet();
include 'variable.php';
//Switch page default
if(empty($view)) {
    include 'view/home.php';
    print $view;
} else {
    if(file_exists('view/'.$view.'.php')) {
        include 'view/'.$view.'.php';
    } else {
         include 'view/404.php';
    }
    
   /* switch($view) {
        case 'home':
            include 'view/home.php';
            break;
        case 'movie':
            include 'view/movie.php';
            break;
        default:
            include 'view/404.php';
            break;
    } */
}

?>
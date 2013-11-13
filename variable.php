<?php
    $view=isset($_GET['view']) ? $_GET['view'] : '';
    $action=isset($_GET['action']) ? $_GET['action'] : '';
    $page=isset($_GET['page']) ? $_GET['page'] : 1;
    $search=isset($_GET['search']) ? $_GET['search'] : '';
        $q=isset($_GET['q']) ? $_GET['q'] : '';
    $uri=$_SERVER['REQUEST_URI'];
    $head=file_get_contents('view/head.inc');
    $header=file_get_contents('view/header.inc');
    $footer=file_get_contents('view/footer.inc');
    $maxPerPage=5;
    $rowCount='';
    $id=isset($_GET['id']) ? $_GET['id'] : '';


//Database Structure
    
?>
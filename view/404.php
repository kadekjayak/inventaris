<?php 
$pdata=array (
    'title'=>'Page Not Found',
    'header'=>file_get_contents('page/header.inc'),
    'footer'=>file_get_contents('page/footer.inc'),
    'content'=>'sorry page <b> '.$params['page'].'</b> Not Foud'
);

$t=makePage($pdata,'template/main.php');
echo $t;
?>
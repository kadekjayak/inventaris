<?php
    $expire=time()+60*60;
    session_start();
    if(!isset($_COOKIE['user'])) {
        setcookie('user','Guest',$expire); 
    }
?>
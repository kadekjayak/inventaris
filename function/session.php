<?php
    $expire=time()+60*60;
    if(!isset($_COOKIE['user'])) {
        setcookie('user','Guest',$expire); 
    }
	 session_start();
?>
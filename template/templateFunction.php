<?php
    function makePage($data,$tpl) {
		$pageData=$data;
		ob_start();
		require($tpl);
		return ob_get_clean();
	}

    function makeMenu($data,$style='') {
		$it=$data;
		ob_start();
		require("menu.php");
		return ob_get_clean();
	}
    
    function makeAlert($info,$class='success') {
		if(empty($info)) return '';
        ob_start();
		require("alert.php");
		return ob_get_clean();
	}

	function makeForm($data,$method='post',$style='form-horizontal',$action='') {
        global $uri;
        $action=empty($action) ? $uri : $action ;
		$item=$data;
		ob_start();
		require("form.php");
		return ob_get_clean();
	}
	
	function makeTable($data,$tableHead=array(),$tableStyle='table-striped') {
		$item=$data;
		$itemHead=$tableHead;
        ob_start();
		require("table.php");
		return ob_get_clean();
	}

    function makePagination($rcount,$active) {
        global $maxPerPage,$uri;
		$count=ceil($rcount/$maxPerPage);
        if ($count<=1) {return '';}
        
		ob_start();
		require("pagination.php");
		return ob_get_clean();
	}

?>
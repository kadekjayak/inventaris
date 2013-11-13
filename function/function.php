<?php
    function GetDataPost() {
        $v=array();
        foreach($_POST as $key => $value) {
            $v[$key]=$value;
        }
        return $v;
    }

    function GetDataGet() {
        $v=array();
        foreach($_GET as $key => $value) {
            $v[$key]=$value;
        }
        return $v;
    }
    function GetDataRequest() {
        $v=array();
        foreach($_REQUEST as $key => $value) {
            $v[$key]=$value;
        }
        return $v;
    }
    function cleanuri($var) {
        global $uri;
        $url = $uri; // Your input URL
        //$remove = array( 'color', 'size'); // Change this to remove what you want
      
        $parts = parse_url( $url);
        parse_str( $parts['query'], $params);
        
        if(isset($params[$var])) { unset($params[$var]);}
        
        /*foreach( $params as $k => $v) { //ARRAY
            if( in_array( $k, $remove)) {
                unset( $params[$k]);
            }
        }*/ 
        
        $url = $parts['path'] . ((count( $params) > 0) ? '?' . http_build_query( $params) : '');
        return $url;
    }

?>

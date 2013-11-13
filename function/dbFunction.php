<?php
    require 'db.inc';
    
    //koneksi ke DB
    $link=mysqli_connect($host,$username,$password,$database);

    if (!$link) echo mysql_error($link);

    function dbInsert($table,$form_data) {
        global $link;
        //ambil nama key(Table)
        $fields=array_keys($form_data);
        
        //query
        $sql="INSERT INTO ".$table." (`".implode('`,`', $fields)."`) VALUES('".implode("','", $form_data)."')";
        
        //run Return
        echo $sql;
        if(mysqli_query($link,$sql)) {
            return 1;
        } else {
            return 0;   
        }
    }
           
           
/*    function dbSelect($table,$row,$where,$order){
        $sql="SELECT ";
        if(!empty($row)){
            $sql .=$row; 
        }
        $sql .=" FROM ".$table;
        //parsing where
        if(!empty($where)) {
            $sql .=" WHERE ".$where; 
        }
        if(!empty($order)){
            $sql .=" ORDER BY ".array_keys($order);
            if ($order=1) {
                $sql .= " ASC ";
            } else {
                $sql .= " DESC ";   
            }
        }
        $result=mysqli_query($sql);
        if($result) {
            return $result;
        } else {
            return mysqli_error();   
        }
    }
            
*/
    function dbDelete($table,$where) {
        $whereSQL="";
        if(!empty($where)) {
            $i=1;
            foreach ($where as $key => $value) {
                $whereSQL.="'$key' = '$value'";
                if ($i<count($where)) {
                    $whereSQL.=' AND ';   
                }
                $i++;
            }
        }
        
        $sql="DELETE FROM ".$table." WHERE ".$whereSQL;
        if(mysqli_query($sql)) {
            return 1;
        } else {
            return mysqli_error();   
        }
    }


    function dbUpdate($table,$form_data,$where) {
        $whereSQL="";
        global $link;
        $sql="UPDATE ".$table." SET ";
        
        //parsing item yang di set
        $sets=array();
        foreach($form_data as $column => $value) {
	       $sets[] = "`".$column."` = '".$value."'";
        }
        $sql .= implode(', ', $sets);
        
        //parsing where
        if(!empty($where)) {
            $i=1;
            foreach ($where as $key => $value) {
                $whereSQL.="`$key` = '$value'";
                if ($i<count($where)) {
                    $whereSQL.=' AND ';   
                }
                $i++;
            }
        $sql.=" WHERE ".$whereSQL;
        }
        //echo $sql; //debug
        if(mysqli_query($link,$sql)) {
            return 1;
        } else {
            return 0;   
        }
    }
           
        

?>
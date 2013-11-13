<?php 
	include 'view/menu.inc';
    $menu[1]['class']='active';
	$pdata=array(
        'header'=>$header,
        'title'=>'Inventaris',
        'footer'=>$footer,
        'alert'=>'',
        'menu'=>makeMenu($menu),
        'content'=>''
    );
	
    //DELETE ACTION
    if($action=='delete') {
        $sql="DELETE FROM pegawai WHERE NIP='$id'";
        $result=mysqli_query($link,$sql);
        if(!$result) {
            $pdata['content'].=makeAlert(mysqli_error($link),"danger");
            } else {
            $pdata['content'].=makeAlert("Delete Operation Success");
        }
        $uri=cleanuri('action');
        $uri=cleanuri('id');
    }
    
    $table=array(
        'NIP'=>'NIP',
        'nama'=>'Nama',
        'alamat'=>'Alamat',
        'no_telp'=>'Telepon'
    );
    
    //DATA
    $sql="SELECT * from pegawai "; //Base Query
    
    $sql.=!empty($search) ? " WHERE $search LIKE '%$q%'": '';
    
    $result=mysqli_query($link,$sql);
    $rowCount=mysqli_num_rows($result);
    if(!$result) {
        $pdata['alert'].=makeAlert(mysqli_error($link),"danger");
    } else {
        
        $pdata['alert'].=makeAlert("found $rowCount record");
    }
    
    //LIMIT
    if($rowCount > $maxPerPage) {
        $pos=($page-1)*$maxPerPage;
        $sql.="LIMIT $pos,$maxPerPage";
        $result=mysqli_query($link,$sql);
    }
    
    //Data
    $ot=array();
    while ($row=mysqli_fetch_row($result)) $ot[]=array('<a href=index.php?view=add-pegawai&action=edit&id='.$row[0].'>'.$row[0].'</a>',$row[1],$row[2],$row[3],'<a href="'.$uri.'&action=delete&id='.$row[0].'">Delete</a>');
    

    //FORM
    $form[]=array(
            'type'=>'label',
            'title'=>'Cari : '
        );
    
    $form[]=array(
            'name'=>'q',
            'type'=>'text'
        );
    $form[]=array(
            'title'=>'Pada : ',
            'type'=>'label',
        );
    $form[]=array(
            'name'=>'search',
            'type'=>'select',
            'value'=>$table
        );
    $form[]=array(
            'name'=>'view',
            'type'=>'hidden',
            'value'=>$view
        );

    $tableHead=array_values($table);
    $tableHead[]='Action';
    $pdata['content'].=makeForm($form,'get','form-inline');
    $pdata['content'].=makeTable($ot,$tableHead);
    $pdata['content'].='<a class="btn btn-primary" href="?view=add-pegawai">Add New</a>';
    $pdata['content'].=makePagination($rowCount,$page);
    
    //$pdata['menu']=makeMenu($menu);
    //Hasil Akhir
    $t=makePage($pdata,'main.php');
    echo $t;
?>
<?php 
    include 'view/menu.inc';
    $menu[3]['class']='active';
	$pdata=array(
        'header'=>$header,
        'title'=>'Peminjaman',
        'footer'=>$footer,
        'alert'=>'',
        'menu'=>makeMenu($menu),
        'content'=>''
    );
	
    if($action=='delete') {
        $sql="DELETE FROM pinjam WHERE no_pinjam='$id'";
        $result=mysqli_query($link,$sql);
        if(!$result) {
            $pdata['alert'].=makeAlert(mysqli_error($link),"danger");
            } else {
            $pdata['alert'].=makeAlert("Delete Operation Success");
        }
        $uri=cleanuri('action');
        $uri=cleanuri('id');
    }
    
	
	//$pdata['content']= makeForm($form,'test.php');
    $table=array(
        'no_pinjam'=>'No Peminjaman',
        'tgl_pinjam'=>'Tanggal Pinjam',
        'nip'=>'NIP'
    );
    
    $sql="SELECT ".implode(',',array_keys($table))." FROM pinjam "; //Base Query
    
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
    
    $form[]=array(
            'type'=>'label',
            'title'=>'Cari : '
        );
    $form[]=array(
            'name'=>'view',
            'type'=>'hidden',
            'value'=>$view
        );
    $form[]=array(
            'title'=>'Cari',
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

    $ot=array();
    while ($row=mysqli_fetch_row($result)) $ot[]=array('<a href=?view=add-pinjam&action=edit&id='.$row[0].'>'.$row[0].'</a>',
                                                       $row[1],
                                                       '<a href="?view=pegawai&search=nip&q='.$row[2].'">'.$row[2].'</a>',
                                                      '<a href="'.$uri.'&action=delete&id='.$row[0].'">Delete</a> | <a href="?view=pinjam-detail&id='.$row[0].'">Detail</a>');
    $tableHead=array_values($table);
    $tableHead[]='Action';
    $pdata['content'].=makeForm($form,'get','form-inline');
    $pdata['content'].=makeTable($ot,$tableHead);
    $pdata['content'].='<a class="btn btn-primary" href="?view=add-pinjam">Add New</a>';
    $pdata['content'].=makePagination($rowCount,$page);
    
    
    //$pdata['menu']=makeMenu($menu);
    //Hasil Akhir
    $t=makePage($pdata,'main.php');
    echo $t;
?>
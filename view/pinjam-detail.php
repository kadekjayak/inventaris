<?php 
    include 'view/menu.inc';
    $menu[3]['class']='active';
	$pdata=array(
        'header'=>$header,
        'title'=>'Detail Peminjaman',
        'footer'=>$footer,
        'alert'=>'',
        'menu'=>makeMenu($menu),
        'content'=>''
    );
	
    if($action=='delete') {
        $sql="DELETE FROM pinjam_detail WHERE no_detail='$_GET[did]'";
        $result=mysqli_query($link,$sql);
        if(!$result) {
            $pdata['alert'].=makeAlert(mysqli_error($link),"danger");
            } else {
            $pdata['alert'].=makeAlert("Delete Operation Success");
        }
        $uri=cleanuri('action');
        $uri=cleanuri('did');
    }
    
	
	//$pdata['content']= makeForm($form,'test.php');
    $table=array(
        'no_detail'=>'No Detail',
        'no_pinjam'=>'No Peminjaman',
        'no_inventaris'=>'No Inventaris',
        'tgl_pinjam'=>'Tanggal Pinjam',
        'tgl_kembali'=>'Tanggal Kembali'
    );
    
    $sql="SELECT ".implode(',',array_keys($table))." FROM pinjam_detail WHERE no_pinjam=$id "; //Base Query
    
    $sql.=!empty($search) ? " AND $search LIKE '%$q%'": '';
    
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
    while ($row=mysqli_fetch_row($result)) $ot[]=array('<a href=index.php?view=add-pinjam-detail&action=edit&id='.$row[0].'>'.$row[0].'</a>',
                                                       $row[1],
                                                       '<a href="?view=inventaris&search=no_inventaris&q='.$row[2].'">'.$row[2].'</a>',
                                                       $row[3],
                                                       $row[4],
                                                       '<a href="'.$uri.'&action=delete&did='.$row[0].'">Delete</a> | <a href=index.php?view=add-pinjam-detail&action=edit&id='.$row[0].'>Edit</a>');
    $tableHead=array_values($table);
    $tableHead[]='Action';
    $pdata['content'].=makeForm($form,'get','form-inline');
    $pdata['content'].=makeTable($ot,$tableHead);
    $pdata['content'].='<a class="btn btn-primary" href="?view=add-pinjam-detail&id='.$id.'">Add New</a>';
    $pdata['content'].=makePagination($rowCount,$page);
    
    
    //$pdata['menu']=makeMenu($menu);
    //Hasil Akhir
    $t=makePage($pdata,'main.php');
    echo $t;
?>
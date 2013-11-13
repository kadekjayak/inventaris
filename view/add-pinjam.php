<?php 
	include 'view/menu.inc';
    $menu[3]['class']='active';
	$pdata=array(
        'header'=>$header,
        'title'=>'Peminjaman Baru',
        'footer'=>$footer,
        'alert'=>'',
        'menu'=>makeMenu($menu),
        'content'=>''
    );
    
    $v=array();
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $v=GetDataPost();
        $tgl=explode('-',$v['tgl_pinjam']);
        $v['tgl_pinjam']="$tgl[2]-$tgl[1]-$tgl[0]";
           
        $result=empty($action) ? dbInsert('pinjam',$v) : dbUpdate('pinjam',$v,array('no_pinjam'=>$_GET['id']));
        
        if(!$result) {
            $pdata['alert'].=makeAlert(mysqli_error($link),"danger");
        } else {
            
            $pdata['alert'].=makeAlert('Operation Success');
        }
    }

    if($action=='edit') {
        $sql="SELECT no_pinjam,DATE_FORMAT('%d-%m-%Y',tgl_pinjam),NIP FROM pinjam WHERE no_pinjam='$_GET[id]'";
        $result=mysqli_query($link,$sql);
        if(!$result) $pdata['content']=makeAlert(mysqli_error($link),'error');
        while($row=mysqli_fetch_assoc($result)) {
            foreach($row as $key => $value) {
                $v[$key]=$value;   
            }
        }
        
    }


   $form=array(
		0=>array(
		'title'=>'No Pinjam',
		'type'=>'text',
		'value'=>isset($v['no_pinjam']) ? $v['no_pinjam'] : '',
        'name'=>'no_pinjam',
        'state'=> ($action=='edit') ? 'disabled' : ''
		),
		1=>array(
		'title'=>'Tanggal Pinjam',
		'type'=>'text',
        'value'=>isset($v['tgl_pinjam']) ? $v['tgl_pinjam'] : date('d-m-Y'),
        'name'=>'tgl_pinjam',
		),
        2=>array(
		'title'=>'NIP',
		'type'=>'text',
        'value'=>isset($v['NIP']) ? $v['NIP'] : '',
        'name'=>'NIP'    
		)
	);

    $pdata['content'].=makeForm($form);
    $pdata['content'].=makePagination($rowCount,$page);
    
    $t=makePage($pdata,'main.php');
    echo $t;
?>
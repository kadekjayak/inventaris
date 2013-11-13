<?php 
	include 'view/menu.inc';
    $menu[3]['class']='active';
	$pdata=array(
        'header'=>$header,
        'title'=>'Detail Peminjaman Baru',
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
        $v['tgl_kembali']="$tgl[2]-$tgl[1]-$tgl[0]";
           
        $result=empty($action) ? dbInsert('pinjam_detail',$v) : dbUpdate('pinjam_detail',$v,array('no_pinjam'=>$_GET['id']));
        
        if(!$result) {
            $pdata['alert'].=makeAlert(mysqli_error($link),"danger");
        } else {
            
            $pdata['alert'].=makeAlert('1 Record Inserted <a href="?view=pinjam-detail&id='.$id.'"> return </a> ');
        }
    }

    if($action=='edit') {
        $sql="SELECT no_detail,no_pinjam,no_inventaris,DATE_FORMAT('%d-%m-%Y',tgl_pinjam),DATE_FORMAT('%d-%m-%Y',tgl_kembali) FROM pinjam_detail WHERE no_detail='$id'";
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
		'title'=>'No Detail',
		'type'=>'text',
		'value'=>isset($v['no_pinjam']) ? $v['no_pinjam'] : '',
        'name'=>'no_detail',
        'state'=> 'disabled'
		),
        1=>array(
		'title'=>'No Peminjaman',
		'type'=>'text',
		'value'=>$id,
        'state'=> 'disabled'
		),
        2=>array(
		'title'=>'No Inventaris',
		'type'=>'text',
		'value'=>isset($v['no_inventaris']) ? $v['no_inventaris'] : '',
        'name'=>'no_inventaris'
		),
		3=>array(
		'title'=>'Tanggal Pinjam',
		'type'=>'text',
        'value'=>isset($v['tgl_pinjam']) ? $v['tgl_pinjam'] : date('d-m-Y'),
        'name'=>'tgl_pinjam'
		),
        4=>array(
		'title'=>'Tanggal Kembali',
		'type'=>'text',
        'value'=>isset($v['tgl_kembali']) ? $v['tgl_kembali'] : date('d-m-Y'),
        'name'=>'tgl_kembali'
		),
        5=>array(
		'type'=>'hidden',
        'value'=>$id,
        'name'=>'no_pinjam'
		)
	);

    $pdata['content'].=makeForm($form);
    $pdata['content'].=makePagination($rowCount,$page);
    
    $t=makePage($pdata,'main.php');
    echo $t;
?>
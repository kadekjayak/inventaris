<?php 

	include 'view/menu.inc';
    $menu[0]['class']='active';
	$pdata=array(
        'header'=>$header,
        'title'=>'Inventaris',
        'footer'=>$footer,
        'alert'=>'',
        'menu'=>makeMenu($menu),
        'content'=>''
    );
if(isset($_COOKIE['nip'])) {
    $sql="SELECT id_jenis,nama_jenis from jenis_inventaris";
    $result=mysqli_query($link,$sql);
    $id_jenis=array();
    while($row=mysqli_fetch_row($result)) {
        $id_jenis[]=$row;   
    }
    
    $v=array();
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $v=GetDataPost();
           
        $result=empty($action) ? dbInsert('inventaris',$v) : dbUpdate('inventaris',$v,array('no_inventaris'=>$_GET['id']));
        
        if(!$result) {
           $pdata['alert'].=makeAlert(mysqli_error($link),"danger");
        } else {
            
           $pdata['alert'].=makeAlert('Operation Success');
        }
    }

    if($action=='edit') {
        $sql="SELECT * FROM inventaris WHERE no_inventaris='$_GET[id]'";
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
		'title'=>'No Inventaris',
		'type'=>'text',
		'value'=>isset($v['no_inventaris']) ? $v['no_inventaris'] : '',
        'name'=>'no_inventaris',
        'state'=> ($action=='edit') ? 'disabled' : ''
		),
		1=>array(
		'title'=>'Jenis Inventaris',
		'type'=>'select',
        'name'=>'id_jenis',
        'value'=>$id_jenis
		),
        2=>array(
		'title'=>'Kondisi',
		'type'=>'text',
        'value'=>isset($v['kondisi']) ? $v['kondisi'] : '',
        'name'=>'kondisi'    
		),
       3=>array(
		'title'=>'Tanggal Registrasi',
		'type'=>'text',
        'value'=>isset($v['tgl_registrasi']) ? $v['tgl_registrasi'] : '',
        'name'=>'tgl_registrasi'    
		)
	);

    $pdata['content'].=makeForm($form);
    $pdata['content'].=makePagination($rowCount,$page);
    
    
} else {
    $pdata['alert'].=makeAlert("Only Loged In user can perform this operation",'warning');   
}
    $t=makePage($pdata,'main.php');
    echo $t;
?>
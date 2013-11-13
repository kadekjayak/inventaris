<?php 
	include 'view/menu.inc';
    $menu[2]['class']='active';
	$pdata=array(
        'header'=>$header,
        'title'=>'Add Jenis Inventaris',
        'footer'=>$footer,
        'alert'=>'',
        'menu'=>makeMenu($menu),
        'content'=>''
    );

    $v=array();
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $v=GetDataPost();
           
        $result=empty($action) ? dbInsert('jenis_inventaris',$v) : dbUpdate('jenis_inventaris',$v,array('id_jenis'=>$id));
        
        if(!$result) {
            $pdata['alert'].=makeAlert(mysqli_error($link),"danger");
        } else {
            
            $pdata['alert'].=makeAlert("Input Success");
        }
    }

    if($action=='edit') {
        $sql="SELECT id_jenis,nama_jenis,keterangan FROM jenis_inventaris WHERE id_jenis='$_GET[id]'";
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
		'title'=>'ID Jenis',
		'type'=>'text',
		'value'=>isset($v['id_jenis']) ? $v['id_jenis'] : '',
        'name'=>'id_jenis',
        'state'=> ($action=='edit') ? 'disabled' : ''
		),
		1=>array(
		'title'=>'Nama Jenis',
		'type'=>'text',
        'name'=>'nama_jenis',
        'value'=>isset($v['nama_jenis']) ? $v['nama_jenis'] : ''
		),
        2=>array(
		'title'=>'Keterangan',
		'type'=>'textarea',
        'value'=>isset($v['keterangan']) ? $v['keterangan'] : '',
        'name'=>'keterangan'    
		)
	);
    
    

    $pdata['content'].=makeForm($form);
    $pdata['content'].=makePagination($rowCount,$page);
    
    $t=makePage($pdata,'main.php');
    echo $t;
?>
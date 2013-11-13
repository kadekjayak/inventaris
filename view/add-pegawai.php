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
    $v=array();
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $v=GetDataPost();
           
        $result=empty($action) ? dbInsert('pegawai',$v) : dbUpdate('pegawai',$v,array('NIP'=>$_GET['id']));
        
        if(!$result) {
            $pdata['alert'].=makeAlert(mysqli_error($link),"danger");
        } else {
            
            $pdata['alert'].=makeAlert("Input Success");
        }
    }

    if($action=='edit') {
        $sql='SELECT NIP,nama,alamat,no_telp FROM pegawai WHERE NIP='.$_GET['id'];
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
		'title'=>'NIP',
		'type'=>'text',
		'value'=>isset($v['NIP']) ? $v['NIP'] : '',
        'name'=>'NIP',
        'state'=> ($action=='edit') ? 'disabled' : ''
		),
		1=>array(
		'title'=>'Nama',
		'type'=>'text',
        'name'=>'nama',
        'value'=>isset($v['nama']) ? $v['nama'] : ''
		),
        2=>array(
		'title'=>'alamat',
		'type'=>'textarea',
        'value'=>isset($v['alamat']) ? $v['alamat'] : '',
        'name'=>'alamat'    
		),
       3=>array(
		'title'=>'Telepon',
		'type'=>'text',
        'value'=>isset($v['no_telp']) ? $v['no_telp'] : '',
        'name'=>'no_telp'    
		)
	);
    
    

    $pdata['content'].=makeForm($form);
    $pdata['content'].=makePagination($rowCount,$page);
    
    $t=makePage($pdata,'main.php');
    echo $t;
?>
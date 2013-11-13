<?php 
    $form=array(
		0=>array(
		'title'=>'Test',
		'type'=>'text',
		'value'=>'value'
		),
		1=>array(
		'title'=>'Test2',
		'type'=>'textarea',
        'value'=>'asdfasdf',
		'error'=>'Column Not valid'
		),
        2=>array(
		'title'=>'Test2',
		'type'=>'select',
        'value'=>array(
                0=>array('vval1','title1'),
                1=>array('val2','asdfasdf')
            ),
        'name'=>'select'    
		)
	);

    $menu=array(
        0=>array(
        'link'=>'test.html',
        'title'=>'Test.html'
        ),
        1=>array(
        'link'=>'test2.html',
        'title'=>'Test2.html',
        'class'=>'active'
        )
        
    );
	$pdata=array(
        'template'=>'template/main.html',
        'header'=>$header,
        'title'=>'Page Not Found',
        'carousel'=>array(
            0=>array(
                'active'=>'active',
                'title'=>'Secret Admirer',
                'image'=>'template/bg.jpg',
                'description'=>'pemuja rahasianya',
            ),
            1=>array(
                'active'=>'',
                'title'=>'Secret Lover',
                'image'=>'template/bg.jpg',
                'description'=>'Pengagum rahasianya',
            ),
            2=>array(
                'active'=>'',
                'title'=>'Love Finder',
                'image'=>'template/bg.jpg',
                'description'=>'Pengagum rahasianya',
            )
        ), 
        'footer'=>$footer,
        'alert'=>array(
            'class'=>'alert-info',
            'info'=>'Page Success'
        )
    );
	
	
	//$pdata['content']= makeForm($form,'test.php');
    
    $sql="SELECT * FROM tabel "; //Base Query
    
    $sql.=!empty($search) ? " WHERE $search LIKE '%$w%'": '';
    
    $result=mysqli_query($link,$sql);
    $rcount=mysqli_num_rows($result);
    
    //LIMIT
    if($rcount > $maxPerPage) {
        $pos=($page-1)*$maxPerPage;
        $sql.="LIMIT $pos,$maxPerPage";
        $result=mysqli_query($link,$sql);
    }

    $ot=array();
    while ($row=mysqli_fetch_row($result)) $ot[]=$row;
    $tableHead=array('Number','text','date');
    $pdata['content']=makeAlert("found $rcount record");
    $pdata['content'].=makeTable($ot,$tableHead);
    $pdata['content'].=makePagination($rcount,$page);
    $pdata['content'].=makeForm($form,'test.php');
    
    $pdata['menu']=makeMenu($menu);
    //Hasil Akhir
    $t=makePage($pdata,'main.php');
    echo $t;
?>
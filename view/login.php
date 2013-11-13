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
    $v=GetDataPost();

if($_SERVER['REQUEST_METHOD']=='POST') {
    if(isset($_POST['nip']) && isset($_POST['password'])){
        $sql="SELECT NIP,nama FROM pegawai WHERE nip='$_POST[nip]' AND password='$_POST[password]'";
        $result=mysqli_query($link,$sql);
        echo mysqli_error($link);
        if(mysqli_num_rows($result)<=1) {
            $r=mysqli_fetch_row($result);
            setcookie('nip',$r[0],time()+(60*60));
            setcookie('user',$r[1],time()+(60*60));
            $pdata['alert'].=makeAlert('Login Success');   
        } else {
            $pdata['alert'].=makeAlert('Invalid Login infomation','danger');   
        }
        
    } else {
        $pdata['alert'].=makeAlert('Incomplete field','danger');     
    }
}



$form=array(
		0=>array(
		'title'=>'NIP',
		'type'=>'text',
		'value'=>isset($v['nip']) ? $v['nip'] : '',
        'name'=>'nip'
		),
		1=>array(
		'title'=>'Password',
		'type'=>'password',
        'name'=>'password',
        'value'=>isset($v['password']) ? $v['password'] : ''
		),
        2=>array(
		'type'=>'hidden',
        'name'=>'url',
        'value'=>isset($v['url']) ? $v['url'] : ''
		) 
		
	);
$pform=makeForm($form);
$pdata['content']='
    <div class="row center-block">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-heading">
               Sign In
              </div>
              <div class="panel-body">'.$pform.'</div>
            </div>
        </div>
    </div>
    ';


$t=makePage($pdata,'main.php');
echo $t;
?>
<?php 
function redirect($x) 
{ ?>
	<script language="javascript">
    
    <?php if($x=="") {?>
        history.back(0)
    <?php } else {?>
        window.location.replace('<?php print $x; ?>')
    <?php } ?>
    
    </script>
    <?php exit(); 
}

function __autoload($class_name) 
{	
	if(file_exists(PATH_LIBRARIES.'/classes/'.$class_name.'.php'))
    require_once PATH_LIBRARIES.'/classes/'.$class_name.'.php';
}

function transactionid($db)
{
	return $transactionid=$db->random_string('nozero',8);	
}

function rquotes($ssr)
{
	return str_replace("'","''",$ssr);
}

function clean($str) 
{
	if(!get_magic_quotes_gpc()) 
	{
    	$str = addslashes($str);
    }
	$str = strip_tags(htmlspecialchars($str));
	return $str;
}



//==========================================================================================================

function isValidLogin()
{
	if( $_SESSION['onetenuser'] != 'ONETENUSER' || $_SESSION['ONETENUID'] == NULL  )
	return false ;
	else
	return true ;
}

function set_msg($msg,$type)
{
	$_SESSION['type'] = $type;
	$_SESSION['msg'] = $msg;
	if($type == 'err') //for error
		$_SESSION['style'] = '#ee5b4f'; 
	elseif($type=='suc') //for success
		$_SESSION['style'] = '#B3FFB3'; 
	else                 //for information
		$_SESSION['style'] = '#FFFFC1'; 
}

function show_msg()
{
	if(isset($_SESSION['msg']))
	{
		echo '<div style=" text-align:center; margin: 0 auto; background-color:'.$_SESSION['style'].';
				color:#000000"><b>'.$_SESSION["msg"].'</b></div>';
		unset($_SESSION['type']);
		unset($_SESSION['msg']);
		unset($_SESSION['style']);
		
	}
	
}
//=========================================================================================

?>
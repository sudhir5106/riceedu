<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
define('SERVER','localhost');
define('DBUSER','root');//define(DBUSER,'kritipho_to');
define('DBPASSWORD','');
define('DBNAME','riceedu');
define('ROOT',$_SERVER['DOCUMENT_ROOT'].'/riceedu'); //FOR PHP ROOT LINK
//define(ROOT,$_SERVER['DOCUMENT_ROOT']); //FOR PHP ROOT LINK

define('PATH_LIBRARIES', ROOT.'/libraries');
define('PATH_JS_LIBRARIES','/riceedu/js');
define('PATH_CSS_LIBRARIES','/riceedu/css');
define('PATH_IMAGE','/riceedu/images');
define('PATH_DATA_IMAGE','/riceedu/data_images');
define('PATH_DATA_IMAGE_CM','/riceedu/cm_image');
define("PATH_FONTS",'/riceedu/fonts'); // fonts Link
define('PATH_DATA_DOC','/riceedu/documents');//documents


// for adminpanel
define('PATH_ROOT', '/riceedu');
//masters path setup
define('PATH_MASTERS', ROOT.'/adminpanel');
define('PATH_ADMIN_LINK', '/riceedu/adminpanel'); //for html link only
define('PATH_ADMIN_INCLUDE',ROOT.'/adminpanel/include');
define('MASTERS_LINK_CONTROL','/riceedu/adminpanel/masters');

//RM Panel Section
define("LINK_CONTROL_RM", '/riceedu/rmpanel');
define("PATH_RM", ROOT.'/rmpanel');
define("PATH_RM_INCLUDE",PATH_RM.'/include');

//DM Panel Section
define("LINK_CONTROL_DM", '/riceedu/dmpanel');
define("PATH_DM", ROOT.'/dmpanel');
define("PATH_DM_INCLUDE",PATH_DM.'/include');

//CM Panel Section
define("LINK_CONTROL_CM", '/riceedu/cmpanel');
define("PATH_CM", ROOT.'/cmpanel');
define("PATH_CM_INCLUDE",PATH_CM.'/include');

//Student Panel Section
define("LINK_CONTROL_STUDENT", '/riceedu/studentpanel');
define("PATH_STUDENT", ROOT.'/studentpanel');
define("PATH_STUDENT_INCLUDE",PATH_STUDENT.'/include');

/*__________________________________*/
?>
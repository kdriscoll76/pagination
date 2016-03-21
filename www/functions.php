<?php
session_start();
if(isset($_POST['search'])){
  $search = $_POST['search'];
}else{
  $search = $_GET['search'];
}
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if( $search != $_GET['search']){
  $page = 1;
}
$pulldata = file("../data/cache");
$prepage = 5;
$total = count($pulldata);
function query($search,$pulldata){
 $data = preg_grep("/$search/i",$pulldata);
 return $data;
}
$pull = query($search,$pulldata);
$start = ( $page > 0) ?  ($page * $prepage) - $perpage :0;
$rows = array_slice($pull,$start,$prepage);
$matches = count($pull);
$pages = ceil(($matches/$prepage));
?>

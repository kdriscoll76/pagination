<?php
session_start();
require("header.html");
if(isset($search)){
  $search = $_POST['search'];
}else{
  $search = $_GET['search'];
}
require("functions.php");
?>
<nav>
  <div class='container'>
    <div class='row'>
     <h1>PAGINATIONS</h1>
    </div>
  <div class='row'>
    <form method='post'>
      <div class='input-group'>
        <input class='form-control' name='search' placeholder="Search" value='<?php echo $search;?>'/>
        <div class='input-group-btn'>
          <button class='btn btn-primary'>?</button>
        </div>
      </div>
    </form>
  </div>
  <div class='container'>
    <ul class='pagination'>
      <?php
      for($i =1;$i < $pages;$i++){
       if($page === $i){
        print"<li class='active'><a href='?page=$i&search=$search'>$i</a></li>";
       }else{
        print"<li><a href='?page=$i&search=$search'>$i</a></li>";
       }
      }
      ?>
    </ul>
    <span class='pull-right'><h2>Total: <?php echo $total;?> Match: <?php echo $matches;?></h2></span>
  </div>
</nav>
<div id='progress' class='container text-center'>
  <i>Loading....</i>
</div>
<div class='container'>
  <div class='row'>
   <?php
   foreach($rows as $row){
     print"
     <div class='panel panel-default'>
     <div class='panel-heading'>
     </div>
     <div class='panel-body'>
     $row
     </div>
     </div>
     ";
   }
   ?>
  </div>
</div>
<script>
 var data = "<?php echo $rows;?>";
if(data){
  $('#progress').hide();
}
</script>

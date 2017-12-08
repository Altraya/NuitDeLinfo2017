<?php

    require_once("Views/includes/meta.php");
    require_once("Views/includes/nav.php");
?>    
    
<link rel="stylesheet" href="css/dashboard.css">
    
<h2>&nbsp;&nbsp;Your dashboard</h2>

<div class="dashcontainer">
    <div class="card card-1 dashcard">
    
      <ul class="collection with-header">
        <li class="collection-header"><h4>Events</h4><button type="button" class="btn btn-success" onclick="startShopping();"><span class="glyphicon glyphicon-shopping-cart"></span> Add</button></li>
        <li class="collection-item"><div>My event 1<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div></li>
        <li class="collection-item"><div>My event 2<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div></li>
        <li class="collection-item"><div>My event 3<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div></li>
        <li class="collection-item"><div>My event 4<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div></li>
      </ul>
    
    </div>
</div>
  
<?php
    require_once("Views/includes/footer.php");
?>
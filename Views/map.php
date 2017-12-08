<?php

    require_once("Views/includes/meta.php");

?>    

<link rel="stylesheet" href="css/map.css">

<script language="javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEotISuimJZdqKZ9mIf1VmA68RFXIFqro"></script>
<script type="text/javascript" src="js/Map.js"></script>

<nav>
  <div class="nav-wrapper">
    <a href="#" class="brand-logo center">Event map</a>
    <ul class="left hide-on-med-and-down">
      <li><a href="#" data-activates="slide-out"><i class="material-icons" onclick="showSidePanel();">menu</i></a></li>
    </ul>
  </div>
</nav>

<div id="llama_map"></div>

<ul id="slide-out" class="side-nav">
  <li><div class="user-view">
    <div class="background">
      <img src="images/office.jpg">
    </div>
    <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
    <a href="#!name"><span class="white-text name">John Doe</span></a>
    <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
  </div></li>
  <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
  <li><a href="#!">Second Link</a></li>
  <li><div class="divider"></div></li>
  <li><a class="subheader">More</a></li>
  <li><a class="waves-effect" onclick="getAerial();">Get aerial view</a></li>
</ul>
<a href="#" data-activates="slide-out" class="button-collapse" ><i class="material-icons">menu</i></a>
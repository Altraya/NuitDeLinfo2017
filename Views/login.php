<?php
    require_once("Views/includes/meta.php");
    require_once("Views/includes/nav.php");
?>

<link rel="stylesheet" href="css/login.css">
<script type="text/javascript" src="js/Login.js"></script>

<div class="logincontainer">
  <div class="card card-1 logincard">
  <h2 style="color:#ee6e73;">Login</h2>
  <div class="divider"></div>
    <div class="row">
      <!-- Login -->
      <div class="col m13 s12 flexIt">
        <form id="login">
          <div class="row">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="loginuser" type="text" name="loginuser" class="validate">
              <label for="loginuser">Login</label>
            </div>
            <div class="col m4 s0">
              
            </div>
          </div>
          <div class="row">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">lock</i>
              <input id="password" type="password" name="password" class="validate">
              <label for="password">Password</label>
            </div>
            <div class="col m4 s0">
            </div>
          </div>
          <div class="row">
            <div class="col m12 s12 flexIt">
                <div id="message"></div>
            </div>    
          </div>
          <div class="row">
            <div class="col m12 s12 flexIt">
              <button type="button" id="submitLogin" class="mediumButtonCentered btn customLessPinkBackground borderPink">Login</button>
            </div>
            <div class="col m4 s0">
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
  
<?php
    require_once("Views/includes/footer.php");
?>
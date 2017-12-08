<?php
    require_once("Views/includes/meta.php");
    require_once("Views/includes/nav.php");
?>

<link rel="stylesheet" href="css/signup.css">

<div class="logincontainer">
  <div class="card card-1 logincard">
  <h2 style="color:#ee6e73;">Signup</h2>
  <div class="divider"></div>
    <div class="row">
      <!-- Login -->
      <div class="col m13 s12 flexIt">
        <form id="signup">
          <div class="row">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="nameSignup" type="text" class="validate">
              <label for="nameSignup">Name</label>
            </div>
            <div class="col m4 s0">
            </div>
          </div>
          <div class="row">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">email</i>
              <input id="emailSignup" type="text" class="validate">
              <label for="emailSignup">Mail</label>
            </div>
            <div class="col m4 s0">
            </div>
          </div>
          <div class="row">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">lock</i>
              <input id="passwordSignup" type="password" class="validate">
              <label for="passwordSignup">Password</label>
            </div>
            <div class="col m4 s0">
            </div>
          </div>
          <div class="row">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">lock</i>
              <input id="password2Signup" type="password" class="validate">
              <label for="password2Signup">Confirm Password</label>
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
              <button id="submitSignup" type="button" class="mediumButtonCentered btn customLessPinkBackground borderPink">Signup</button>
            </div>
            <div class="col m4 s0">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="js/Signup.js"></script>

<?php
    require_once("Views/includes/meta.php");
    require_once("Views/includes/nav.php");
?>
<div class="logincontainer">
  <div class="card card-1 logincard">
  <h2 style="color:#ee6e73;">Signup</h2>
  <div class="divider"></div>
    <div class="row">
      <!-- Login -->
      <div class="col m13 s12 flexIt">
        <form id="login">
          <div class="row">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="login" type="text" class="validate">
              <label for="login">Login</label>
            </div>
            <div class="col m4 s0">
              
            </div>
          </div>
          <div class="row">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">lock</i>
              <input id="password" type="password" class="validate">
              <label for="password">Password</label>
            </div>
            <div class="col m4 s0">
            </div>
          </div>
          <div class="row">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">lock</i>
              <input id="passwordVerif" type="password" class="validate">
              <label for="passwordVerif">Confirm Password</label>
            </div>
            <div class="col m4 s0">
            </div>
          </div>
        
          <div class="row">
            <div class="col m12 s12 flexIt">
              <button type="submit" class="mediumButtonCentered btn customLessPinkBackground borderPink">Signup</button>
            </div>
            <div class="col m4 s0">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
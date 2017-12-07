<?php
    require_once("Views/includes/meta.php");
    require_once("Views/includes/nav.php");
?>
  <h1>CONNECTION</h1>
  <div class="divider"></div>
  <div class="row">
    
    <!-- Login -->
    <div class="col m6 s12">
      <h2>Login</h2>
      <form id="login">
        <div class="row">
          <div class="input-field col m8 s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="login" type="text" class="validate">
            <label for="login">Login</label>
          </div>
          <div class="col m4 s0">
            
          </div>
        </div>
        <div class="row">
          <div class="input-field col m8 s12">
            <i class="material-icons prefix">lock</i>
            <input id="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
          <div class="col m4 s0">
          </div>
        </div>
      
        <div class="row">
          <div class="col m8 s12 flexIt">
            <button type="submit" class="mediumButtonCentered btn customLessPinkBackground borderPink">Login</button>
          </div>
          <div class="col m4 s0">
          </div>
        </div>
      </form>
    </div>
    
        <!-- Inscription -->
    <div class="col m6 s12">
      <h2>Create account</h2>
      <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
      <a href="{{ baseUrl ~ 'index.php/auth/signup' }}" class="btn right customLessPinkBackground borderPink">Create account</a>
    </div>
  </div>
  
<?php
    require_once("Views/includes/footer.php");
?>
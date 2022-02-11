<?php include "includes/init.php" ?>

<?php
    if($_SERVER['REQUEST_METHOD']== "POST"){
       try{
        $sql = "INSERT INTO users(firstname, lastname, username, email, password, validationcode, active, joined, last_login)VALUES('{$_POST['firstname']}','{$_POST['lastname']}','{$_POST['username']}','{$_POST['email']}','{$_POST['password']}', 'test', 0, current_date, current_date)";
           echo $sql;
       } catch(PDOException $e){
           echo "Error".$e->getMessage();
       }
    }else{
        echo "NO POST DATA INCLUDED";
    }
?>

<!doctype html>
<html lang='en'>
 <?php include "includes/header.php" ?>
  <head>
   <?php include "includes/nav.php" ?>
    <title>Register | Client</title>
    <meta charset='utf-8'>
    <meta content='IE=Edge,chrome=1' http-equiv='X-UA-Compatible'>
      <meta content='app-id=350189835,app-argument=wm://v=1' name='apple-itunes-app'>
    <meta content='yes' name='apple-mobile-web-app-capable'>
    <meta content='black' name='apple-mobile-web-app-status-bar-style'>
    <meta content='NXOC9uCKc27Lbj1t4pS1Jwk1BGTpe37W-lQ6xbCV9kA' name='google-site-verification'>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
      <link href="signup.html" rel='canonical'>

    <link rel="stylesheet" media="screen" href="https://weedmaps-assets-production.weedmaps.com/packs/css/auth-styles-1f516de7.css" />

  </head>
  <body>
    

    <div class="signup-splash">


      <div id="content" class="main ">
          <div class="signup-container hide">
              <div class="form-container">
                  <h2 class="form-title center">Sign up with email</h2>
                  <div id="content-container">
                      <form class="new_user" id="signup-form" data-controller="submit error-handler" action="/signup" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="qW8gEL-N9N11SOpxi8tX22EmSUX3sKytnQMKIO7kycmEveS3EiBC89XU5j43HRdP6tn4fkO6zzVZ89S0g3iciw" /><input type="hidden" name="mode" id="mode" value="email" />
                          <div class="field-container" data-controller="validate"><input class="form-control" placeholder="Email" type="email" required="required" data-action="input-&gt;submit#enableIfValid input-&gt;validate#revalidateInput input-&gt;error-handler#updateValidMessages focus-&gt;submit#enableIfValid valid-&gt;submit#enableIfValid" data-error-handler-target="input" autofocus="autofocus" name="user[email]" id="user_email" />
                              <div class="error-msg" data-validate-target="error" data-error-handler-target="error"></div>
                              <div class="login-links hide" data-error-handler-target="login"><a href="login.html">Log in</a><span> or </span><a href="password/new.html">Reset password</a></div>
                          </div>
                          <div class="field-container" data-controller="validate"><input class="form-control hide-reveal" placeholder="Password" pattern=".{8,}$" type="password" required="required" data-action="input-&gt;submit#enableIfValid input-&gt;validate#revalidateAndEmptyInput input-&gt;error-handler#updateValidMessages focus-&gt;submit#enableIfValid valid-&gt;submit#enableIfValid" data-error-handler-target="input" name="user[password]" id="user_password" />
                              <div class="eyecon"><span class="hide" data-action="click-&gt;submit#hideRevealEmail" id="eye-open"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                          <path d="M0 0h24v24H0z" fill="none" />
    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
</svg>
</span><span data-action="click-&gt;submit#hideRevealEmail" id="eye-closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path d="M0 0h24v24H0zm0 0h24v24H0zm0 0h24v24H0zm0 0h24v24H0z" fill="none"/>
    <path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"/>
</svg>
</span></div><div class="hint">Needs to be at least 8 characters.</div><div class="error-msg" data-validate-target="error" data-error-handler-target="error"></div></div><div class="field-container" data-controller="ssv" data-ssv-url="/v1/usernames/availability?username="><input class="form-control" placeholder="Username" pattern=".{2,}$" type="username" data-action="input-&gt;ssv#validate input-&gt;error-handler#updateValidMessages focus-&gt;ssv#validate valid-&gt;submit#enableIfValid" data-ssv-target="input" data-error-handler-target="input" required="required" name="user[username]" id="user_username" /><div class="hint">This is your public facing name when reviewing stores and products. Two characters minimum.</div><div class="error-msg" data-ssv-target="error" data-error-handler-target="error"></div></div>
      
      <div id="checkbox-container">
      <label class="checkbox-wrapper"><input name="user[accepts_newsletter]" type="hidden" value="0" /><input type="checkbox" value="1" name="user[accepts_newsletter]" id="user_accepts_newsletter" /><span class="checkbox-image" id="notifications-checkbox"></span><span class="checkbox-label" for="notifications">Please send me emails about deals, new products, and recommendations on Weedmaps.</span></label>
      
      <label class="checkbox-wrapper">
      <input type="checkbox" name="accepts_terms" id="accepts_terms" value="true" required="required" data-action="submit#enableIfValid" />
      <span class="checkbox-image" id="terms-checkbox"></span>
      
      <span class="checkbox-label">I agree to the collection and sharing of my personal information to create a Texas car wash listing account, and I agree to the <a href='legal/terms.html'>Terms of Use</a> and <a href='legal/privacy.html'>Privacy Policy</a>.</span></label></div>
       
       
          
        
<button type="submit" data-sitekey="6LeUBaYZAAAAANE9G0FJfCBD9Qf9SV-hXRaBy94s" data-badge="bottomleft" data-callback="invisibleRecaptchaSubmit" class="g-recaptcha " id="signup" disabled="disabled" data-target="submit.submit" data-action="click->analytics#track" data-analytics_name="Sign Up">Register</button>

</form>
</div>
</div>
</div>
<div class="form-container signup" data-controller="analytics">
    <h2 class="form-title center">Sign up</h2>
    <div id="content-container">
        <div class="email-signup field-container">
        
        <form id="register-form" method="post" role="form">

        <input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First Name" value="" required style="width:100%; margin-bottom: 15px;"  />
        
        <input type="text" name="lastname" id="lastname" tabindex="2" class="form-control loginEntry" placeholder="Last Name" value="" required style="width:100%; margin-bottom: 15px;"/>
        
        <input type="text" name="username" id="username" tabindex="3" class="form-control" placeholder="Username" value="" required style="width:100%; margin-bottom: 15px;"/>
        
         <input type="email" name="email" id="register_email" tabindex="4" class="form-control" placeholder="Email Address" value="" required style="width:100%; margin-bottom: 15px;" >
         
         <input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Password" required style="width:100%; margin-bottom: 15px;">
         
         <input type="password" name="confirm_password" id="confirm-password" tabindex="6" class="form-control" placeholder="Confirm Password" required style="width:100%; margin-bottom: 15px;"/>
         
         <button class="btn btn-default" data-action="click-&gt;signup#revealSignupForm click-&gt;analytics#track" data-analytics-name="Continue with Email" data-controller="signup" id="display_signup">Continue</button>
        
            </form>
<!--    </div>-->
       
<!--
    <div class="form-group">
        <input type="text" name="lastname" id="lastname" tabindex="2" class="form-control" placeholder="Last Name" value="" required >
    </div>
    <div class="form-group">
        <input type="text" name="username" id="username" tabindex="3" class="form-control" placeholder="Username" value="" required >
    </div>
    <div class="form-group">
        <input type="email" name="email" id="register_email" tabindex="4" class="form-control" placeholder="Email Address" value="" required >
    </div>
    <div class="form-group">
        <input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-group">
        <input type="password" name="confirm_password" id="confirm-password" tabindex="6" class="form-control" placeholder="Confirm Password" required>
    </div>
    <div class="form-group">
        <textarea name="comments" id="comments" tabindex="7" class="form-control" placeholder="Comments" required></textarea>
    </div>
-->
        
<!--        <button class="btn btn-default" data-action="click-&gt;signup#revealSignupFormclick-&gt;analytics#track" data-analytics-name="Continue with Email" data-controller="signup" id="display_signup">Continue</button>-->
       
       
        
        </div>
        <div class="block-link-wrapper"><a id="member_login" href="login.html">Already a member? Log in</a></div>
        <div class="separator-container"><span class="separator left"></span><span>or</span><span class="separator right"></span></div>
        
        <form class="button_to" method="post" action="/auth/facebook"><input data-action="click-&gt;analytics#track" data-analytics-name="Continue with Facebook" class="facebook-button btn" type="submit" value="Continue with Facebook" /><input type="hidden" name="authenticity_token" value="4YfNjcwKk72gmJvfiIcZnznbuh-duZjVPC2bs9B2T3FUlT313NHjb7CF4jJkh4-ENIktrxZL1U46UdLa8YpvQg" /></form>
        
        <form class="button_to" method="post" action="/auth/google"><input data-action="click-&gt;analytics#track" data-analytics-name="Continue with Google" class="google-button btn" type="submit" value="Continue with Google" /><input type="hidden" name="authenticity_token" value="og0DiHMNqOXW1AZMWTmVdtAtiTVNu5eYA2cOeArUrQ69lle2ZOuBUSpAnfonKtD9EheQFvPWQXBRJoiNVWHcZg" /></form>
        <form class="button_to" method="post" action="/auth/apple"><input data-action="click-&gt;analytics#track" data-analytics-name="Continue with Apple" class="apple-button btn" type="submit" value="Continue with Apple" /><input type="hidden" name="authenticity_token" value="R1dMIy1yE4wfN1MfwXnS-kO_DoUKuPWNPvpB5cV_WBHUMfh17SE7vo7fayXrQ-DkHTRW5WpXfRcmfIIjwIVe3g" /></form>
        <p class="align-left">Texas car listings respects privacy. Names and emails are kept private, and nothing is posted to your social media account (Facebook or Google account) without permission.</p>
        
        <h2 class="banner-title">Why sign up?</h2>
        <img class="banner-image" src="../portal/images/loginbanner.jpg"/>
        
        <ul class="banner-check-list">
            <li>Find the best car wash location with approved services.</li>
            <li>Get updates about your favorite car products, discounts on goods and services.</li>
            <li>Leave reviews &amp; share your experiences to help out the community.</li>
        </ul>
        
    </div>
</div>
        
      </div>
    </div>
  </body>
</html>

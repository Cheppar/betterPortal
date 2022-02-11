<?php include "includes/init.php" ?>

<?php
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $uname = $_POST['username'];
        $email = $_POST['email'];
        $email_conf = $_POST['email'];
        $password = $_POST['password'];
        $pword_conf = $_POST['password_confirm'];
        
        if(strlen($lname)<3){
            $error[] = "Last name must be atleast 3 characters long";
        }
        if(strlen($uname)<6){
            $error[] = "Username must be atleast 6 characters long";
        }
        
         if($pword != $pword_conf){
            $error[] = "Passwords don't match";
        }
        
        if($email != $email_conf){
            $error[] = "Emails don't match";
        }
        
        // To check if email already exists
        try{
            $stmnt = $pdo->prepare("SELECT email FROM users WHERE email = :email");
            $user_data = [':email'=>$email];
            $stmnt->execute($user_data);
            if($stmnt ->rowCount()>0){
                $error[] = "email'{$email}' already exists";
            }
                
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
        
        // To check if password already exists
        
        try{
            $stmnt = $pdo->prepare("SELECT username FROM users WHERE username = :username");
            $user_data = [':username'=>$uname];
            $stmnt->execute($user_data);
            if($stmnt ->rowCount()>0){
                $error[] = "Username '{$uname}' already exists";
            }
                
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
        
//        // Validate password strength
//        $uppercase    = preg_match('@[A-Z]@', $password);
//        $lowercase    = preg_match('@[a-z]@', $password);
//        $number       = preg_match('@[0-9]@', $password);
//        $specialChars = preg_match('@[^\w]@', $password);
//        
//        if(!$uppercase || $lowercase || $number || $specialChars || strlen($pword)<6){
//            $error[] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
//        }
        
        if(!isset($error)){
           try{
            
           $sql = "INSERT INTO users(firstname, lastname, username, email, password, validationcode, active, joined, last_login)VALUES(:firstname, :lastname,:username,:email,:password,'test', 0, current_date, current_date)";
            
           $stmnt = $pdo->prepare($sql);
           
           $user_data = [':firstname'=>$fname,':lastname'=>$lname,':username'=>$uname, ':password'=>$password,':email'=>$email];
           
           $stmnt->execute($user_data);
            $_SESSION ['message'] = " Your account '{$uname}' has been created";     
           
           echo "USER REGISTERED in DB";
           
       } catch(PDOException $e){
           echo "Error".$e->getMessage();
            } 
        } 
       
    }else{
        $fname  = "";
        $lname  = "";
        $uname  = "";
        $email  = "";
        $email_conf = "";
        $password = "";
        $pword_conf = "";
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
                              <div class="eyecon">
                                         
                                         
   
  </div><div class="hint">Needs to be at least 8 characters.</div><div class="error-msg" data-validate-target="error" data-error-handler-target="error"></div></div><div class="field-container" data-controller="ssv" data-ssv-url="/v1/usernames/availability?username="><input class="form-control" placeholder="Username" pattern=".{2,}$" type="username" data-action="input-&gt;ssv#validate input-&gt;error-handler#updateValidMessages focus-&gt;ssv#validate valid-&gt;submit#enableIfValid" data-ssv-target="input" data-error-handler-target="input" required="required" name="user[username]" id="user_username" /><div class="hint">This is your public facing name when reviewing stores and products. Two characters minimum.</div><div class="error-msg" data-ssv-target="error" data-error-handler-target="error"></div></div>
      
      <div id="checkbox-container">
      <label class="checkbox-wrapper"><input name="user[accepts_newsletter]" type="hidden" value="0" /><input type="checkbox" value="1" name="user[accepts_newsletter]" id="user_accepts_newsletter" /><span class="checkbox-image" id="notifications-checkbox"></span><span class="checkbox-label" for="notifications">Please send me emails about deals, new products, and recommendations on Weedmaps.</span></label>
      
      <label class="checkbox-wrapper">
      <input type="checkbox" name="accepts_terms" id="accepts_terms" value="true" required="required" data-action="submit#enableIfValid" />
      <span class="checkbox-image" id="terms-checkbox"></span>
      
      <span class="checkbox-label">I agree to the collection and sharing of my personal information to create a Texas car wash listing account, and I agree to the <a href='legal/terms.html'>Terms of Use</a> and <a href='legal/privacy.html'>Privacy Policy</a>.</span></label>
      </div>
       
       
          
        
<button type="submit" data-sitekey="6LeUBaYZAAAAANE9G0FJfCBD9Qf9SV-hXRaBy94s" data-badge="bottomleft" data-callback="invisibleRecaptchaSubmit" class="g-recaptcha " id="signup" disabled="disabled" data-target="submit.submit" data-action="click->analytics#track" data-analytics_name="Sign Up">Register</button>

</form>
</div>
</div>
</div>
<div class="form-container signup" data-controller="analytics">
  
    <div class="error"> 
        <?php 
            if(isset($error)){
                foreach($error as $msg){
                    echo "<p class='bg-danger text-center'>{$msg}</p>"; 
                }
            }
        ?>
        
    </div>
   
    <h2 class="form-title center">Sign up</h2>
    <div id="content-container">
        <div class="email-signup field-container">
        
        <form id="register-form" method="post" role="form">

        <input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First Name" value="<?php echo $fname ?>" required style="width:100%; margin-bottom: 15px;"  />
        
        <input type="text" name="lastname" id="lastname" tabindex="2" class="form-control loginEntry" placeholder="Last Name" value="<?php echo $lname ?>" required style="width:100%; margin-bottom: 15px;"/>
        
        <input type="text" name="username" id="username" tabindex="3" class="form-control" placeholder="Username" value="<?php echo $uname ?>" required style="width:100%; margin-bottom: 15px;">
        
         <input type="email" name="email" id="email" tabindex="4" class="form-control" placeholder="Email Address" value="<?php echo $email ?>" required style="width:100%; margin-bottom: 15px;" >
         
         <input type="email" name="email-confirm" id="confirm-email" tabindex="4" class="form-control" placeholder="Confirm Email Address" value="<?php echo $email_conf ?>" required style="width:100%; margin-bottom: 15px;" >
         
         <input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Password" value="<?php echo $password ?>" required style="width:100%; margin-bottom: 15px;">
         
        <input type="password" name="password-confirm" id="confirm-password" tabindex="6" class="form-control" placeholder="Confirm Password" value="<?php echo $pword_conf ?>" required style="width:100%; margin-bottom: 15px;"/>
         
         <button class="btn btn-default" data-action="click-&gt;signup#revealSignupForm click-&gt;analytics#track" data-analytics-name="Continue with Email" data-controller="signup" id="display_signup">Register</button>
        
            </form>

         
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

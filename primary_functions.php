<?php
//        // To check if email already exists
//        try{
//            $stmnt = $pdo->prepare("SELECT email FROM users WHERE email = :email");
//            $user_data = [':email'=>$email];
//            $stmnt->execute($user_data);
//            if($stmnt ->rowCount()>0){
//                $error[] = "email'{$email}' already exists";
//            }
//                
//        }catch(PDOException $e){
//            echo "Error".$e->getMessage();
//        }
//        
//        // To check if username already exists
//        
//        try{
//            $stmnt = $pdo->prepare("SELECT username FROM users WHERE username = :username");
//            $user_data = [':username'=>$uname];
//            $stmnt->execute($user_data);
//            if($stmnt ->rowCount()>0){
//                $error[] = "Username '{$uname}' already exists";
//            }
//                
//        }catch(PDOException $e){
//            echo "Error".$e->getMessage();
//        }
        
//        // Validate password strength
//        $uppercase    = preg_match('@[A-Z]@', $password);
//        $lowercase    = preg_match('@[a-z]@', $password);
//        $number       = preg_match('@[0-9]@', $password);
//        $specialChars = preg_match('@[^\w]@', $password);
//        
//        if(!$uppercase || $lowercase || $number || $specialChars || strlen($pword)<6){
//            $error[] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
//        }
        
?>

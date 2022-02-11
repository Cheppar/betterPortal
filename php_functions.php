<?php 

function redirect ($loc){
    header("Location: {$loc}");
}

function generate_token(){
    return md5(microtime().mt_rand());
}

// Show number of anything more of a total
// Count field value function.
function count_field_val($pdo, $tbl, $fld, $val){
     try{
         $sql= "SELECT {$fld} from {$tbl} WHERE {$fld} =:value";
         $stmnt = $pdo->prepare($sql);
         $stmnt -> execute([':value'=>$val]);
         return $stmnt -> rowCount();
     } catch (PDOException $e){
         return $e->getMessage();
     }
}

// send mail functionality
function send_mail($to, $subje ct, $body, $from, $reply){   
    $headers = "From: {$from}"."\r\n"."Reply-To;{$reply}"."\r\n"."X-Mailer:PHP/".phpversion();
        if($_SERVER['SERVER_NAME'] != "localhost"){
            mail(To, $subject, $body, $headers);
        }else{
          echo "<hr><p>{$to}</p> <p>{$subject}</p><p></p><p>{$body}</p> <p>".$headers."</p></hr>"         
        }
}



?>



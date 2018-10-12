<?

//$i_name = "Name testing";
//$i_email = "Email tesitng@xxx.com";
//$i_phone = "12345678";
//$i_comment = "comment comment";



                require("./PHPMailer_5.2.2/class.phpmailer.php");

                $mail = new PHPMailer();

                $mail->SMTPDebug  = 2; // 0 production 2 debug
                $mail->IsHTML(true);

                $mail->IsSMTP();  // telling the class to use SMTP
                $mail->Host = "superhub.hk"; // SMTP servers
                $mail->SMTPAuth = true; // turn on SMTP authentication
                $mail->SMTPSecure = ""; // sets the prefix to the servier (ssl / tls)
                $mail->Username = "sales@meghongkong.com"; // SMTP username
                $mail->Password = "canonbox448";
                $mail->Port = "587";
                $mail->CharSet = 'UTF-8';

                $mail->SetFrom('sales@meghongkong.com', 'info');
                // $mail->AddAddress("info@meg.hk", "info");
                $mail->AddAddress("barryli@hksm.com.hk", "info");
                //$mail->AddBCC("barryli@hksm.com.hk", "Barry");
                //$mail->AddBCC("matthewlam@hksm.com.hk", "Matthew");

                $mail->Subject = "網站查詢 Website inquiries";

                $mail->Body = ''
                        . 'Name: ' . $i_name . '<br>'
                        . 'Email: ' . $i_email . '<br>'
                        . 'Telephone: ' . $i_phone . '<br>'
                        . 'Details: ' . $i_comment . '<br>'
                        ;

                $mail->Send();



?>

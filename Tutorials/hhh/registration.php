<?php 

    require ('db.php');
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendmail($email,$reset_token){
        
        require ('vendor/phpmailer/src/PHPMailer.php');
        require ('vendor/phpmailer/src/Exception.php');
        require ('vendor/phpmailer/src/SMTP.php');

        $mail = new PHPMailer(true);

        try {
          $mail->isSMTP();
          $mail->Host       = 'smtp.gmail.com';
          $mail->SMTPAuth   = true;            
          $mail->Username   = 'theinhtikemm0@gmail.com';
          $mail->Password   = 'xwfepxvjrmkndjye';                    
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
          $mail->Port       = 465;                           

          $mail->setFrom('theinhtikemm0@gmail.com');
          $mail->addAddress($email);

          $mail->isHTML(true);
          $mail->Subject = 'Password Reset link form Aatmaninfo';
          $mail->Body    = "we got a request form you to reset Password! <br>Click the link bellow: <br>
          <a href='http://localhost:8000/updatePassword.php?email=$email&reset_token=$reset_token'>reset password</a>";

          $mail->send();
              return true;
      } catch (Exception $e) {
                return false;
        }
    }

    if (isset($_POST['login'])) {
        
        $email_username =$_POST['email_username'];
        $password_login =$_POST['password'];

        $sql="SELECT * FROM testing WHERE email = '$email_username' AND password = '$password_login'";
        $result = $conn->query($sql);
        
        if ($row = $result->fetch_assoc()) {
            $_SESSION['logged_in']=TRUE;
            $_SESSION['email']=$row['email'];
            header('location:index.php');

        }elseif($row['email'] === $email_username){
            echo "
                <script>
                    alert('register your email');
                    window.location.href='index.php'
                </script>";
        }else{
            echo "
                <script>
                    alert('Enter valid password');
                    window.location.href='index.php'
                </script>";
        }
    }

    if (isset($_POST['register'])) {
        
        
        $name =$_POST['name'];
        $email =$_POST['email'];
        $password =$_POST['password'];

        $user_exist_query="SELECT * FROM testing WHERE email = '$email' ";
        $result = $conn->query($user_exist_query);

        if ($result) {
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                if ($row['email'] === $email) {
                    echo "
                        <script>
                            alert('Email Address Already Exists!');
                            window.location.href='index.php'
                        </script>";
                }
            
            }else{
                
              $query=mysqli_query($conn,"INSERT INTO testing(name,email,password)VALUES('$name','$email','$password')");
                    
                if ($conn->query($query)===TRUE) {
                    echo "
                        <script>
                            alert('Registration Successful.');
                                window.location.href='index.php'
                        </script>"; 
                }else{
                    echo "
                        <script>
                            alert('something got wrong !!');
                            window.location.href='index.php'
                        </script>";
                }
            }
        }else{
            echo "
            <script>
                alert('query can not run');
                window.location.href='index.php'
            </script>";
        }
    }
    if (isset($_POST['send-link'])) {
        
        $email = $_POST['email'];

        $sql="SELECT * FROM tutorial.testing WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result) {
            
            if ($row = $result->fetch_assoc()) {
                
                $reset_token=bin2hex(random_bytes(16));
                date_default_timezone_set('Asia/kolkata');
                $date = date("Y-m-d");

                $sql = "UPDATE testing SET resettoken ='$reset_token', resettokenexp = '$date' WHERE email = '$email'";

                if (($conn->query($sql)===TRUE) && sendmail($email,$reset_token )===TRUE) {
                        echo "
                            <script>
                                alert('Password reset link send to mail.');
                                window.location.href='index.php'    
                            </script>"; 
                    }else{
                        echo "
                            <script>
                                alert('Something got Wrong');
                                window.location.href='forgotPassword.php'
                            </script>";
                    }

            }else{
                echo "
                    <script>
                        alert('Email Address Not Found');
                        window.location.href='forgotPassword.php'
                    </script>";
            }   
            
        }else{
            echo "
                <script>
                    alert('Server Down');
                    window.location.href='forgotPassword.php'
                </script>";
        }
    }
 ?>
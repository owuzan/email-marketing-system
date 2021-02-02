<?php

// Include Database Connection
require_once('connection.php');
ob_start();

function get_header() {
    require_once(__DIR__ . '/header.php');
}

function get_sidebar() {
    require_once(__DIR__ . '/sidebar.php');
}

// Get Option
function get_option($option_name) {
    
    try {
        global $db;

        $query = $db -> query("SELECT * FROM options WHERE option_name='$option_name'");
        $result = $query ->fetch(PDO::FETCH_ASSOC);

        return $result['value'];
        
   } catch ( PDOException $e ){
        echo "Bir Hata Oluştu: ".$e->getMessage();
   }
}

// Get Note
function get_note($note_id, $param) {
    
    try {
        global $db;

        $query = $db -> query("SELECT * FROM notes WHERE id='$note_id'");
        $result = $query ->fetch(PDO::FETCH_ASSOC);

        return $result[$param];
        
   } catch ( PDOException $e ){
        echo "Bir Hata Oluştu: ".$e->getMessage();
   }
    
}

// Login Result Function
function login() {
    
    global $db;

    if(isset($_POST['login'])) {
    
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $passCOOKIE = $pass;
        $pass = md5($pass);

        if(isset($_POST['remember-me'])) {
            $remember = $_POST['remember-me'];
        }

    
        $users = $db -> prepare("SELECT * FROM users WHERE username=?");
        $users -> execute(array($username));

        $result = "<ul>";
    
        if($users -> rowCount()) {
    
            foreach($db -> query("SELECT * FROM users WHERE username='$username'") as $user) {
    
                $user_password = $user['pass'];
    
                if($user_password == $pass) {

                    $_SESSION['user_id'] = $user['id'];
                    
                    if(isset($remember)) {
                        setcookie('username', $username, time() + (60*60*24));
                        setcookie('pass', $passCOOKIE, time() + (60*60*24));
                        setcookie('remember-me', 'checked=""', time() + (60*60*24));
                    } else {
                        setcookie('username', $username, time() - 3600);
                        setcookie('pass', $passCOOKIE, time() - 3600);
                        setcookie('remember-me', 'checked=""', time() - 3600);
                    }
                    
                    header('Location:' . get_option('site_url'));
                    exit;

                } else {
                    $result .= '<li>Yanlış şifre girildi.</li>';
                }
            }
    
        } else {
            $result .= '<li>Kullanıcı Bulunamadı!</li>';
        }

        $result .= '</ul>';
        echo $result;
    
    }
}

// Login Control
function is_login() {

    if(isset($_SESSION['user_id'])) {
        
        global $db;
        $id = $_SESSION['user_id'];
    
        $query = $db -> query("SELECT active FROM users WHERE id='$id'");
        $user = $query ->fetch(PDO::FETCH_ASSOC);

        $is_active = $user['active'];
    
        if( isset($id) && $is_active == 1 ) {
            return true;
        } else {
            $_SESSION['user_id'] = "";
            return false;
        }
    }
        
}

// Register Result Function
function register_result() {

    global $db;
        
    if(isset($_POST['register'])) {

        $username = $_POST['username'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        $email = $_POST['email'];
        $error = 0;
        
        $users = $db -> prepare("SELECT * FROM users WHERE username=?");
        $users -> execute([($username)]);
        $emails = $db -> prepare("SELECT * FROM users WHERE email=?");
        $emails -> execute([($email)]);
        $result = "<b>";
        
        if (strpos($username, ' ') !== FALSE) {
            $result .= "<p>Kullanıcı adınız boşluk içermemeli.</p>";
            $error++;
        }

        if ($users -> rowCount()) {
            $result .= '<p>Bu kullanıcı adı zaten kullanılıyor.</p>';
            $error++;
        }

        if ($emails -> rowCount()) {
            $result .= '<p>Bu e-posta adresi zaten kullanılıyor.</p>';
            $error++;
        }
        
        if (strcmp($pass, $pass2) !== 0) {
            $result .= "<p>Şifreler eşleşmiyor.</p>";
            $error++;
        }
        
        if(strlen($pass) < 8) {
            $result .= "<p>Parolanız en az 8 karakter uzunluğunda olmalıdır.";
            $error++;
        }
        
        if (empty($username)) {
            $result .= '<p>Kullanıcı adı boş olamaz.</p>';
            $error++;
        }

        if ($error == 0) {

            $pass = md5($pass);
            $register_key = random_key();
            $db -> exec("INSERT INTO users (username, name, surname,  pass, email, register_key) VALUES ('$username', '$name', '$surname', '$pass', '$email', '$register_key')");

            $query = $db -> query("SELECT id FROM users WHERE username='$username'");
            $user = $query ->fetch(PDO::FETCH_ASSOC);


            
            echo '<p><b>Kayıt başarılı, tamamlamak için e-posta adresinize gelen aktivasyon linkine tıklayın.</b></p><br>';

            $to = $email;
            $subject = "E-Mail Marketing Kaydınızı Tamamlayın";
            $content = 'Kaydınızı tamamlamak için <a href="' . get_option("site_url") . '/account-activity/?id=' . $user['id'] . '&activation_key=' . $register_key . '">buraya</a> tıklayın.';
            
            send_mail($to, $subject, $content);

        } else {

            $error = 0;
            $result .= '</b><br>';
            echo $result;
            $result = '';
        }
    }
}

// Register Result Function
function update_profile() {

    global $db;

    $name = "";
    $surname = "";
    $email = "";

    if(isset($_POST['update-profile'])) {

        if(isset($_POST['profile-name'])) {

            $name = $_POST['profile-name'];

            $name = trim($name);

        }

        if(isset($_POST['profile-surname'])) {

            $surname = $_POST['profile-surname'];

            $surname = trim($surname);

        }

        if(isset($_POST['profile-email'])) {

            $email = $_POST['profile-email'];

            $email = trim($email);

        } else {

            return false;
            
        }
        
        
        if(strpos($email, ' ')) {
            
            return false;
            
        }
        
        if(!strpos($email, '@')) {
            
            return false;
            
        }
        
        $id = user('id');
        
        $query = $db -> query("SELECT id FROM users WHERE email='$email'");
        
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        
        if($query -> rowCount() == 1) {
            
            if(!$result['id'] == $id) {
                
                return false;
                
            }
            
        } else if(($query -> rowCount()) > 1) {
            
            echo 'Hata.';
            return false;
            
        }
        
        if(isset($result['email'])) {
            
            return false;
            
        } else {


            $query = $db -> query("SELECT email FROM users WHERE email='$email'");
            
            $result = $query -> fetch(PDO::FETCH_ASSOC);


            if(isset($result['email'])) {
    
                return false;
    
            } else {
            
                $query = $db -> prepare("UPDATE users SET name=:name, surname=:surname, email=:email WHERE id=:id");
                $query -> execute([
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email,
                    'id' => $id
                    ]);
    
                $_SESSION['name'] = $name;
                $_SESSION['surname'] = $surname;
                $_SESSION['email'] = $email;
    
                return true;

            }

            
                
        }
        
    }
}

function update_password() {

    global $db;

    if(isset($_POST['update-password'])) {

        $user_id = user('id');
        $approvedKey = user('pass');
        
        if(isset($_POST['current-password'])) {
            $currentPassword = $_POST['current-password'];
            $currentKey = md5($currentPassword);
        } else {
            return false;
        }
        
        if(isset($_POST['new-password'])) {
            $newPassword = $_POST['new-password'];
            $newKey = md5($newPassword);
        } else {
            return false;
        }

        if(isset($_POST['new-password-again'])) {
            $newPasswordAgain = $_POST['new-password-again'];
        } else {
            return false;
        }

        if (strcmp($approvedKey, $currentKey) !== 0) {
            return false;
        }
        
        if (strcmp($newPassword, $newPasswordAgain) !== 0) {
            return false;
        }
        
        if(strlen($newPassword) < 8) {
            return false;
        }
        
        $update = $db -> prepare("UPDATE users SET pass=:pass WHERE id=:id");
        
        $result = $update -> execute([
            "pass" => $newKey,
            "id" => $user_id
        ]);

        return true;                
            

    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($to, $subject, $content) {

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        $mail->CharSet = 'UTF-8';

        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.sendgrid.net';                    // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'apikey';                                // SMTP username
        $mail->Password   = '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';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('noreply@staj.oguzhan.dev', 'E-Mail Marketing');
        $mail->addAddress($to, 'Oğuzhan Yılmaz');     // Add a recipient
        $mail->addReplyTo('reply@staj.oguzhan.dev', 'Information');
        // $mail->addCC('ooguzhanyilmazz41@gmail.com');
        // $mail->addBCC('ooguzhanyilmazz41@gmail.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<p><b>E-Posta başarılı bir şekilde gönderildi.</b></p><br>';
    } catch (Exception $e) {
        echo "<p><b>E-Posta gönderme başarısız: </b> {$mail->ErrorInfo} </p><br>";
    }
}

function update_system_settings() {

    global $db;

    if(isset($_POST['system-options'])) {

        try {
            $site_name = $_POST['site-name'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'site_name',
                "value" => $site_name
            ]);

            $site_url = $_POST['site-url'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'site_url',
                "value" => $site_url
            ]);

            $date_format = $_POST['date-format'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'date_format',
                "value" => $date_format
            ]);
                
            $time_format = $_POST['time-format'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'time_format',
                "value" => $time_format
            ]);

            return true;

        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p><br>';
        }

    }
}

function update_email_settings() {

    global $db;

    if(isset($_POST['email-options'])) {

        try {
            $email_host = $_POST['email-host'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_host',
                "value" => $email_host
            ]);

            if(isset($_POST['smtp-auth'])) {
                $smtp_auth = 'true';
            } else {
                $smtp_auth = 'false';
            }
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_smtp_auth',
                "value" => $smtp_auth
            ]);

            $email_username = $_POST['email-username'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_username',
                "value" => $email_username
            ]);

            $email_password = $_POST['email-password'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_password',
                "value" => $email_password
            ]);

            $email_smtp_secure = $_POST['email-smtp-secure'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_smtp_secure',
                "value" => $email_smtp_secure
            ]);

            $email_port = $_POST['email-port'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_port',
                "value" => $email_port
            ]);

            $email_default_from = $_POST['email-default-from'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_default_from',
                "value" => $email_default_from
            ]);

            $email_default_cc = $_POST['email-default-cc'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_default_cc',
                "value" => $email_default_cc
            ]);

            $email_default_bcc = $_POST['email-default-bcc'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_default_bcc',
                "value" => $email_default_bcc
            ]);

            $email_default_reply_to = $_POST['email-default-reply-to'];
            $update = $db -> prepare("UPDATE options SET value=:value WHERE option_name=:option_name");
            $result = $update -> execute([
                "option_name" => 'mail_default_reply_to',
                "value" => $email_default_reply_to
            ]);

            return true;

        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p><br>';
        }

    }
}

function random_key($length = 55) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function add_email() {

    global $db;

    try {

        if(isset($_POST['add-email'])) {
    
            $name = "";
            $surname = "";
            $email = "";
            $phone = "";
            $gender = "";
            $error = 0;
    
            if(isset($_POST['name'])) {
                
                $name = $_POST['name'];
                
                $name = trim($name);

            }

            if(isset($_POST['surname'])) {
                
                $surname = $_POST['surname'];
                
                $surname = trim($surname);

            }

            if(isset($_POST['email'])) {
                
                $email = $_POST['email'];
                
                $email = trim($email);

            } else {

                return false;
                
            }

            if(isset($_POST['phone'])) {
                
                $phone = $_POST['phone'];
                
                $phone = trim($phone);

            }

            if(isset($_POST['gender'])) {
                
                $gender = $_POST['gender'];

            } else {
                
                $gender = 0;

            }
    
            $query = $db -> query("SELECT email FROM emails WHERE email='$email'");
            
            $result = $query -> fetch(PDO::FETCH_ASSOC);
    
            if(isset($result['email'])) {
    
                $error++;
                
                return false;
    
            } else {
            
                $query = $db -> exec("INSERT INTO emails (name, surname, email, phone, gender) VALUES ('$name', '$surname', '$email', '$phone', '$gender')");

                return true;

            }
    
        }

    } catch (PDOExpection $e) {
        
        return false;

        echo $e -> getMessage();

    }
                        
}

function edit_email() {

    global $db;

    try {

        if(isset($_POST['save-email'])) {
            
            $name = "";
            $surname = "";
            $email = "";
            $phone = "";
            $gender = "";
            
            if(isset($_POST['name'])) {
                
                $name = $_POST['name'];
                
                $name = trim($name);

            }

            if(isset($_POST['surname'])) {
                
                $surname = $_POST['surname'];
                
                $surname = trim($surname);

            }

            if(isset($_POST['email'])) {
                
                $email = $_POST['email'];
                
                $email = trim($email);

            } else {
                
                return false;
                
            }
            
            if(isset($_POST['phone'])) {
                
                $phone = $_POST['phone'];
                
                $phone = trim($phone);
                
            }
            
            if(isset($_POST['id'])) {
                
                $id = $_POST['id'];
                
            } else {
                
                return false;

            }

            if(isset($_POST['gender'])) {
                
                $gender = $_POST['gender'];
                
            } else {
                
                $gender = 0;
                
            }
            
            $query = $db -> query("SELECT id FROM emails WHERE email='$email'");
            
            $result = $query -> fetch(PDO::FETCH_ASSOC);

            if($query -> rowCount() == 1) {
                
                if(!$result['id'] == $id) {
                    
                    return false;
                    
                } 
                
            } else if(($query -> rowCount()) > 1) {
                
                return false;
                
            }
            
            if(isset($result['email'])) {
                
                return false;
                
            } else {
                
                $query = $db -> prepare("UPDATE emails SET name=:name, surname=:surname, email=:email, phone=:phone, gender=:gender WHERE id=:id");
                $query -> execute([
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email,
                    'phone' => $phone,
                    'gender' => $gender,
                    'id' => $id
                    
                    ]);

                    return true;
                    
            }
    
        }

    } catch (PDOExpection $e) {
        
        return false;

        echo $e -> getMessage();

    }
                        
}

function user($param) {
    
    try {
        global $db;

        if(isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $query = $db -> query("SELECT * FROM users WHERE id='$id'");
            $result = $query ->fetch(PDO::FETCH_ASSOC);
            return $result[$param];
        }
        
   } catch ( PDOException $e ){
        echo "Bir Hata Oluştu: ".$e->getMessage();
   }
}

function add_note() {

    global $db;
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['add-note'])) {
        $note_title = $_POST['note-title'];
        $note_title = trim($note_title);
        $note_content = $_POST['note-content'];
        $note_content = trim($note_content);
        $error = 0;

        if(empty($note_title)) {
            $error++;
        }
        if(empty($note_content)) {
            $error++;
        }

        if($error > 0) {
            return false;
        }

        try {
            $query = $db -> exec("INSERT INTO notes (note_title, note_content, user_id) VALUES ('$note_title', '$note_content', '$user_id')");
            return true;
        } catch ( PDOException $e ) {
            echo "Bir Hata Oluştu: ".$e->getMessage();
            return false;
        }

    }

}

function save_note() {

    if(isset($_POST['save-note'])) {

        try {

            global $db;

            $title = $_POST['note-title'];
            $title = trim($title);
            
            $content = $_POST['note-content'];
            $content = trim($content);
            
            $note_id = $_POST['id'];
            
            $error = 0;

            if(empty($title)) {
                $error++;
            }

            if(empty($content)) {
                $error++;
            }

            if($error > 0) {
                return false;
            }
    
            $update = $db -> prepare("UPDATE notes SET note_title=:title, note_content=:content WHERE id=:id");
            
            $result = $update -> execute([
            
                "title" => $title,
            
                "content" => $content,
            
                "id" => $note_id
                
                ]);

                return true;
                
            } catch (PDOException $e) {
                
                echo $e -> getMessage();

                return false;

        }
                
    }

}

function note_control() {

    if(isset($_POST['edit-note'])) {

        try {
            
            $id = $_POST['id'];
            
            $note_user_id = get_note($id, 'user_id');
            
            $user_id = user('id');
        
            if($note_user_id == $user_id) {
                
                $note_title = get_note($id, 'note_title');
            
                $note_content = get_note($id, 'note_content');

                return $id;
        
            } else {
                
                return false;

            }
    
        } catch (PDOException $e) {
            
            $e->getMessage();
            
            return false;
    
        }
    
    }


    if(isset($_POST['save-note'])) {

        try {
            
            $id = $_POST['id'];
            
            $note_user_id = get_note($id, 'user_id');
            
            $user_id = user('id');
        
            if($note_user_id == $user_id) {
                
                $note_title = get_note($id, 'note_title');
            
                $note_content = get_note($id, 'note_content');

                return $id;
        
            } else {
                
                return false;
                
            }
            
        } catch (PDOException $e) {
            
            $e->getMessage();
            
            return false;
    
        }
    
    }

    if(isset($_POST['delete-note'])) {

        try {
            
            $id = $_POST['id'];
            
            $note_user_id = get_note($id, 'user_id');
            
            $user_id = user('id');
        
            if($note_user_id == $user_id) {
                
                return $id;
        
            } else {
                
                return false;
                
            }
            
        } catch (PDOException $e) {
            
            $e->getMessage();
            
            return false;
    
        }
    
    }

}

function add_list() {

    global $db;

    if(!isset($_POST['list-title'])) {
        return false;
    } else {
        
        if(!empty($_POST['list-title'])) {
            $list_title = $_POST['list-title'];
        } else {
            return false;
        }
    }

    if(isset($_POST['add-list'])) {

        if(!empty($_POST['selected-emails'])) {
            
            $emails = "";

            foreach ($_POST['selected-emails'] as $email) {
                
                $emails .= $email . " ";

            }
            
            $query = $db -> exec("INSERT INTO lists (list_title, emails) VALUES ('$list_title', '$emails' ) ");

            return true;
        }

        return false;
        
    }
    
    return false;

}

function edit_list() {

    global $db;

    $id = $_POST['list-id'];

    if(!isset($_POST['list-title'])) {
        return false;
    } else {
        
        if(!empty($_POST['list-title'])) {
            $list_title = $_POST['list-title'];
        } else {
            return false;
        }
    }

    if(isset($_POST['edited-list'])) {

        if(!empty($_POST['selected-emails'])) {
            
            $emails = "";

            foreach ($_POST['selected-emails'] as $email) {
                
                $emails .= " " . $email;

            }
            
            $query = $db -> prepare("UPDATE lists SET list_title=:list_title, emails=:emails WHERE id=:id");
            $query -> execute([
                "list_title" => $list_title,
                "emails" => $emails,
                "id" => $id
            ]);

            return true;
        }

        return false;
        
    }
    
    return false;

}
<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    include_once 'session.php';
    include 'database.php';
    include ('smtp/PHPMailerAutoload.php');

class user{
    private $db;
    public function __construct(){
        $this->db = new database();
    }

    public function userRegistration($data)
    {
        $name   = $data['name'];
        $email  = $data['email'];
        $mobile = $data['mobile'];
        $pass   = md5($data['pass']);
        $type   = $data['type'];
        $verification_status = false;

        $chk_email = $this->emailCheck($email);

        if ($name == "" or $email == "" or $mobile == "" or $pass == "" or $type == "") {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong> Field must not be Empty</div>";
            return $mgs;
        }

        if (strlen($name)<3) {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong> User name is too Short!</div>";
            return $mgs;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $mgs = "<div class='alert alert-danger'><strong>Error! </strong>The email address is already Exist!</div>";
            return $mgs;
        }

        if ($chk_email == true) {
            $mgs = "<div class='alert alert-danger'><strong>Error! </strong>The email address is not valid!</div>";
            return $mgs;
        }

        $sql = "INSERT INTO tabel_user (name, email, mobile, pass, type) VALUES(:name, :email, :mobile, :pass, :type)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name',$name);
        $query->bindValue(':email',$email);
        $query->bindValue(':mobile',$mobile);
        $query->bindValue(':pass',$pass);
        $query->bindValue(':type',$type);
        $result = $query->execute();

        if ($result) {
            $conn = mysqli_connect('localhost', 'root', '', 'db_lr');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM tabel_user WHERE email = '$email'";
            $res =  $conn->query($sql);
            $row = $res->fetch_assoc();
            $id = $row['id'];
            $str = $row['id'] . $row['email'] . $row['name'];
            $verification_id = hash('md5', $str);
            $sql = "UPDATE tabel_user set verification_id='$verification_id' where id='$id'";
            $conn->query($sql);
            $conn->close();

            $mailHtml = "Please confirm your registration by clicking the button bellow: <br><a href='http://localhost/accountAutomationSystem/verification.php?verification_id=$verification_id'><input name='submit' class='btn btn-primary mt-4' type='submit' value='Verify your account'></a>";
            
            if($this->smtp_mailer($email, 'Account Varification', $mailHtml) == true)
            {
                $msg = "<div class='alert alert-success'><strong>Success! </strong>We've sent you a confirmation email.</div>";
                return $msg;
            }
            else
            {
                return "Cannot send mail";
            }
        }
        else{
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Sorry! There have been problem inserting your details!</div>";
            return $msg;
        }
    }

    public function smtp_mailer($to, $subject, $msg){
        $mail = new PHPMailer(); 
        $mail->IsSMTP(); 
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'TLS'; 
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587; 
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username = "just.automation.18@gmail.com";
        $mail->Password = "abcde12345edcba";
        $mail->SetFrom("just.automation.18@gmail.com");
        $mail->Subject = $subject;
        $mail->Body = $msg;
        $mail->AddAddress($to);
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));

        if(!$mail->Send()){
            return false;
        }else{
            return true;
        }
    }
    public function prepareData($conn, $data)
    {
        return mysqli_real_escape_string($conn, stripslashes(htmlspecialchars($data)));
    }

    public function emailCheck($email){
        $sql = "SELECT email FROM tabel_user WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
        if ($query->rowCount()>0) {
            return true;
        }
        else{
            return false;
        }
    }

    public function getLoginUser($email,$pass,$type){
        $sql = "SELECT * FROM tabel_user WHERE email = :email AND pass = :pass AND type = :type LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':pass',$pass);
        $query->bindValue(':type',$type);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function userLogin($data){
        $email  = $data['email'];
        $pass   = md5($data['pass']);
        $type   = $data['type'];

        $conn = mysqli_connect('localhost', 'root', '', 'db_lr');

        $chk_email = $this->emailCheck($email);

        

        if ($email == "" or $pass == "" or $type == "") {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>Field must not be Empty</div>";
            return $mgs;
        }

        if ($chk_email == false) {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>The email address not exist!</div>";
            return $mgs;
        }

        $sql = "SELECT * FROM tabel_user WHERE email = '$email'";
        $res =  $conn->query($sql);
        $row = $res->fetch_assoc();
        $verification_status = $row['verification_status'];

        if ($verification_status == false) {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong> Please verify your email first.</div>";
            return $mgs;
        }

        $result = $this->getLoginUser($email, $pass, $type);
        if ($result) {
            session::init();
            session::set("login", true);
            session::set("id", $result->id);
            session::set("name", $result->name);
            session::set("loginmgs", "<div class='alert alert-success'><strong>Success</strong>You are LoggedIn.</div>");
            header("Location: index.php");
        }
        else{
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong> Email or password is invalid!</div>";
            return $mgs;
        }
    }

    public function getuserdata(){
        $sql = "SELECT * FROM tabel_user ORDER BY id ASC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    public function getuserbyid($id){
        $sql = "SELECT * FROM tabel_user  WHERE id = :id LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id',$id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function updateUserData($id, $data){
        $name   = $data['name'];
        $email  = $data['email'];
        $mobile = $data['mobile'];

        if ($name == "" or $email == "" or $mobile == "") {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>Field must not be Empty</div>";
            return $mgs;
        }

        $sql = "UPDATE  tabel_user set 
                    name    = :name,
                    email   = :email,
                    mobile  = :mobile
                WHERE id    = :id";

        $query = $this->db->pdo->prepare($sql);

        $query->bindValue(':name',$name);
        $query->bindValue(':email',$email);
        $query->bindValue(':mobile',$mobile);
        $query->bindValue(':id', $id);
        $result = $query->execute();
        if ($result) {
            $mgs = "<div class='alert alert-success'><strong>Success</strong> User data updated seccessfully.</div>";
            return $mgs;
        }
        else{
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>Sorry! User data not updated!</div>";
            return $mgs;
        }
    }
}

?>
<?php
    include_once 'session.php';
    include 'database.php';

class user{
    private $db;
    public function __construct(){
        $this->db = new database();
    }

    public function userRegistration($data){
        
        $name   = $data['name'];
        $email  = $data['email'];
        $mobile = $data['mobile'];
        $pass   = md5($data['pass']);

        $chk_email = $this->emailCheck($email);

        if ($name == "" or $email == "" or $mobile == "" or $pass == "" ) {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>Field must not be Empty</div>";
            return $mgs;
        }

        if (strlen($name)<3) {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>User name is too Short!</div>";
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

        $sql = "INSERT INTO tabel_user (name, email, mobile, pass) VALUES(:name, :email, :mobile, :pass)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name',$name);
        $query->bindValue(':email',$email);
        $query->bindValue(':mobile',$mobile);
        $query->bindValue(':pass',$pass);
        $result = $query->execute();
        if ($result) {
            $mgs = "<div class='alert alert-success'><strong>Success</strong>Thank you, You have been Registered.</div>";
            return $mgs;
        }
        else{
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>Sorry! There have been problem inserting your details!</div>";
            return $mgs;
        }

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

    public function getLoginUser($email,$pass){
        $sql = "SELECT * FROM tabel_user WHERE email = :email AND pass = :pass LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':pass',$pass);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function userLogin($data){
        $email  = $data['email'];
        $pass   = md5($data['pass']);

        $chk_email = $this->emailCheck($email);

        if ($email == "" or $pass == "") {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>Field must not be Empty</div>";
            return $mgs;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) ===false) {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>The email address is already Exist!</div>";
            return $mgs;
        }

        if ($chk_email == false) {
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>The email address not exist!</div>";
            return $mgs;
        }

        $result = $this->getLoginUser($email, $pass);
        if ($result) {
            session::init();
            session::set("login", true);
            session::set("id", $result->id);
            session::set("name", $result->name);
            session::set("loginmgs", "<div class='alert alert-success'><strong>Success</strong>You are LoggedIn.</div>");
            header("Location: index.php");
        }
        else{
            $mgs = "<div class='alert alert-danger'><strong>Error!</strong>Data not found!</div>";
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
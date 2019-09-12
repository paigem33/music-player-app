<?php
    class Account {

        private $con;
        private $errorArray;

        public function __construct($con){
            $this->con = $con;
            $this->errorArray = array();
        }
        //register is a public function becasue it is the one we will be calling from a different file
        public function register($username, $firstName, $lastName, $em, $em2, $pw, $pw2) {
            //$this-> tells it to look at this class
            $this->validateUsername($username);
            $this->validateFirstName($firstName);
            $this->validateLastName($lastName);
            $this->validateEmail($em, $em2);
            $this->validatePassword($pw, $pw2);

            if(empty($this->errorArray) == true){
                //insert into db
                return $this->insertUserDetails($username, $firstName, $lastName, $em, $em2, $pw, $pw2);
            } else {
                return false;
            }
        } 

        public function getError($error){
            if(!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function insertUserDetails($username, $firstName, $lastName, $em, $pw){
            $encryptedPw = md5($pw); //password -> hgieugeigirgdh
            $profilePic = "assets/images/profilePic.png";
            $date = date("Y-m-d");

            //returns true or false based on if it worked or not
            $result = mysqli_query($this->con, "INSERT INTO users VALUES (NULL, '$username', '$firstName', '$lastName', '$em', '$encryptedPw', '$date', '$profilePic')");

            return $result;
        }

        //private means it can only be called within this class
        private function validateUsername($username){
            
            if(strlen($username) > 25 || strlen($username) < 5){
                //The :: is like the ->, but the :: is for when you do not have an instance of the class, and then -> is for when you do
                array_push($this->errorArray, Constants::$usernameLength);
                return;
            }
            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
            if(mysqli_num_rows($checkUsernameQuery)!= 0){
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }

        }

        private function validateFirstName($firstName){
            if(strlen($firstName) > 25 || strlen($firstName) < 2){
                array_push($this->errorArray, Constants::$firstNameLength);
                return;
            }
        }

        private function validateLastName($lastName){
            if(strlen($lastName) > 25 || strlen($lastName) < 2){
                array_push($this->errorArray, Constants::$lastNameLength);
                return;
            }
        }

        private function validateEmail($em, $em2){
            if($em != $em2){
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }
            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
            if(mysqli_num_rows($checkUsernameQuery)!= 0){
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }
        }

        private function validatePassword($pw, $pw2){
            if($pw != $pw2){
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return;
            }
            if(preg_match('/[^A-Za-z0-9]/', $pw)){
                //TODO: Change to require a special char
                array_push($this->errorArray, Constants::$passwordsNotAlphanumeric);
                return;
            }
            if(strlen($pw) > 30 || strlen($pw) < 5){
                array_push($this->errorArray, Constants::$passwordsLength);
                return;
            }
        }
    }
?>
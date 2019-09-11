<?php
    class Account {

        private $errorArray;

        public function __construct(){
            $this->$errorArray = array();
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
                return true;
            } else {
                return false;
            }
        }

        //private means it can only be called within this class
        private function validateUsername($username){
            
            if(strlen($username) > 25 || strlen($username) < 5){
                array_push($this->errorArray, "Your username must be between 5 and 25 characters");
                return;
            }
            //TODO: check if username already exists

        }

        private function validateFirstName($firstName){
            if(strlen($firstName) > 25 || strlen($firstName) < 2){
                array_push($this->errorArray, "Your first name must be between 5 and 25 characters");
                return;
            }
        }

        private function validateLastName($lastName){
            if(strlen($lastName) > 25 || strlen($lastName) < 2){
                array_push($this->errorArray, "Your last name must be between 5 and 25 characters");
                return;
            }
        }

        private function validateEmail($em, $em2){
            if($em != $em2){
                array_push($this->errorArray, "Your emails don't match");
                return;
            }
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, "Your emails is invalid");
                return;
            }
            //TODO: check that email is not already in use
        }

        private function validatePassword($pw, $pw2){
            if($pw != $pw2){
                array_push($this->errorArray, "Your passwords don't match");
                return;
            }
            if(preg_match('/[^A-Za-z0-9]/', $pw)){
                //TODO: Change to require a special char
                array_push($this->errorArray, "Your passwords can only contain numbers and letters");
                return;
            }
            if(strlen($pw) > 30 || strlen($pw) < 5){
                array_push($this->errorArray, "Your password must be between 5 and 30 characters");
                return;
            }
        }
    }
?>
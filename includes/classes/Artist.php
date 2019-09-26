<?php
	class Artist {

        private $con;
        private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
        }
        
        public function getName(){
            //without the con it will be looking for a local variable called con, but there isnt one, this refers to a class variable
            $artistQuery = mysqli_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
            $artist = mysqli_fetch_array($artistQuery);
            return $artist['name'];
        }
    }
?>
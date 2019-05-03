<h3>Movie Details</h3>
<?php
    abstract class Movie {

        protected $rating;
    
        public function setrating($value) {
            $this -> rating = $value;
        }

        public function getgenres(){
          return "Action";
        }

        // Abstract method
        abstract public function Movie_details();
    }

    class Avatar extends Movie {

        public function Movie_details()
        {
          $miles = $this -> rating/5;
          $miles = $miles/4;
          return "</p>Ratings : " . $miles . "/ 5</p>";
        }

        public function getgenres(){
            return "<p>Genere : sci-fi, Adventure</p>";
        }
    }

    $mov = new Avatar;

    $mov -> setrating(75);

     echo $mov -> Movie_details();

     echo $mov -> getgenres();

?>
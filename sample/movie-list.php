<?php
    
    $json = file_get_contents('./codebeautify.json');
    $json_data = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json), true );

    class movie{

        var $name, $image, $year, $genre; 
    
        // Constructor for class initialization 
        public function movie($data) { 
            $this->name = $data['name']; 
            $this->year = $data['year']; 
            $this->image = $data['image'];
            $this->genre = $data['genre'];
        }
    }

    function data2Object($data) {
        $class_object = new movie($data); 
        return $class_object; 
    }

    function compare($object1, $object2) { 
        return $object1->year > $object2->year; 
    } 
    
    function filterByyear($movie_data){
        foreach ($movie_data as $key1 => $value1) {
            if($movie_data->year == 2008){
                print_r($movie_data[$key1]);
                }
        }
    }

    function getArrayFiltered($aFilterKey, $aFilterValue, $array) {
        $filtered_array = array();
        foreach ($array as $value) {
            if (isset($value->$aFilterKey)) {
                if ($value->$aFilterKey == $aFilterValue) {
                    $filtered_array[] = $value;
                }
            }
        }
    
        return $filtered_array;
    }


    function getunique($array, $item){
        $genre_array = array();
        foreach($array as $key=>$value){
            array_push($genre_array, $value->$item);
        }
        return array_unique($genre_array);
    }


    // Generating array of objects 
    $movie_data = array_map('data2Object', $json_data);
    
    usort($movie_data, 'compare');
    
    // print_r($movie_data);
    $movie_genre = getunique($movie_data, 'genre');
    $movie_release = getunique($movie_data, 'year');
    sort($movie_release);
    $movie_release = array_reverse($movie_release);
    // print_r($movie_release);
    sort($movie_genre);
    // print_r($movie_genre);
    if (isset($_GET['year'])){
        if($_GET['year'] != "all"){
            $movie_data = getArrayFiltered(year, $_GET['year'], $movie_data);
            $date_active = $_GET['year'];
        }
    }
    if (isset($_GET['genre'])){
        if($_GET['genre'] != "all"){
            $movie_data = getArrayFiltered(genre, $_GET['genre'], $movie_data);
            $genre_active = $_GET['genre'];
        }
    }
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<div class="selection">
    <div class="selector">
        <?php
            echo "<select name='year' id='year'><option value='all' selected=''>Year</option>";
            foreach($movie_release as $year){
                if($date_active === $year){
                    echo "<option value='" . $year. "' selected>" . $year . "</option>";
                } else {
                    echo "<option value='" . $year. "'>" . $year . "</option>";
                }
            }
            echo "</select>";

        ?>
    </div>
    <div class="selector">
        <?php
            echo "<select name='genre' id='genre'><option value='all' selected=''>Genre</option>";
            foreach($movie_genre as $genre){
                if($genre_active === $genre){
                    echo "<option value='" . $genre. "' selected>" . $genre . "</option>";
                } else {
                    echo "<option value='" . $genre. "'>" . $genre . "</option>";
                }
            }
            echo "</select>";
        ?>
    </div>
</div>
<div class="slider">
        <div class="movie-list owl-carousel owl-theme">
        <?php
            foreach($movie_data as $key=>$value){
                echo "<div class='item'>";
                echo "<h4>" .$value->name. "</h4>";
                echo "<img src='$value->image' class='img-fluid'>";
                echo "<p>Year : " .$value->year. "</hp>";
                echo "<p>Genre : " .$value->genre. "</p>";
                echo "</div>";
              }
        ?>
        </div>
        
</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script src="index.js"></script>
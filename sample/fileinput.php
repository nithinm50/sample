
 <h3>Get content from file</h3>
 <?php
     $file = fopen("input.txt", "r") or die("Unable to open file!");
     $members = array();
     while (!feof($file)) {
         $members[] = fgets($file);
     }
     fclose($file);
    //  print_r($members);
 
     foreach($members as $member){
         echo "<p>" . $member . "</p>";
     }
    //  $r_items = str_replace(array("\r", "\n"), '', $items);
 
     echo $items;

     $input_array = array('na', 15, 'asdjf', 13);

     $temp = array();

     foreach($input_array as $input){
         $count = 0;
         foreach($members as $member){
                if($member == $input){
                    echo $input;
                } else{
                    continue;
                }
            }
     }

    //  print_r($temp);


 ?>


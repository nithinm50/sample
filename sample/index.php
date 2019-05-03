<?php
$person = array("nithin"=>27, "yatish" =>25, "likitha"=>21, "marios"=>30, "siddul"=> 20);


echo "<h4>Associative array items</h4>";
// Display array items
foreach($person as $key => $value){
    echo "<p>" . $key . " : " . $value . "</p>";
}
echo "<hr style='border-top:1px solid #f4f4f4'>";
echo "<h4>Add array item</h4>";
echo "<p>Adding a new person <b>Aruna</b></p>";
$person['aruna'] = 26;
// Display array items
foreach($person as $key => $value){
    echo "<p>" . $key . " : " . $value . "</p>";
}
echo "<hr style='border-top:1px solid #f4f4f4'>";
echo "<h4>Remove array item</h4>";
echo "<p>Remove item named <b>Yatish</b></p>";
unset($person["yatish"]);
// array_pop($person);
// Display array items
foreach($person as $key => $value){
    echo "<p>" . $key . " : " . $value . "</p>";
}
echo "<hr style='border-top:1px solid #f4f4f4'>";
echo "<p>Sort the array by <b>age</b></p>";
asort($person);
foreach($person as $key => $value){
    echo "<p>" . $key . " : " . $value . "</p>";
}
echo "<p>Sort the array by <b>name</b></p>";
ksort($person);
foreach($person as $key => $value){
    echo "<p>" . $key . " : " . $value . "</p>";
}

echo "<hr style='border-top:1px solid #f4f4f4'>";
echo "<p>convert array to json</p>";
$json_val = json_encode($person);
echo "<p>" . $json_val . "</p>";
echo "<hr style='border-top:1px solid #f4f4f4'>";
echo "<p>convert json to array</p>";
$json_convert = json_decode($json_val);
foreach($json_convert as $key => $value){
    echo "<p>" . $key . " : " . $value . "</p>";
}
echo "<hr style='border-top:1px solid #f4f4f4'>";
echo "<p>Convert the array to object</p>";
$object = (object) $person;

foreach ($person as $key => $value)
{
    echo "<p> name: " . $key . ", age: " . $object->$key."</p>";
}

echo "<hr style='border-top:1px solid #f4f4f4'>";
?>


<?php
$aaa=array("a"=>"red","b"=>"green","c"=>"blue");
echo array_search("red",$aaa);
?>
<?php
        $json1 = file_get_contents('codebeautify.json');
        // $json_data = json_encode($json1, true);
        var_dump($json1);
    ?>
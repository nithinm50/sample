<?php
$url = "https://restcountries.eu/rest/v2/all";
$json = file_get_contents($url);
$json_data = json_decode($json, true);
echo "<h3>Select Country in dropdown</h3>";
echo "<select name='country' id='cont'><option value='' selected='' disabled='' hidden=''>Country</option>";
foreach($json_data as $key => $value){
    echo "<option value='" . $value["alpha2Code"]. "'>" . $value["name"] . "</option>";
}
  echo "</select>";
?>

<hr style='border-top:1px solid #f4f4f4'>

  ?> 
<?php
if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
// cuenta el numero de elementos seleccionados
$checked_count = count($_POST['check_list']);
echo "elementos seleccionados ".$checked_count."<br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected) {
echo "<p>".$selected ."</p>";
}
echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
}
else{
echo "<b>Please Select Atleast One Option.</b>";
}
}
?>

<?php 
function post($data){
$data= htmlspecialchars(trim($_POST["$data"]));
return $data;
}
?>
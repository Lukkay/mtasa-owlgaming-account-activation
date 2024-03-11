<?php 
if(isset($_GET['page'])) {
    switch($_GET['page']) {
        default: include("pages/activate.php"); break;
    }
} else {
    include("pages/activate.php"); 
}
?>
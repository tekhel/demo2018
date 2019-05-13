<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!isset($_SESSION['admin'])){
    ?>
<meta http-equiv="refresh": Content="1;url=../index.php"/>
<?php
exit();
}
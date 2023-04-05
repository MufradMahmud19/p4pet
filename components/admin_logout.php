<?php

   include 'connect.php';

   setcookie('vet_id', '', time() - 1, '/');

   header('location:../admin/login.php');

?>
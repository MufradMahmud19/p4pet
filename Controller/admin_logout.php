<?php

   include 'connect.php';

   setcookie('tutor_id', '', time() - 1, '/');

   header('location:../Model/admin/login.php');

?>
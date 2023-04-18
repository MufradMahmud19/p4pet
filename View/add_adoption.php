<?php

include '../Controller/components/connect.php';


if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
  
}

if(isset($_POST['submit'])){

   if($user_id != ''){

      $id = unique_id();

      $description = $_POST['description'];
      $description = filter_var($description, FILTER_SANITIZE_STRING);
      
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../Model/uploaded_files/'.$rename;


      $add_adoption = $conn->prepare("INSERT INTO `adoptions` (id,  user_id, description, image) VALUES(?,?,?,?)");
      $add_adoption->execute([$id, $user_id, $description, $rename]);
      
         move_uploaded_file($image_tmp_name, $image_folder);

      $message[] = 'Adoption added!';

      }else{
      $message[] = 'Please login first!';
   }

   

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>add adoption</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

   <?php include '../Controller/components/user_header.php'; ?>
   

<!-- add adoption section starts  -->

<section class="account-form">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>post your adoption</h3>

      <p class="placeholder">Adoption description</p>
      <textarea name="description" class="box" placeholder="enter adoption description" maxlength="1000" cols="30" rows="10">Animal's Current Condition:

      ; Contact Number:
      ; Email:
      ; Address:</textarea>
      <p class="placeholder">Image: <span>*</span></p>
      <input type="file" name="image" accept="image/*" required class="box">
      <input type="submit" value="submit adoption" name="submit" class="btn">
      <a href="../View/adoption.php#rev" class="option-btn">go back</a>
   </form>

</section>

<!-- add adoption section ends -->

<?php include '../Controller/components/footer.php'; ?>


<!-- custom js file link  -->
<script src="../View/js/script.js"></script>


</body>
</html>
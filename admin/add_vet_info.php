<?php

include '../components/connect.php';

if(isset($_COOKIE['vet_id'])){
   $vet_id = $_COOKIE['vet_id'];
}else{
   $vet_id = '';
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $id = unique_id();
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $add_vet_info = $conn->prepare("INSERT INTO `vet_info`(id, vet_id, title, description, thumb, status) VALUES(?,?,?,?,?,?)");
   $add_vet_info->execute([$id, $vet_id, $title, $description, $rename, $status]);

   move_uploaded_file($image_tmp_name, $image_folder);

   $message[] = 'new vet_info created!';  

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add vet_info</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="vet_info-form">

   <h1 class="heading">create vet_info</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <p>Vet qualification status<span>*</span></p>
      <select name="status" class="box" required>
         <option value="" selected disabled>-- select status</option>
         <option value="certified">certified</option>
         <option value="intern">intern</option>
      </select>
      <p>Vet Hospital name<span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="enter hospital name" class="box">
      <p>Vet Information<span>*</span></p>
      <textarea name="description" class="box" required placeholder="write important informations" maxlength="1000" cols="30" rows="10"></textarea>
      <p>Vet Certificate (only for certified vets)<span></span></p>
      <input type="file" name="image" accept="image/*" class="box">
      <input type="submit" value="create vet_info" name="submit" class="btn">
   </form>

</section>















<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>


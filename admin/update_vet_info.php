<?php

include '../components/connect.php';

if(isset($_COOKIE['vet_id'])){
   $vet_id = $_COOKIE['vet_id'];
}else{
   $vet_id = '';
   header('location:login.php');
}

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:vet_info.php');
}

if(isset($_POST['submit'])){

   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);

   $update_vet_info = $conn->prepare("UPDATE `vet_info` SET title = ?, description = ?, status = ? WHERE id = ?");
   $update_vet_info->execute([$title, $description, $status, $get_id]);

   $old_image = $_POST['old_image'];
   $old_image = filter_var($old_image, FILTER_SANITIZE_STRING);
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $update_image = $conn->prepare("UPDATE `vet_info` SET thumb = ? WHERE id = ?");
         $update_image->execute([$rename, $get_id]);
         move_uploaded_file($image_tmp_name, $image_folder);
         if($old_image != '' AND $old_image != $rename){
            unlink('../uploaded_files/'.$old_image);
         }
      }
   } 

   $message[] = 'vet_info updated!';  

}

if(isset($_POST['delete'])){
   $delete_id = $_POST['vet_info_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);
   $delete_vet_info_thumb = $conn->prepare("SELECT * FROM `vet_info` WHERE id = ? LIMIT 1");
   $delete_vet_info_thumb->execute([$delete_id]);
   $fetch_thumb = $delete_vet_info_thumb->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_files/'.$fetch_thumb['thumb']);
   $delete_bookmark = $conn->prepare("DELETE FROM `bookmark` WHERE vet_info_id = ?");
   $delete_bookmark->execute([$delete_id]);
   $delete_vet_info = $conn->prepare("DELETE FROM `vet_info` WHERE id = ?");
   $delete_vet_info->execute([$delete_id]);
   header('location:vet_infos.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update vet_info</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="vet_info-form">

   <h1 class="heading">update vet_info</h1>

   <?php
         $select_vet_info = $conn->prepare("SELECT * FROM `vet_info` WHERE id = ?");
         $select_vet_info->execute([$get_id]);
         if($select_vet_info->rowCount() > 0){
         while($fetch_vet_info = $select_vet_info->fetch(PDO::FETCH_ASSOC)){
            $vet_info_id = $fetch_vet_info['id'];
      ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="old_image" value="<?= $fetch_vet_info['thumb']; ?>">
      <p>vet_info status <span>*</span></p>
      <select name="status" class="box" required>
         <option value="<?= $fetch_vet_info['status']; ?>" selected><?= $fetch_vet_info['status']; ?></option>
         <option value="certified">certified</option>
         <option value="intern">intern</option>
      </select>
      <p>vet_info title <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="enter vet_info title" value="<?= $fetch_vet_info['title']; ?>" class="box">
      <p>vet_info description <span>*</span></p>
      <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30" rows="10"><?= $fetch_vet_info['description']; ?></textarea>
      <p>vet_info thumbnail <span>*</span></p>
      <div class="thumb">
         <img src="../uploaded_files/<?= $fetch_vet_info['thumb']; ?>" alt="">
      </div>
      <input type="file" name="image" accept="image/*" class="box">
      <input type="submit" value="update vet_info" name="submit" class="btn">
      <div class="flex-btn">
         <input type="submit" value="delete" class="delete-btn" onclick="return confirm('delete this vet_info?');" name="delete">
         <a href="view_vet_info.php?get_id=<?= $vet_info_id; ?>" class="option-btn">view vet_info</a>
      </div>
   </form>
   <?php
      } 
   }else{
      echo '<p class="empty">no vet_info added yet!</p>';
   }
   ?>

</section>















<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>


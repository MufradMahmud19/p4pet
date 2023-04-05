<?php

include '../components/connect.php';

if(isset($_COOKIE['vet_id'])){
   $vet_id = $_COOKIE['vet_id'];
}else{
   $vet_id = '';
   header('location:login.php');
}

if(isset($_POST['delete'])){
   $delete_id = $_POST['vet_info_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_vet_info = $conn->prepare("SELECT * FROM `vet_info` WHERE id = ? AND vet_id = ? LIMIT 1");
   $verify_vet_info->execute([$delete_id, $vet_id]);

   if($verify_vet_info->rowCount() > 0){

   

   $delete_vet_info_thumb = $conn->prepare("SELECT * FROM `vet_info` WHERE id = ? LIMIT 1");
   $delete_vet_info_thumb->execute([$delete_id]);
   $fetch_thumb = $delete_vet_info_thumb->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_files/'.$fetch_thumb['thumb']);
   $delete_vet_info = $conn->prepare("DELETE FROM `vet_info` WHERE id = ?");
   $delete_vet_info->execute([$delete_id]);
   $message[] = 'vet_info deleted!';
   }else{
      $message[] = 'vet_info already deleted!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>vet_infos</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="vet_infos">

   <h1 class="heading">added vet_infos</h1>

   <div class="box-container">
   
      <div class="box" style="text-align: center;">
         <h3 class="title" style="margin-bottom: .5rem;">create new vet_info</h3>
         <a href="add_vet_info.php" class="btn">add vet_info</a>
      </div>

      <?php
         $select_vet_info = $conn->prepare("SELECT * FROM `vet_info` WHERE vet_id = ? ");
         $select_vet_info->execute([$vet_id]);
         if($select_vet_info->rowCount() > 0){
         while($fetch_vet_info = $select_vet_info->fetch(PDO::FETCH_ASSOC)){
            $vet_info_id = $fetch_vet_info['id'];
      ?>
      <div class="box">
         <div class="flex">
            <div><i class="fas fa-circle-dot" style="<?php if($fetch_vet_info['status'] == 'certified'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"></i><span style="<?php if($fetch_vet_info['status'] == 'certified'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"><?= $fetch_vet_info['status']; ?></span></div>
         </div>
         <div class="thumb">
            <img src="../uploaded_files/<?= $fetch_vet_info['thumb']; ?>" alt="">
         </div>
         <h3 class="title"><?= $fetch_vet_info['title']; ?></h3>
         <p class="description"><?= $fetch_vet_info['description']; ?></p>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="vet_info_id" value="<?= $vet_info_id; ?>">
            <a href="update_vet_info.php?get_id=<?= $vet_info_id; ?>" class="option-btn">update</a>
            <input type="submit" value="delete" class="delete-btn" onclick="return confirm('delete this vet_info?');" name="delete">
         </form>
      </div>
      <?php
          }
      }else{
         echo '<p class="empty">no vet_info added yet!</p>';
      }
      ?>

   </div>

</section>













<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

<script>
   document.querySelectorAll('.vet_infos .box-container .box .description').forEach(content => {
      if(content.innerHTML.length > 100) content.innerHTML = content.innerHTML.slice(0, 100);
   });
</script>

</body>
</html>


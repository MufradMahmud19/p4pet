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

if(isset($_POST['delete_vet_info'])){
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
   header('locatin:vet_infos.php');
}

if(isset($_POST['delete_video'])){
   $delete_id = $_POST['video_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);
   $verify_video = $conn->prepare("SELECT * FROM `content` WHERE id = ? LIMIT 1");
   $verify_video->execute([$delete_id]);
   if($verify_video->rowCount() > 0){
      $delete_video_thumb = $conn->prepare("SELECT * FROM `content` WHERE id = ? LIMIT 1");
      $delete_video_thumb->execute([$delete_id]);
      $fetch_thumb = $delete_video_thumb->fetch(PDO::FETCH_ASSOC);
      unlink('../uploaded_files/'.$fetch_thumb['thumb']);
      $delete_video = $conn->prepare("SELECT * FROM `content` WHERE id = ? LIMIT 1");
      $delete_video->execute([$delete_id]);
      $fetch_video = $delete_video->fetch(PDO::FETCH_ASSOC);
      unlink('../uploaded_files/'.$fetch_video['video']);
      $delete_likes = $conn->prepare("DELETE FROM `likes` WHERE content_id = ?");
      $delete_likes->execute([$delete_id]);
      $delete_comments = $conn->prepare("DELETE FROM `comments` WHERE content_id = ?");
      $delete_comments->execute([$delete_id]);
      $delete_content = $conn->prepare("DELETE FROM `content` WHERE id = ?");
      $delete_content->execute([$delete_id]);
      $message[] = 'video deleted!';
   }else{
      $message[] = 'video already deleted!';
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>vet_info Details</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="vet_info-details">

   <h1 class="heading">vet_info details</h1>

   <?php
      $select_vet_info = $conn->prepare("SELECT * FROM `vet_info` WHERE id = ? AND vet_id = ?");
      $select_vet_info->execute([$get_id, $vet_id]);
      if($select_vet_info->rowCount() > 0){
         while($fetch_vet_info = $select_vet_info->fetch(PDO::FETCH_ASSOC)){
            $vet_info_id = $fetch_vet_info['id'];
            $count_videos = $conn->prepare("SELECT * FROM `content` WHERE vet_info_id = ?");
            $count_videos->execute([$vet_info_id]);
            $total_videos = $count_videos->rowCount();
   ?>
   <div class="row">
      <div class="thumb">
         <span><?= $total_videos; ?></span>
         <img src="../uploaded_files/<?= $fetch_vet_info['thumb']; ?>" alt="">
      </div>
      <div class="details">
         <h3 class="title"><?= $fetch_vet_info['title']; ?></h3>
         <div class="date"><i class="fas fa-calendar"></i><span><?= $fetch_vet_info['date']; ?></span></div>
         <div class="description"><?= $fetch_vet_info['description']; ?></div>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="vet_info_id" value="<?= $vet_info_id; ?>">
            <a href="update_vet_info.php?get_id=<?= $vet_info_id; ?>" class="option-btn">update vet_info</a>
            <input type="submit" value="delete vet_info" class="delete-btn" onclick="return confirm('delete this vet_info?');" name="delete">
         </form>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no vet_info found!</p>';
      }
   ?>

</section>

<section class="contents">

   <h1 class="heading">vet_info videos</h1>

   <div class="box-container">

   <?php
      $select_videos = $conn->prepare("SELECT * FROM `content` WHERE vet_id = ? AND vet_info_id = ?");
      $select_videos->execute([$vet_id, $vet_info_id]);
      if($select_videos->rowCount() > 0){
         while($fecth_videos = $select_videos->fetch(PDO::FETCH_ASSOC)){ 
            $video_id = $fecth_videos['id'];
   ?>
      <div class="box">
         <div class="flex">
            <div><i class="fas fa-dot-circle" style="<?php if($fecth_videos['status'] == 'active'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"></i><span style="<?php if($fecth_videos['status'] == 'active'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"><?= $fecth_videos['status']; ?></span></div>
            <div><i class="fas fa-calendar"></i><span><?= $fecth_videos['date']; ?></span></div>
         </div>
         <img src="../uploaded_files/<?= $fecth_videos['thumb']; ?>" class="thumb" alt="">
         <h3 class="title"><?= $fecth_videos['title']; ?></h3>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="video_id" value="<?= $video_id; ?>">
            <a href="update_content.php?get_id=<?= $video_id; ?>" class="option-btn">update</a>
            <input type="submit" value="delete" class="delete-btn" onclick="return confirm('delete this video?');" name="delete_video">
         </form>
         <a href="view_content.php?get_id=<?= $video_id; ?>" class="btn">watch video</a>
      </div>
   <?php
         }
      }else{
         echo '<p class="empty">no videos added yet! <a href="add_content.php" class="btn" style="margin-top: 1.5rem;">add videos</a></p>';
      }
   ?>

   </div>

</section>















<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>


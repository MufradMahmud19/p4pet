<!DOCTYPE html>
<html>
<head>
  <title>P4Pet</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="images/logo.png">

<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style type="text/css">
  body {
  font-family: Arial, Helvetica, sans-serif;
   margin: 0;
  padding: 0;

}
html::-webkit-scrollbar {
  width: 1rem;
}

html::-webkit-scrollbar-track {
  background: transparent;
}

html::-webkit-scrollbar-thumb {
  background: purple;
}

header{

}
section {
  padding: 5rem 10%;
}

.navbar-light .navbar-nav .nav-link{
  color: white;
  font-size: 18px;
  text-decoration: none;
  text-align: center;
  padding: 10px 10px;
}

.navbar-light .navbar-nav .nav-item a:hover{
   font-weight: bold;
  color: purple;
}
.navbar-light .navbar-brand{
  font-size: 30px;
  text-align: center;
  padding: 10px 10px;
  color: purple;
}
.navbar
{
    border: 1px solid #ccc;
}
.bg-dark{
  background-color: #330033 !important;
}
.home {
  padding: 0px;
}
.home .slide {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
    -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  height: 60rem;
  background-size: cover !important;
  background-position: center !important;
}
.home .slide .content {
  width: 50rem;
  padding: 50px 5px;
}
.home .slide .content .bttn{
  display: inline-block;
  margin-top: 1rem;
  padding: 1rem 3rem;
  font-size: 1.8rem;
  color: white;
  cursor: pointer;
  text-transform: capitalize;
  background-color: #4d004d;
}
.home .slide .content h3 {
  font-size: 5rem;
  text-transform: capitalize;
  color: #444;
  color: #fff;
}
.home .slide .content a{
  text-decoration: none;
}
.home .slide .content p {
  font-size: 1.6rem;
  line-height: 2;
  color: #777;
  color: #eee;
  padding: 1rem 0;
}

.swiper-pagination-bullet-active {
  background: purple;
}
.btn {
  display: inline-block;
  margin-top: 1rem;
  padding: 1rem 3rem;
  font-size: 1.8rem;
  border: 0.1rem solid purple;
  background: #cc99ff;
  color: white;
  cursor: pointer;
  text-transform: capitalize;
}

.btn:hover {
  background: purple;
  color: white;
}


.home {
  padding: 0px;
}
.home .slide {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
    -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  height: 60rem;
  background-size: cover !important;
  background-position: center !important;

}

.home .slide .content {
  width: 50rem;
  padding: 50px 5px;
}
.home .slide .content .bttn{
  display: inline-block;
  margin-top: 1rem;
  padding: 1rem 3rem;
  font-size: 1.8rem;
  color: white;
  cursor: pointer;
  text-transform: capitalize;
  background-color: #4d004d;
}
.home .slide .content h3 {
  font-size: 5rem;
  text-transform: capitalize;
  color: #444;
  color: #fff;
}
.home .slide .content a{
  text-decoration: none;
}
.home .slide .content p {
  font-size: 1.6rem;
  line-height: 2;
  color: #777;
  color: #eee;
  padding: 1rem 0;
}

.swiper-pagination-bullet-active {
  background: purple;
}
.btn {
  display: inline-block;
  margin-top: 1rem;
  padding: 1rem 3rem;
  font-size: 1.8rem;
  border: 0.1rem solid purple;
  background: #cc99ff;
  color: white;
  cursor: pointer;
  text-transform: capitalize;
}

.btn:hover {
  background: purple;
  color: white;
}
.subjects .box-container {
  display: -ms-grid;
  display: grid;
  -ms-grid-columns: (minmax(10rem, 1fr))[auto-fit];
  grid-template-columns: repeat(auto-fit, minmax(10rem, 1fr));
  gap: 2rem;
  padding: 10px 10px;
}
.subjects{
  text-align: center;
  padding: 40px 40px;
}
.subjects .box-container .box {
  padding: 3rem 2rem;
  text-align: center;
  border: 0.1rem solid purple;
  background: #cc99ff;
  cursor: pointer;
}

.subjects .box-container .box:hover {
  background: purple;
}

.subjects .box-container .box:hover h3 {
  color: #fff;
}

.subjects .box-container .box:hover p {
  color: #eee;
}

.subjects .box-container .box img {
  height: 10rem;
  margin-bottom: .7rem;
}

.subjects .box-container .box h3 {
  font-size: 1.7rem;
  text-transform: capitalize;
  color: #444;
  padding: .5rem 0;
}

.subjects .box-container .box p {
  font-size: 1.5rem;
  line-height: 2;
  color: #777;
}

.home-courses .slide {
  text-align: center;
  position: relative;
  background:  black;
  overflow: hidden;
}

.home-courses .slide:hover .content {
  bottom: 0;
}

.home-courses .slide .image {
  padding: 2rem;
}

.home-courses .slide .image img {
  width: 100%;
  margin-bottom: 1.5rem;
}

.home-courses .slide .image h3 {
  font-size: 2rem;
  text-transform: capitalize;
  color: #444;
}

.home-courses .slide .content {
  position: absolute;
  bottom: -100%;
  right: 0;
  left: 0;
  background: #330033; //darkpurple
  padding: 2rem 3rem;
}

.home-courses .slide .content h3 {
  font-size: 2rem;
  text-transform: capitalize;
  color: #444;
  color: #fff;
}

.home-courses .slide .content p {
  padding: 1rem 0;
  font-size: 1.5rem;
  line-height: 2;
  color: #777;
  color: #eee;
}

.home-courses .slide .content .btn:hover {
  background: #444;
}
#rcorners1 {
  border-radius: 25px;
  border: 2px solid purple;
  padding: 20px 50px; 
  width: max;
  height: 150px;  
}

.footer{
   background-color: #cc99ff;
   text-align: center;
   padding: 15px 10px;

}
.footer .share a{
   margin: 0 .3rem;
   height: 4.5rem;
   width: 5.5rem;
   line-height: 4.5rem;
   border-radius: 50%;
   font-size: 2rem;
   color: white;
   background-color: black;
   text-decoration: none;
}

.footer .share a:hover{
   background-color: purple;
}

.footer .credit{
   margin-top: 2.5rem;
   padding:1.5rem;
   padding-top: 2.5rem;
   border-top: .1rem solid black;
   font-size: 2rem;
   color:black;
}
</style>
</head>

<body>

<header>
 <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent fixed-top">
 <div class="container">
    <a class="navbar-brand" href="home.php"><i class='fa fa-paw'style='font-size:24px; color:purple;'></i> P4Pet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"  aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="food.php">Food</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#footer">Adoption</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="review.php">Medical</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quiz.php">Fun Quiz</a>
        </li>
            <li class="nav-item">
          <a class="nav-link" href="#footer">Contact</a>
        </li>
      </ul>
    </div>
 </div>
</nav>

</header>
 


<section class="home">

   <div class="swiper home-slider">
      
      <div class="swiper-wrapper">

         <section class="swiper-slide slide" style="background: url(images/cat_cover_1.jpg) no-repeat;">
            <div class="content">
               <h3>Your Pet's Helping Hand!</h3>
               <h2 style="color: white;">“Time spent with cats is never wasted.” – Sigmund Freud</h2>
               <p></p>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(images/dog_cover_1.jpg) no-repeat;">
            <div class="content">
               <h3>Your Pet's Helping Hand!</h3>
               <h2 style="color: white;">“A dog is the only thing on earth that loves you more than you love yourself.” – Josh Billings</h2>
               <p></p>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(images/bird_cover_1.jpg) no-repeat;">
            <div class="content">
               <h3>Your Pet's Helping Hand!</h3>
               <h2 style="color: white;">"In order to see birds, it is necessary to become a part of the silence." - Robert Lynd</h2>
               <p></p>
                
            </div> 
         </section>

         <section class="swiper-slide slide" style="background: url(images/rabbit_cover_1.jpg) no-repeat;">
            <div class="content">
               <h3 style="color: black;">Your Pet's Helping Hand!</h3>
               <h2 style="color: black;">"The way rabbits live makes more sense to me than the way people live." - Marty Rubin</h2>
               <p></p>
                
            </div>
         </section>


      </div>

      <div class="swiper-pagination"></div>

   </div>
 </section>
 <br> 

<section class="subjects">

   <h1 class="heading">Why Choose P4pet?</h1> <br><br>

   <div class="box-container">

      <div class="box">
         <img src="images/vet_icon_1.png" alt="">
         <h3>Medical inquiry</h3>
         <p>Medical related queries and vet schedules.</p>
      </div>

      <div class="box">
         <img src="images/food_icon_1.png" alt="">
         <h3>Pet food informations</h3>
         <p>Pet wise food related informations.</p>
      </div>

      <div class="box">
         <img src="images/breed_icon_1.png" alt="">
         <h3>Breed related information</h3>
         <p>Questionnaries related pet breeds.</p>
      </div>

      <div class="box">
         <img src="images/adoption_1.png" alt="">
         <h3>Adoption</h3>
         <p>Adoption related posts.</p>
      </div>

   </div>

</section>
<br> <br> <br>

<center><h1 class="heading">Working Process</h1></center>
<p id="rcorners1">◩ We collect strays which of them look sick and not in good shape.<br>🗹 We medicate them and take care of them.<br>🗹 We make them fit for adoption.<br>🗹 We edequetly verify their food habit through our own processes.<br>⊞ We post their availability and every other information.<br>▣ We always encourage to help the poor sweet beings of the earth as much as possible.</p>

<br><br><br>
  
<footer class="footer" id="footer">

   <section>

      <div class="share">
         <a href="#" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-twitter"></a>
         <a href="#" class="fab fa-linkedin"></a>
         <a href="#" class="fab fa-envelope"></a>
      </div>
      <div class="credit">Contact Us</div>
   </section>

</footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
var nav = document.querySelector('nav');

    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 100) {
        nav.classList.add('bg-dark', 'shadow');
      } else {
        nav.classList.remove('bg-dark');
      }
    });

var swiper = new Swiper(".home-slider", {
  pagination: {
    el: ".swiper-pagination",
    clickable:true,
  },
  loop:true,
  grabCursor:true,
});
var swiper = new Swiper(".home-courses-slider", {
  loop:true,
  grabCursor:true,
  spaceBetween: 20,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
  },
});
</script>


</body>
</html>
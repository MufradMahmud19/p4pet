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
  color: black;
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
  background-color: white !important;
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

/* CSS for Categories */
.categories{
    padding: 4% 0;
}

.box-3{
    width: 20%;
    float: left;
    margin: 2%;
}


/* CSS for Food Menu */
.food-menu{
    background-color: #ececec;
    padding: 4% 0;
}
.food-menu-box{
    width: 43%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: white;
    border-radius: 15px;
}

.food-menu-img{
    width: 20%;
    float: left;
}

.food-menu-desc{
    width: 70%;
    float: left;
    margin-left: 8%;
}

.food-price{
    font-size: 1.2rem;
    margin: 2% 0;
}
.food-detail{
    font-size: 1rem;
    color: #747d8c;
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
          <a class="nav-link" href="index.php">Contact</a>
        </li>
      </ul>
    </div>
 </div>
</nav>

</header>
 


<!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container"> <br><br><br><br><br><br>
            <h2 class="text-center">Explore PET FOODS</h2>

            <a href="#cat">
            <div class="box-3 float-container">
                <img src="images/food_cat_1.png"  class="img-responsive img-curve">

                <h3 class="float-text text-black">Cat</h3>
            </div>
            </a>

            <a href="#dog">
            <div class="box-3 float-container">
                <img src="images/food_dog_1.png" class="img-responsive img-curve">

                <h3 class="float-text text-black">Dog</h3>
            </div>
            </a>

            <a href="#bird">
            <div class="box-3 float-container">
                <img src="images/food_bird_1.png" class="img-responsive img-curve">

                <h3 class="float-text text-black">Bird</h3>
            </div>
            </a>

            <a href="#rabbit">
            <div class="box-3 float-container">
                <img src="images/food_rabbit_1.png" class="img-responsive img-curve">

                <h3 class="float-text text-black">Rabbit</h3>
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <section id="cat">
          <div class="container">
            <h2 class="text-center">Cat Menu</h2>
            
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/cat_food_1.jfif" alt="Versele Laga Lara Junior Cat Food Chicken" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Versele Laga Lara Junior Cat Food Chicken (1kg)</h4>
                    <p class="food-price">৳ 430</p>
                    <p class="food-detail">
                        With Lara Junior's crispy chunks, your naughty kitten will visibly enjoy the delicious flavour of chicken. The chunks are well balanced and contain all the necessary minerals and vitamins to make your kitten grow into a mature and healthy cat.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/cat_food_2.jfif" alt="Drools Cat Food Mackerel Flavour" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Drools Cat Food Mackerel Flavour (3kg)</h4>
                    <p class="food-price">৳ 950</p>
                    <p class="food-detail">
                        A complete meal to fulfill the high nutritional requirements in adult cats. It consists of essential vitamins and minerals to support good urinary health. Taurine keeps heart healthy and improves eyesight.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/cat_food_3.jfif" alt="Me-O Meo Creamy Treats Salmon Flavor" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Me-O Meo Creamy Treats Salmon Flavor (4*15gm)</h4>
                    <p class="food-price">৳ 220</p>
                    <p class="food-detail">
                        An Absolute Mouth Watering Treat for Your Kitty. Meo Creamy Treat provides plaque protection and ensures fresh breath. Collagen Care Formula ensures healthy skin and beautiful fur. Included Prebiotics ensures good digestion and Glucosamine ensures good joints.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="clearfix"></div>  
        </section>

        <section id="dog">
          <div class="container">
            <h2 class="text-center">Dog Menu</h2>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dog_food_1.jfif" alt="Spectrum Derm26 Hypoallergenic Dog Food" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Spectrum Derm26 Hypoallergenic Dog Food (1kg)</h4>
                    <p class="food-price">৳ 600</p>
                    <p class="food-detail">
                        An especially formulated complete and balanced ultra-premium food to meet the nutritional requirements of hair coating and skin sensitive dogs aged from 10 months to 8 years.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dog_food_2.jfif" alt="Drools Adult Dog Food Chicken And Egg" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Drools Adult Dog Food Chicken And Egg (1kg)</h4>
                    <p class="food-price">৳ 330</p>
                    <p class="food-detail">
                        These kibbles contain a balanced ratio of protein and fat which your pet needs in his diet. It is highly palatable and is easily digestible. This pet food contains 100% real chicken meat, to boost your pet's appetite.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dog_food_3.jfif" alt="Smart Heart Adult Dog Wet Food Chicken" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Smart Heart Adult Dog Wet Food Chicken (400gm)</h4>
                    <p class="food-price">৳ 155</p>
                    <p class="food-detail">
                        Formulated to meet adult dog's requirements using the best quality ingredients and supplemented with fish oil (rich in DHA and Omega-3 fatty acid) and Lecithin (rich in Choline) to help enhance brain and nervous system function and promote heart health.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dog_food_4.jpg" alt="Pedigree pouch with Turkey" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Pedigree pouch with Turkey (100gm)</h4>
                    <p class="food-price">৳ 110</p>
                    <p class="food-detail">
                        100% complete and balanced, Pedigree wet dog food is not only nutritious but also makes for highly enjoyable everyday dog pouch meals that will bring out their infectious enthusiasm. It contains all the essential nutrients to support optimal digestion, a healthy skin and coat, strong natural defences and healthy bones.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="clearfix"></div>  
        </section>

        <section id="bird">
          <div class="container">
            <h2 class="text-center">Bird Menu</h2>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/bird_food_1.jfif" alt="SmartHeart Mynah Bird Food Talkative and Brain Nourishing" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>SmartHeart Mynah Bird Food Talkative and Brain Nourishing (400gm)</h4>
                    <p class="food-price">৳ 200</p>
                    <p class="food-detail">
                        Loaded with natural ingredients such as Dried Fruits and Vegetable (Dried papaya, Dried pineapple, Dried apple, Dried banana, Dehydrated tomato), Chili powder, Ginger powder, Kariyat herb, Dried Egg Yolk, Orange Juice and Omega-3 fatty acid to strengthen your bird’s overall health, wellbeing and provided variety for your bird’s pleasure and enjoyment.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/bird_food_4.jpg" alt="Black-oil Sunflower" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Black-oil Sunflower (100ml)</h4>
                    <p class="food-price">৳ 510</p>
                    <p class="food-detail">
                        Oil sunflower is the most popular type of seed in the shell and is devoured by almost all birds. Birds like Cardinals, Jays, Woodpeckers, Nuthatches, Titmice, Chickadees, Grosbeaks, Finches, Nutcrackers, Juncos, House Sparrows, Blackbirds, Doves & Grackles are attracted to black-oil sunflower seeds. It got a higher oil content, 40% fat, 16% protein, 20% carbohydrates.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/bird_food_2.jfif" alt="Primus Premium Food Lovebird" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Primus Premium Food Lovebird (1kg)</h4>
                    <p class="food-price">৳ 250</p>
                    <p class="food-detail">
                        A balanced and complete food for all kind of lovebirds. This mixture has been carefully composed with the tastiest ingredients. Balanced and Full-premium food for all kinds of lovebirds. Feed is specially designed to suit the characteristics and taste preferences lovebirds, it's membership includes all the necessary components and to prevent nutritional deficiencies.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/bird_food_3.jfif" alt="Benelux Primus Mixture for Budgies" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Benelux Primus Mixture for Budgies (1kg)</h4>
                    <p class="food-price">৳ 250</p>
                    <p class="food-detail">
                        Specifically developed to provide complete and balanced nutrition. This Enhanced Immunity & Shiny Feather will strengthen your bird’s immune system and intensify the feather’s radiant color.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>



            <div class="clearfix"></div>  
        </section>

        <section id="rabbit">
          <div class="container">
            <h2 class="text-center">Rabbit Menu</h2>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/r_food_1.jfif" alt="SmartHeart Rabbit Food Junior" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>SmartHeart Rabbit Food Junior (1kg)</h4>
                    <p class="food-price">৳ 300</p>
                    <p class="food-detail">
                         Specifically developed to provide complete and balanced nutrition in young rabbits, pregnant and lactating does for optimum growth, strong bones, teeth and healthy skin and coat.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/r_food_2.jfif" alt="COMPLETE CUNI ADULT Rabbit Food" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>COMPLETE CUNI ADULT Rabbit Food (1kg)</h4>
                    <p class="food-price">৳ 500</p>
                    <p class="food-detail">
                         An all-in-one pellet that selectively prevents eating behaviour in such a way that all essential nutrients are definitely eaten. In addition, it is a grain-free diet with long fibers such as Timothy. Tailored to the nutritional needs of an adult rabbit.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/r_food_3.jfif" alt="SMARTHEART BRITER BUNNY" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>SMARTHEART BRITER BUNNY (1KG)</h4>
                    <p class="food-price">৳ 300</p>
                    <p class="food-detail">
                         Nutritionally complete formulated pellet food for your most endearing pet rabbit. Briter Bunny is a high value and convenient food full of nutritional quality meeting yours bunny needs.Fresh as natural food because it is full of vitamins and minerals found in plants and vegetables responsible for healthy, fresh, bright and lively rabbits that you love.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="clearfix"></div>  
        </section>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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
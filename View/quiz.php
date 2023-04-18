<?php

include '../Controller/components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="../View/css/style.css">

   <style type="text/css">
     
      img{
    width: 5.5rem;
    height: 5.2rem;
    border-radius: 50%;
}
.img{
    position: fixed;
}
.title{
    text-align: center;
    padding: 10px 10px;
    font-size: 40px;
    color: rgb(49,70,7);
    background: rgba(105,224,90,0.55);
    font-family: Georgia, 'Times New Roman', Times, serif;
}
.questions{
    margin: 3rem auto;
    width: 90vw;
    padding: 2rem;
    background: rgba(0,255,221,0.45);
    cursor: default;
    border-radius: 1rem;
}
.question{
    margin-bottom: 1rem;
}
.option{
    margin-bottom: 0.5rem;
    font-size: 1.2rem;
    border-bottom: solid 0.1rem blue;
    width: 15rem;
    background: lightblue;
    border-radius: 1rem;

}
.option:hover{
    color: white;
}
ol{
    position:  relative;
    padding: 0 0.5rem;
    color: rgb(1,73,73);
}
.option span{
    display: block;
    padding: 0.1rem 0.7rem;
    border-radius: 1rem;
}
.stat{
    margin-top: 1.5rem;
    color: rgb(6,17,168);
}
.buttons{
    text-align: center;
}
button{
    padding: 0.2rem 1.5rem;
    border: none;
    outline: none;
    font-size: 1.5rem;
    border-radius: 1.5rem;
    color: rgba(93,53,156,0.98);
    background: rgba(161,177,19,0.82);
}
button:active{
    background: lavender;
}
.scoreboard,.answerBank{
    width: 20rem;
    background: rgba(230,230,250,0.77);
    padding: 2rem;
    text-align: center;
    margin: auto;
    position: relative;
    top: 5rem;
    display: none;
}
.score-title{
    margin: 1rem 0;
}
.score-btn,.check-answer{
    margin-top: 1rem;
}
.score{
    font-size: 2.5rem;
}
.answerBank li{
    text-align: left;
    margin-bottom: 0.2rem;
    font-size: larger;
}
.answers{
    margin-top: 1rem;
}
   </style>

</head>
<body>

<?php include '../Controller/components/user_header.php'; ?>

<section class="quiz" style="background-color: white;">

   <div >
        <a href="../View/home.php"><img src="../Controller/images/logo.png" alt="img" id="img" class="img"></a>
    <h1 class="title">Today's Quiz</h1>
    </div>
   <div>
        <div class="col md 12 col sm 12">
        <div id="quiz-container" style="font-size:1.5rem;">
        <!-- question container -->
        <div class="questions">
            <h2 class="question" id="question"></h2>
            <ol type="A">
                <li class="option" id="option"><span class="optn" id="option0" onclick="calcScore(this)"></span></li>
                <li class="option" id="option"><span class="optn" id="option1" onclick="calcScore(this)"></span></li>
                <li class="option" id="option"><span class="optn" id="option2" onclick="calcScore(this)"></span></li>
                <li class="option" id="option"><span class="optn"  id="option3" onclick="calcScore(this)"></span></li>
            </ol>
            <h4 class="start" id="stat"></h4>
        </div>

        <div class="buttons">
            <button type="button" class="next">Next</button>
        </div>

    </div>

    <!-- scoreboard section -->
    <div class="scoreboard" id="scoreboard">
        <a href="../View/home.php"><img src="../Controller/images/logo.png" alt=""></a>
        <h1 class="score-title" id="score-title"></h1>
        <h2 class="score" id="score"></h2>
        <button type="button" class="score-btn" id="score-btn" onclick="backToQuiz()">Back to Quiz</button>
        <button type="button" class="check-answer" id="check-answer" onclick="checkAnswer()">Check Answers</button>
    </div>

    <!-- answers section -->
    <div class="answerBank" id="answerBank">
        <h2>Answers :</h2>
        <ol type="1" class="answers" id="answers">

        </ol>
        <button type="button" class="score-btn" id="score-btn" onclick="backToQuiz()">Back to Quiz</button>
    </div>
    </div>

   </div>

   
</section>

<script>

        var nav = document.querySelector('nav');

    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 100) {
        nav.classList.add('bg-dark', 'shadow');
      } else {
        nav.classList.remove('bg-dark');
      }
    });

        var questionBank= [
    {
        question : 'How much better is the sense of smelling of dog than human?',
        option : ['60X','20X','40X','30X'],
        answer : '40X'
    },
    {
        question : 'What is the average life span of cats?',
        option : ['7 years','15 years','23 years','9 years'],
        answer : '15 years'
    },
    {
        question : 'A bunny’s big ears aren’t just for listening, what else it does?',
        option : ['Protection from other animals','Moves autonomously.','Creating waves for communication','Regulate body temperature'],
        answer : 'Regulate body temperature'
    },
    {
        question : 'What is a group of cats called??',
        option : ['Snippet','Clowder','Puppykiddles','Munchies'],
        answer : 'Clowder'
    },
    {
        question : 'Do birds got teeth?',
        option : ['Yes','No','Maybe','Undiscovered'],
        answer : 'No'
    },
    {
        question : 'What is the most commonly taught command for dogs?',
        option : ['Jump','Run','Sit','Bark'],
        answer : 'Sit'
    },
    {
        question : 'How do penguins sleep?',
        option : ['sitting','Lying Down','keeping back on the top','By bending down'],
        answer : 'Lying Down'
    },
    {
        question : 'When does rabbit purr?',
        option : ['when they are content','when they are hungry','when they are scared','when they are weak'],
        answer : 'when they are content'
    }
]

var question= document.getElementById('question');
var quizContainer= document.getElementById('quiz-container');
var scorecard= document.getElementById('scorecard');
var option0= document.getElementById('option0');
var option1= document.getElementById('option1');
var option2= document.getElementById('option2');
var option3= document.getElementById('option3');
var next= document.querySelector('.next');
var points= document.getElementById('score');
var optn= document.querySelectorAll('span');
var i=0;
var score= 0;

//function to display questions
function displayQuestion(){
    for(var a=0;a<optn.length;a++){
        optn[a].style.background='none';
    }
    question.innerHTML= 'Q.'+(i+1)+' '+questionBank[i].question;
    option0.innerHTML= questionBank[i].option[0];
    option1.innerHTML= questionBank[i].option[1];
    option2.innerHTML= questionBank[i].option[2];
    option3.innerHTML= questionBank[i].option[3];
    stat.innerHTML= "Question"+' '+(i+1)+' '+'of'+' '+questionBank.length;
}

//function to calculate scores
function calcScore(e){
    if(e.innerHTML===questionBank[i].answer && score<questionBank.length)
    {
        score= score+1;
        document.getElementById(e.id).style.background= 'limegreen';
    }
    else{
        document.getElementById(e.id).style.background= 'tomato';
    }
    setTimeout(nextQuestion,300);
}

//function to display next question
function nextQuestion(){
    if(i<questionBank.length-1)
    {
        i=i+1;
        displayQuestion();
    }
    else{
        points.innerHTML= score+ '/'+ questionBank.length;
        quizContainer.style.display= 'none';
        scoreboard.style.display= 'block'
    }
}

//click events to next button
next.addEventListener('click',nextQuestion);

//Back to Quiz button event
function backToQuiz(){
    location.reload();
}

//function to check Answers
function checkAnswer(){
    var answerBank= document.getElementById('answerBank');
    var answers= document.getElementById('answers');
    answerBank.style.display= 'block';
    scoreboard.style.display= 'none';
    for(var a=0;a<questionBank.length;a++)
    {
        var list= document.createElement('li');
        list.innerHTML= questionBank[a].answer;
        answers.appendChild(list);
    }
}

displayQuestion();


    </script>
   <br><br><br><br><br>
<!-- footer section starts  -->
<?php include '../Controller/components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="../View/js/script.js"></script>
   
</body>
</html>
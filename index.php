<?php
	include("trangchu.php");
	
	if(isset($_SESSION['user_name']) && isset($_COOKIE['account']))   {		
		$user = $_SESSION['user_name'];
		echo "<h1>Welcome  to Ghibli's database";
	}
	
?>
<style>
* {
  box-sizing: border-box;
}


.container {
  position: absolute;
  align: center;
}


.mySlides {
  display: none;
  
}


.cursor {
  cursor: pointer;
}


.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
 

  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}


.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}


.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}


.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}


.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}


.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

</style>
<body>
<div class="container">

<!-- Full-width images with number text -->
<div class="mySlides">
  <div class="numbertext">1 / 6</div>
	<img  src="images/bg1.jpg" style="width:100%" >
</div>

<div class="mySlides">
  <div class="numbertext">2 / 6</div>
	<img src="images/bg2.jpg" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">3 / 6</div>
	<img src="images/bg3.jpg" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">4 / 6</div>
	<img src="images/bg4.jpg" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">5 / 6</div>
	<img src="images/bg5.jpg" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">6 / 6</div>
	<img src="images/bg6.jpg" style="width:100%">
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

<!-- Image text -->
<div class="caption-container">
  <p id="caption"></p>
</div>

<!-- Thumbnail images -->
<div class="row">
  <div class="column">
	<img class="demo cursor" src="images/bg1.jpg" style="width:100%" onclick="currentSlide(1)" >
  </div>
  <div class="column">
	<img class="demo cursor" src="images/bg2.jpg" style="width:100%" onclick="currentSlide(2)" >
  </div>
  <div class="column">
	<img class="demo cursor" src="images/bg3.jpg" style="width:100%" onclick="currentSlide(3)" >
  </div>
  <div class="column">
	<img class="demo cursor" src="images/bg4.jpg" style="width:100%" onclick="currentSlide(4)" >
  </div>
  <div class="column">
	<img class="demo cursor" src="images/bg5.jpg" style="width:100%" onclick="currentSlide(5)" >
  </div>
  <div class="column">
	<img class="demo cursor" src="images/bg6.jpg" style="width:100%" onclick="currentSlide(6)" >
  </div>
</div>
</div>
</body>
<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<!doctype html>
<html lang="lt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>#Kalėdoskartu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	
	<script src="https://kit.fontawesome.com/c662d04950.js" crossorigin="anonymous"></script>
	</head>
<body>
<?php
    session_start();
    $ID=$_SESSION['vartotojo_duomenys_4_user'];
    $score=$_SESSION['antro_klausimyno_rezultatas'];

    if(array_key_exists('vartotojo_duomenys_4_user',$_SESSION) && !empty($_SESSION['vartotojo_duomenys_4_user'])) {
      require '/home/u848932438/domains/bkworks.lt/public_html/projektas/connections.php';
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        $sql = "SELECT Current_location FROM Users WHERE ID='$ID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $Location=$row['Current_location'];
        }
        }
        if($Location<2){
            header("Location:user?route");
        }
    }
    else{
        header("Location:log?object-3");
    }
?>

<style>
body{
font-family: "Poppins", sans-serif;
background-color: #eeeeee;
background-image: url('images/Back/background-2.jpg');

background-position: center center;
background-repeat:  no-repeat;
background-attachment: fixed;
background-size:  cover;
}
body, html {
height: 100%;
}

.div3{
  	border-radius: 5px;
	font-family: "Poppins", sans-serif;
	background-color: white;
	left: 25%;
	max-width: 60%;
	margin: 0 auto;
  	margin-bottom : 1%;
	padding : 1%;
	text-align: center;
	margin-top: 1%;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.quiz3{
  border-radius: 5px;
	font-family: "Poppins", sans-serif;
	background-color: white;
	left: 25%;
	max-width: 60%;
	margin: 0 auto;
  	margin-bottom : 1%;
	padding : 1%;
	text-align: center;
	margin-top: 1%;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.hint3{
  border-radius: 5px;
	font-family: "Poppins", sans-serif;
	background-color: white;
	left: 25%;
	max-width: 60%;
	margin: 0 auto;
  	margin-bottom : 1%;
	padding : 1%;
	text-align: center;
	margin-top: 1%;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

@-webkit-keyframes animation {
  from {
    opacity: 0;
    -webkit-transform: scale(1.2) rotateX(45deg);
    transform: scale(1.2) rotateX(45deg);
  }
  to {
  }
}

@-webkit-keyframes animation2 {
  from {
    opacity: 0;
    -webkit-transform: scale(1.2) rotateX(45deg);
    transform: scale(1.2) rotateX(45deg);
  }
  to {
  }
}

.slider div p {
  color: #1c1c1c;
  position: absolute;
  bottom: -65px;
  font-family: "Poppins", sans-serif;
  font-size: 22px;
}
.slider {
  -webkit-animation: animation ease 1s;
  animation-delay: 0.8s;
  animation-fill-mode: backwards;

  margin: 60px auto 0 auto;
  height: 360px;
  width: 240px;
  padding: 40px;
  top: 100px;

  perspective: 1000px;
  transition: ease-in-out 0.2s;
  /*-webkit-transform:rotateX(45deg);
             -webkit-transform-style:preserve-3d;
                 position:absolute;*/
}
/*.slider:active{ -webkit-transform:rotateZ(10deg);}*/

.slide img {
  text-align: center;
  width: 100%;
  height: 100%;
  -webkit-user-drag: none;
  user-drag: none;
  -moz-user-drag: none;
  border-radius: 2px;
}

.slide {
  -webkit-user-select: none;
  user-select: none;
  -moz-user-select: none;
  position: absolute;
  height: 400px;
  width: 400px;

  box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.3);
  background: #fcfcfc;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  text-align: center;
  /*overflow:hidden;*/
  border: 12px white solid;
  box-sizing: border-box;
  border-bottom: 55px white solid;
  border-radius: 5px;
}
.transition {
  -webkit-transition: cubic-bezier(0, 1.95, 0.49, 0.73) 0.4s;
  -moz-transition: cubic-bezier(0, 1.95, 0.49, 0.73) 0.4s;
  transition: cubic-bezier(0, 1.95, 0.49, 0.73) 0.4s;
}
.btn {
  width: 150px;
  background-color: #5995fd;
  border: none;
  outline: none;
  height: 49px;
  border-radius: 49px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 600;
  margin: 10px 0;
  cursor: pointer;
  transition: 0.5s;
  text-align: center;
  margin: 0 auto;
}

.btn:hover {
  background-color: #4d84e2;
}

@import url('https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&subset=greek-ext');

.text-center{
	color:#fff;	
	text-transform:uppercase;
    font-size: 23px;
    margin: -50px 0 80px 0;
    display: block;
    text-align: center;
}
.input-container{
	position:relative;
	margin-bottom:25px;
}
.input-container label{
	position:absolute;
	top:0px;
	left:0px;
	font-size:16px;
	color:#fff;	
    pointer-event:none;
	transition: all 0.5s ease-in-out;
}
.input-container input{ 
  border:0;
  border-bottom:1px solid #555;  
  background:transparent;
  width:100%;
  padding:8px 0 5px 0;
  font-size:16px;
  color:#fff;
}
.input-container input:focus{ 
 border:none;	
 outline:none;
 border-bottom:1px solid #e74c3c;	
}
.input-container input:focus ~ label,
.input-container input:valid ~ label{
	top:-12px;
	font-size:12px;
	
}



@media only screen and (max-width: 600px) {
  .slide{
    height: 250px;
    width: 250px;
  }
  .hint3, .quiz3, .div3{
    max-width:85%;
  }
}

</style>

<script>
$(document).ready(function(){
  var str = window.location.href;

  if(str.includes("?completed")){
  Swal.fire({
      icon: 'success',
        html:
      '<h4 style="font-family: "Lato", "Segoe Ui", -apple-system, BlinkMacSystemFont, sans-serif;">Sėkmingai atlikai #3 užduotį. Tavo rezultatas <?php echo $score; ?>/2</h4>' +
        '<br>' +
        '<p>Pamatei klaidą ar iškilo techninių bėdų, susiekite: <a style="color:dodgerblue; text-decoration:none;" href="mailto:pagalba@bkworks.lt"><strong> pagalba@bkworks.lt</strong></a></p>'
    })
  }
});
  
window.addEventListener("load", onWndLoad, false);

function onWndLoad() {
  var slider = document.querySelector(".slider");
  var sliders = slider.children;

  var initX = null;
  var transX = 0;
  var rotZ = 0;
  var transY = 0;

  var curSlide = null;

  var Z_DIS = 50;
  var Y_DIS = 10;
  var TRANS_DUR = 0.4;

  var images = document.querySelectorAll("img");
  for (var i = 0; i < images.length; i++) {
    images[i].onmousemove = function (e) {
      e.preventDefault();
    };
    images[i].ondragstart = function (e) {
      return false;
    };
  }

  function init() {
    var z = 0,
      y = 0;

    for (var i = sliders.length - 1; i >= 0; i--) {
      sliders[i].style.transform =
        "translateZ(" + z + "px) translateY(" + y + "px)";

      z -= Z_DIS;
      y += Y_DIS;
    }

    attachEvents(sliders[sliders.length - 1]);
  }
  function attachEvents(elem) {
    curSlide = elem;

    curSlide.addEventListener("mousedown", slideMouseDown, false);
    curSlide.addEventListener("touchstart", slideMouseDown, false);
  }
  init();
  function slideMouseDown(e) {
    if (e.touches) {
      initX = e.touches[0].clientX;
    } else {
      initX = e.pageX;
    }

    document.addEventListener("mousemove", slideMouseMove, false);
    document.addEventListener("touchmove", slideMouseMove, false);

    document.addEventListener("mouseup", slideMouseUp, false);
    document.addEventListener("touchend", slideMouseUp, false);
  }
  var prevSlide = null;

  function slideMouseMove(e) {
    var mouseX;

    if (e.touches) {
      mouseX = e.touches[0].clientX;
    } else {
      mouseX = e.pageX;
    }

    transX += mouseX - initX;
    rotZ = transX / 20;

    transY = -Math.abs(transX / 15);

    curSlide.style.transition = "none";
    curSlide.style.webkitTransform =
      "translateX(" +
      transX +
      "px)" +
      " rotateZ(" +
      rotZ +
      "deg)" +
      " translateY(" +
      transY +
      "px)";
    curSlide.style.transform =
      "translateX(" +
      transX +
      "px)" +
      " rotateZ(" +
      rotZ +
      "deg)" +
      " translateY(" +
      transY +
      "px)";
    var j = 1;
    //remains elements
    for (var i = sliders.length - 2; i >= 0; i--) {
      sliders[i].style.webkitTransform =
        "translateX(" +
        transX / (2 * j) +
        "px)" +
        " rotateZ(" +
        rotZ / (2 * j) +
        "deg)" +
        " translateY(" +
        Y_DIS * j +
        "px)" +
        " translateZ(" +
        -Z_DIS * j +
        "px)";
      sliders[i].style.transform =
        "translateX(" +
        transX / (2 * j) +
        "px)" +
        " rotateZ(" +
        rotZ / (2 * j) +
        "deg)" +
        " translateY(" +
        Y_DIS * j +
        "px)" +
        " translateZ(" +
        -Z_DIS * j +
        "px)";
      sliders[i].style.transition = "none";
      j++;
    }

    initX = mouseX;
    e.preventDefault();
    if (Math.abs(transX) >= curSlide.offsetWidth - 30) {
      document.removeEventListener("mousemove", slideMouseMove, false);
      document.removeEventListener("touchmove", slideMouseMove, false);
      curSlide.style.transition = "ease 0.2s";
      curSlide.style.opacity = 0;
      prevSlide = curSlide;
      attachEvents(sliders[sliders.length - 2]);
      slideMouseUp();
      setTimeout(function () {
        slider.insertBefore(prevSlide, slider.firstChild);

        prevSlide.style.transition = "none";
        prevSlide.style.opacity = "1";
        slideMouseUp();
      }, 201);

      return;
    }
  }
  function slideMouseUp() {
    transX = 0;
    rotZ = 0;
    transY = 0;

    curSlide.style.transition =
      "cubic-bezier(0,1.95,.49,.73) " + TRANS_DUR + "s";

    curSlide.style.webkitTransform =
      "translateX(" +
      transX +
      "px)" +
      "rotateZ(" +
      rotZ +
      "deg)" +
      " translateY(" +
      transY +
      "px)";
    curSlide.style.transform =
      "translateX(" +
      transX +
      "px)" +
      "rotateZ(" +
      rotZ +
      "deg)" +
      " translateY(" +
      transY +
      "px)";
    //remains elements
    var j = 1;
    for (var i = sliders.length - 2; i >= 0; i--) {
      sliders[i].style.transition =
        "cubic-bezier(0,1.95,.49,.73) " + TRANS_DUR / (j + 0.9) + "s";
      sliders[i].style.webkitTransform =
        "translateX(" +
        transX +
        "px)" +
        "rotateZ(" +
        rotZ +
        "deg)" +
        " translateY(" +
        Y_DIS * j +
        "px)" +
        " translateZ(" +
        -Z_DIS * j +
        "px)";
      sliders[i].style.transform =
        "translateX(" +
        transX +
        "px)" +
        "rotateZ(" +
        rotZ +
        "deg)" +
        " translateY(" +
        Y_DIS * j +
        "px)" +
        " translateZ(" +
        -Z_DIS * j +
        "px)";

      j++;
    }

    document.removeEventListener("mousemove", slideMouseMove, false);
    document.removeEventListener("touchmove", slideMouseMove, false);
  }
}
</script>


<div class="div3">
    <h1 style="font-family: 'Great Vibes', cursive;">Tujų alėja</h1>
    <br>
    <p>Phasellus molestie ultricies risus, at bibendum nunc cursus in. Duis consectetur, nisl euismod elementum faucibus, libero lorem interdum mauris, vitae rutrum sem diam nec leo. Sed nisi ligula, consequat ut elit ut, rhoncus consequat risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse diam orci, feugiat ut ullamcorper quis, maximus in massa. Nullam eleifend turpis a nisi commodo, non porta felis dapibus. Sed aliquet lacus ut urna efficitur scelerisque. Sed aliquam dui sit amet lacus pretium, at varius odio sodales.</p>
    <br>
    <p>Cras egestas et turpis et consequat. Integer lobortis neque quis orci venenatis varius. Suspendisse sit amet libero at nisi lacinia malesuada. Aenean porta ac erat at venenatis. Morbi consectetur varius sem a efficitur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac posuere leo.</p>
</div>

<datalist id="variantai">
    <option value="Taip">Taip</option>
    <option value="Ne">Ne</option>
</datalist>

<div class="slider">
    <!--<div class="slide"><img src="images/Objects/3_objektas.jpg" />
      <p style="font-family: 'Great Vibes', cursive;" ><b>#4 VDU ŽŪA Dendroparkas</b></p>
    </div>
    <div class="slide"><img src="https://images.unsplash.com/photo-1486162928267-e6274cb3106f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" />
      <p style="font-family: 'Great Vibes', cursive;"><b>#3 VDU ŽŪA Dendroparkas</b></p>
    </div>-->
    <div class="slide"><img src="https://images.unsplash.com/photo-1545436864-cd9bdd1ddebc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" />
      <p style="font-family: 'Great Vibes', cursive;"><b>#2 Tujų alėja</b></p>
    </div>
    <div class="slide"><img src="images/Objects/question.jpg" />
      <p style="font-family: 'Great Vibes', cursive;"><b>#1 Tujų alėja</b></p>
    </div>
  </div>
  <br>
  <?php if($Location==2) { ?>
  <div class="quiz3">
    <h1 style="font-family: 'Great Vibes', cursive;">Užduotis</h1>
    <p>Atlik užduotį ir gauk užuominą kitam objektui</p>
    <br>
    <form method="POST" action="object-3-submit">
      <h3 style="font-family: 'Great Vibes', cursive;">Kas pasodino šią tujų alėją (pavardė)?</h3>
      <div class="input-container">		
          <input name="4_klausimas" type="text" style="color:black" required/>
      </div>

        <button type="submit" class="btn solid">Išsaugoti  <i class="fas fa-arrow-right"></i></button>
    </form>
  </div>
  <?php } ?>

  <?php if($Location>=3) { ?>
  <div class="hint3">
    <h1 style="font-family: 'Great Vibes', cursive;">Užuomina</h1>
    <br>
    <p>Naujo objekto koordinatės: ..°..'N ..°..'E</p>
    <br>
    </div>
    <iframe src="https://snazzymaps.com/embed/279322" width="100%" height="50%" style="border:none;"></iframe>
  <?php } ?>

</body>
</html>
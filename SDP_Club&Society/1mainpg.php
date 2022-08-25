<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Login or Register Page</title>
    
</head>
<body>
<!------------------------------ HEADER ------------------------------>
    <header> 
        <a href="#" class="brand">APU iSocial Club</a>

        <div class="menu-btn"></div>

        <div class="navigation">
            <div class="navigation-items">
                <a href="1mainpg.php">Home</a>
                <a href="2aboutus.php">About Us</a>
                <a href="2login.php">Login</a>
                <a href="2signup.php">Sign Up</a>
            </div>
        </div>

    </header>

<!------------------------------ SECTION ------------------------------>

    <section class="home">

        <video class="video-slide active" src="videos/astronomy4.mp4" autoplay muted loop></video>
        <video class="video-slide" src="videos/country2.mp4" autoplay muted loop></video>
        <video class="video-slide" src="videos/culture.mp4" autoplay muted loop></video>
        <video class="video-slide" src="videos/movie.mp4" autoplay muted loop></video>

        <div class="content active">
            <h1>Astronomy.<br><span>Club</span></h1>
            <p>Astronomy club provides large source of information to 
                people who are into the field of astronomy as mere 
                enthusiasts or hobbyist.It is a club devoted to studying 
                stars, constellations, planets, galaxies, and study of
                everything beyond the Earth's atmosphere. As such, 
                Astronomy Clubs are a very effective medium 
                to introduce these subjects to students outside of the 
                classroom and maintain an everlasting interest.</p>
            <a href="3astronomyE.php">Explore</a>
        </div>

        <div class="content">
            <h1>Country.<br><span>Club</span></h1>
            <p>Provides the learning of people from a broad 
                spectrum of ethnicities, life styles, cultures, and faiths, 
                the more you may relate with their individual and group needs. In our 
                globalizing world it is important to be culturally sensitive and it 
                can't hurt to know a foreign language. In the business world, having 
                lived abroad can give you a competitive edge. Use the confidence and 
                cultural sensitivity that traveling helps you develop and help it make 
                you successful. </p>
            <a href="3countryE.php">Explore</a>
        </div>

        <div class="content">
            <h1>Culture.<br><span>Club</span></h1>
            <p>Learning about other cultures which 
                helps us understand different perspectives within the 
                world in which we live. Culture is a strong part of people’s lives. 
                It influences their views, their values, their humor, their hopes, 
                their loyalties, and their worries and fears. So when you are working
                with people and building relationships with them, it helps to have some 
                perspective and understanding of their cultures.</p>
            <a href="3cultureE.php">Explore</a>
        </div>

        <div class="content">
            <h1>Movie.<br><span>Club</span></h1>
            <p>When we watch a film, we're not just being entertained: We're also 
                admiring something beautiful; learning about the world and ourselves; 
                connecting with communities; and contributing to positive social change. 
                Simply watching a film can be a way of appreciating art and heightening 
                your cultural awareness — in a format that is more accessible to many of 
                us than a gallery.</p>
            <a href="3movieE.php">Explore</a>
        </div>

        <div class="media-icons">
            <a href="#"> <i class="fab fa-facebook-f"></i> </a>
            <a href="#"> <i class="fab fa-instagram"></i> </a>
            <a href="#"> <i class="fab fa-twitter"></i> </a>
        </div>

        <div class="slider-navigation">
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
        </div>

    </section>

<!------------------------------ JAVASCRIPT ------------------------------>

    <script type="text/javascript">

    // Javascript for navigation menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      menuBtn.classList.toggle("active");
      navigation.classList.toggle("active");
    }); 

    // Javascript for video slider
    const btns = document.querySelectorAll(".nav-btn")
    const slides = document.querySelectorAll(".video-slide")
    const contents = document.querySelectorAll(".content")



    var sliderNav = function(manual) {
        btns.forEach((btn) => {
            btn.classList.remove("active")
        });

        slides.forEach((slide) => {
            slide.classList.remove("active")
        });

        contents.forEach((content) => {
            content.classList.remove("active")
        });

        btns[manual].classList.add("active");
        slides[manual].classList.add("active");
        contents[manual].classList.add("active");
    }

    btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            sliderNav(i)
        });
    });


    </script>

</body>
</html>
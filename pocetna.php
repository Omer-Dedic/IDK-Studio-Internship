<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Template page">
    <meta name="keywords" content="Template page">
    <meta name="author" content="Omer Dedic">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="custom-swiper-bullet.css">
    <link rel="icon" href="slike/icons8-capital-100.png">

    <title>Template page</title>

</head>
<body class="body">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--mali navbar iznad glavnog-->
      <div class="mali-nav">
        <div class="row" id="mali-nav">
        <div class="col-md-3" id="br"><img class="icon-mali-nav" src="slike/telefon.png"><a class="brmlnav" href="tel: 387 61 123 123">+387 61 123 123</a></div>
        <div class="col-md-3" id="mail"><img class="icon-mali-nav" src="slike/mail.png"><a class="mailmlnav" href="mailto: email@gmail.com">email@gmail.com</a></div>
        <div class="col-md-3" id="vrijeme"><img class="icon-mali-nav" src="slike/sat.svg"><a href="kontakt.php" class="radmlnav">08:00 - 16:00</a></div>
        <div class="col-md-3" id="adresa"><img class="icon-mali-nav" src="slike/pin.png"><a target="_blank" class="adresamlnav" href="https://www.google.com/maps/place/IDK+STUDIO+d.o.o./@44.8236214,15.8712387,17z/data=!3m1!4b1!4m6!3m5!1s0x4761405b49b439fb:0x477f0fcaa317893e!8m2!3d44.8236215!4d15.8761042!16s%2Fg%2F11dyn8929l?entry=ttu">Adresa</a></div>
        </div>
      </div>
    <!--Kraj sekcije-->

    <!--navbar-->
      <nav>
        <ul class="sidebar">
          <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#088395"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
          <li><b><a href="pocetna.php" title="Pocetna stranica">Početna</a></b></li>
          <li><b><a href="onama.php" title="Saznajte vise o nama">O nama</a></b></li>
          <li><b><a href="blog.php" title="Pogledajte naš blog">Blog</a></b></li>
          <li><b><a href="kontakt.php" title="Kontaktirajte nas">Kontakt</a></b></li>
        </ul>
        <ul>
          <li><a href="pocetna.php"><img class="logoo" src="slike/logo.png"></a></li>
          <li class="efekat" id="hide"><b><a href="pocetna.php" title="Pocetna stranica">Početna</a></b></li>
          <li class="efekat" id="hide"><b><a href="onama.php" title="Saznajte vise o nama">O nama</a></b></li>
          <li class="efekat" id="hide"><b><a href="blog.php" title="Pogledajte naš blog">Blog</a></b></li>
          <li class="efekat" id="hide"><b><a href="kontakt.php" title="Kontaktirajte nas">Kontakt</a></b></li>
          <li class="sidebarbutton" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#088395"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
        </ul>
      </nav>
    <!--Kraj sekcije-->

    <!--Slideshow-->
      <div class="slider">
        <div class="list">
            <div class="item active">
                <div class="image-overlay-container">
                    <img src="slike/slide1.jpg" class="objfcov">
                    <div class="overlay"></div>
                    <div class="content">
                        <h2>Slider 01</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="image-overlay-container">
                    <img src="slike/slide22.jpg" class="objfcov">
                    <div class="overlay"></div>
                    <div class="content">
                        <h2>Slider 02</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="image-overlay-container">
                    <img src="slike/slide3.jpg" class="objfcov">
                    <div class="overlay"></div>
                    <div class="content">
                        <h2>Slider 03</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="image-overlay-container">
                    <img src="slike/slide4.jpg" class="objfcov">
                    <div class="overlay"></div>
                    <div class="content">
                        <h2>Slider 04</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="image-overlay-container">
                    <img src="slike/slide5.png" class="objfcov">
                    <div class="overlay"></div>
                    <div class="content">
                        <h2>Slider 05</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    
          <div class="arrows">
              <button id="prev"><</button>
              <button id="next">></button>
          </div>
          <div class="thumbnail">
              <div class="item active"></div>
              <div class="item"></div>
              <div class="item"></div>
              <div class="item"></div>
              <div class="item"></div>
          </div>
      </div>
    <!--Kraj slideshow--> 

    <!--Naslov/privlacan tekst-->  
      <div class="linija1"></div>

      <b><p class="isp">Lorem ipsum dolor sit amet</p></b>

      <h4 class="ish2">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</h4>

      <br>
      <br>
      <div class="linija2"></div>
    <!--Kraj sekcije-->

    <!--kartice-->
      <div class="container" id="kartice">
          <div class="row">
            <div class="col-md-4">
              <div class="container noselect">
                <div class="canvas">
                  <div class="tracker tr-1"></div>
                  <div class="tracker tr-2"></div>
                  <div class="tracker tr-3"></div>
                  <div class="tracker tr-4"></div>
                  <div class="tracker tr-5"></div>
                  <div class="tracker tr-6"></div>
                  <div class="tracker tr-7"></div>
                  <div class="tracker tr-8"></div>
                  <div class="tracker tr-9"></div>
                  <div class="tracker tr-10"></div>
                  <div class="tracker tr-11"></div>
                  <div class="tracker tr-12"></div>
                  <div class="tracker tr-13"></div>
                  <div class="tracker tr-14"></div>
                  <div class="tracker tr-15"></div>
                  <div class="tracker tr-16"></div>
                  <div class="tracker tr-17"></div>
                  <div class="tracker tr-18"></div>
                  <div class="tracker tr-19"></div>
                  <div class="tracker tr-20"></div>
                  <div class="tracker tr-21"></div>
                  <div class="tracker tr-22"></div>
                  <div class="tracker tr-23"></div>
                  <div class="tracker tr-24"></div>
                  <div class="tracker tr-25"></div>
                  <div id="card">
                  <p id="prompt">Lorem Ipsum</p>
                    <div class="title">Lorem Ipsum dolor sit amet</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="container noselect">
                <div class="canvas">
                  <div class="tracker tr-1"></div>
                  <div class="tracker tr-2"></div>
                  <div class="tracker tr-3"></div>
                  <div class="tracker tr-4"></div>
                  <div class="tracker tr-5"></div>
                  <div class="tracker tr-6"></div>
                  <div class="tracker tr-7"></div>
                  <div class="tracker tr-8"></div>
                  <div class="tracker tr-9"></div>
                  <div class="tracker tr-10"></div>
                  <div class="tracker tr-11"></div>
                  <div class="tracker tr-12"></div>
                  <div class="tracker tr-13"></div>
                  <div class="tracker tr-14"></div>
                  <div class="tracker tr-15"></div>
                  <div class="tracker tr-16"></div>
                  <div class="tracker tr-17"></div>
                  <div class="tracker tr-18"></div>
                  <div class="tracker tr-19"></div>
                  <div class="tracker tr-20"></div>
                  <div class="tracker tr-21"></div>
                  <div class="tracker tr-22"></div>
                  <div class="tracker tr-23"></div>
                  <div class="tracker tr-24"></div>
                  <div class="tracker tr-25"></div>
                  <div id="card">
                  <p id="prompt">Lorem Ipsum</p>
                    <div class="title">Lorem Ipsum dolor sit amet</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="container noselect">
                <div class="canvas">
                  <div class="tracker tr-1"></div>
                  <div class="tracker tr-2"></div>
                  <div class="tracker tr-3"></div>
                  <div class="tracker tr-4"></div>
                  <div class="tracker tr-5"></div>
                  <div class="tracker tr-6"></div>
                  <div class="tracker tr-7"></div>
                  <div class="tracker tr-8"></div>
                  <div class="tracker tr-9"></div>
                  <div class="tracker tr-10"></div>
                  <div class="tracker tr-11"></div>
                  <div class="tracker tr-12"></div>
                  <div class="tracker tr-13"></div>
                  <div class="tracker tr-14"></div>
                  <div class="tracker tr-15"></div>
                  <div class="tracker tr-16"></div>
                  <div class="tracker tr-17"></div>
                  <div class="tracker tr-18"></div>
                  <div class="tracker tr-19"></div>
                  <div class="tracker tr-20"></div>
                  <div class="tracker tr-21"></div>
                  <div class="tracker tr-22"></div>
                  <div class="tracker tr-23"></div>
                  <div class="tracker tr-24"></div>
                  <div class="tracker tr-25"></div>
                  <div id="card">
                  <p id="prompt">Lorem Ipsum</p>
                    <div class="title">Lorem Ipsum dolor sit amet</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    <!--Kraj kartica-->  

    <!--Siroka slika-->
      <div class="sirokaslika">
        <b><i><h1 class="sh1">Lorem Ipsum</h1></b></i>
      </div>
      <br>
    <!--Kraj slike-->

    <!--blog-->
      <br>
      <br>
      <br>
      <div class="row">
        <div class="col"><p class="blog">B L O G</p></div>
        <div class="col-10" id="linijaa"></div>
      </div>
      <br>

      <div class="slikatext">
        <div class="row">
          <div class="col-md-6" id="levi">
              <img class="drustvo objfcov" src="slike/drustvo.png">
          </div>
          <div class="col-md-6" id="textdrustvo">
            <p class="malitxt">O P I S</p>
            <h1 class="naslovdrustvo">NASLOV</h1>
            <p class="yapping">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="batn">
              <a href="blog.php">
                <button class="button1">
                  Pročitaj više
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="textslika">
        <div class="row">
          <div class="col-md-6" id="drustvotext">
            <p class="malitxt">O P I S</p>
            <h1 class="naslovdrustvo">NASLOV</h1>
            <p class="yapping">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="batn1">
            <a href="blog.php">
            <button class="button2">
              Pročitaj više
            </button>
            </a>
          </div>
          </div>
          <div class="col-md-6" id="llevi">
            <img class="ddrustvo objfcov" src="slike/ddrustvo.png">
          </div>
        </div>
      </div>

      <div class="donjalinija"></div>
      <br>
      <br>
      <br>
    <!--Kraj bloga-->

    <!--About us-->
      <div class="onama">
        <div class="row" id="mr0">
          <div class="col-md-6" id="onamaleft">
            <h1 class="aboutnaslov">O NAMA</h1>
            <p class="abouttext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="onama.php">
            <button class="dugme">
              <span>Continue</span>
              <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                  <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="white"></path>
              </svg>
            </button>
            </a>
          </div>
          <div class="col-md-6 flend">
            <img src="slike/tim.png" class="tim objfcov">
          </div>
        </div>
      </div>
    <!--Kraj sekcije-->

    <!--recenzije-->
      <div id="rec" class="row">
        <div class="col-md-6" id="recpartkec">
          <h1 class="recnaslov">Ostavite Vašu recenziju</h1>
          <form action="rec.php" method="post">
            <div class="rating">
              <input value="5" name="rating" id="star5" type="radio" required>
              <label for="star5"></label>
              <input value="4" name="rating" id="star4" type="radio" required>
              <label for="star4"></label>
              <input value="3" name="rating" id="star3" type="radio" required>
              <label for="star3"></label>
              <input value="2" name="rating" id="star2" type="radio" required>
              <label for="star2"></label>
              <input value="1" name="rating" id="star1" type="radio" required>
              <label for="star1"></label>
            </div>
            <div class="form">
              <input class="input" name="Ime" placeholder="Ime" type="text" required>
              <span class="input-border"></span>
            </div>
            <div class="form">
              <input class="input" name="Prezime" placeholder="Prezime" type="text" required>
              <span class="input-border"></span>
            </div>
            <div class="form">
              <input class="input" name="Recenzija" placeholder="Poruka" type="text" required>
              <span class="input-border"></span>
            </div>
            <div class="submit">
              <input class="submitb" type="submit" value="submit">
            </div>
          </form>
        </div>
        <div class="col-md-6" id="kard">
          <div class="swiper" id="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><div class="kartica">
                <div class="zvjezdice">
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                </div>
                <p class="deskripcija"><i>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</i></p>
                <h3 class="imerec">-Lorem Ipsum</h3>
              </div></div>
              <div class="swiper-slide"><div class="kartica">
                <div class="zvjezdice">
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                </div>
                <p class="deskripcija"><i>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</i></p>
                <h3 class="imerec">-Lorem Ipsum</h3>
              </div></div>
              <div class="swiper-slide"><div class="kartica">
                <div class="zvjezdice">
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                  <input type="radio">
                  <label></label>
                </div>
                <p class="deskripcija"><i>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</i></p>
                <h3 class="imerec">-Lorem Ipsum</h3>
              </div></div>
            </div>
          
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
      
          </div>
        </div>
      </div>
    <!--Kraj sekcije-->

    <!--footer-->
      <div class="footer" style="padding-left: 10px;">
        <div class="row" id="mr0">
          <div class="col-md-5" id="logoft">
              <a href="pocetna.php"><img class="footerlogo" src="slike/logo.png"></a>
              <br>
              <p class="kopi">2024 &copy; All rights reserved</p>
          </div>
          <div class="col-md-3" id="lisft">
            <ul class="listafooter" style="list-style-type:none;">
              <li><img class="pinfooter" src="slike/pinfooter.png"><a target="_blank" class="adresafoot" href="https://www.google.com/maps/place/IDK+STUDIO+d.o.o./@44.8236214,15.8712387,17z/data=!3m1!4b1!4m6!3m5!1s0x4761405b49b439fb:0x477f0fcaa317893e!8m2!3d44.8236215!4d15.8761042!16s%2Fg%2F11dyn8929l?entry=ttu">Adresa</a></li>
              <li><img class="satfooter" src="slike/satfooter.png"><a href="kontakt.php" class="radfoot">08:00 - 16:00</a></li>
              <li><img class="fonfooter" src="slike/fonfooter.png"><a class="brfoot" href="tel: 387 61 123 123">+387 61 123 123</a></li>
              <li><img class="mailfooter" src="slike/mailfooter.png"><a class="mailfoot" href="mailto: email@gmail.com">email@gmail.com</a></li>
            </ul>
          </div>
          <div class="col-md-4" id="socikon">
            <div class="row">
              <div class="col" id="ig">
                <div class="tooltip-container">
                  <div class="tooltip">
                    <div class="profile">
                      <div class="user">
                        <div class="img"><img src="slike/user.png"></div>
                        <div class="details">
                          <div class="name">User</div>
                          <div class="username">@deda.xz</div>
                        </div>
                      </div>
                      <div class="about">Active User</div>
                    </div>
                  </div>
                  <div class="text">
                    <a class="icon" href="https://www.instagram.com/instagram/">
                      <div class="layer">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span class="instagramSVG">
                          <svg
                            fill="white"
                            class="svgIcon"
                            viewBox="0 0 448 512"
                            height="1.5em"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                            ></path>
                          </svg>
                        </span>
                      </div>
                      <div class="text">Instagram</div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col" id="fejzbuk">
                <div class="toltip-container">
                  <div class="toltip">
                    <div class="profilee">
                      <div class="userr">
                        <div class="imgg"><img src="slike/user.png"></div>
                        <div class="detailss">
                          <div class="namee">User</div>
                          <div class="username">@deda.xz</div>
                        </div>
                      </div>
                      <div class="aboutt">Active User</div>
                    </div>
                  </div>
                  <div class="textt">
                    <a class="iconn" href="https://www.facebook.com/idkstudio">
                      <div class="layerr">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span class="facebookSVG">
                          <svg
                            viewBox="0 0 40 40"
                            xml:space="preserve"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <linearGradient
                              gradientUnits="userSpaceOnUse"
                              gradientTransform="matrix(40 0 0 -39.7778 11115.001 16212.334)"
                              y2="407.5726"
                              y1="406.6018"
                              x2="-277.375"
                              x1="-277.375"
                              id="a"
                            >
                              <stop stop-color="#0062e0" offset="0"></stop>
                              <stop stop-color="#19afff" offset="1"></stop>
                            </linearGradient>
                            <path
                              d="M16.7 39.8C7.2 38.1 0 29.9 0 20 0 9 9 0 20 0s20 9 20 20c0 9.9-7.2 18.1-16.7 19.8l-1.1-.9h-4.4l-1.1.9z"
                              fill="url(#a)"
                            ></path>
                            <path
                              d="m27.8 25.6.9-5.6h-5.3v-3.9c0-1.6.6-2.8 3-2.8H29V8.2c-1.4-.2-3-.4-4.4-.4-4.6 0-7.8 2.8-7.8 7.8V20h-5v5.6h5v14.1c1.1.2 2.2.3 3.3.3 1.1 0 2.2-.1 3.3-.3V25.6h4.4z"
                              fill="#fff"
                            ></path>
                          </svg>
                        </span>
                      </div>
                      <div class="textt">Facebook</div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col" id="linkedan">
                <div class="toooltip-container">
                  <div class="toooltip">
                    <div class="proofile">
                      <div class="userrr">
                        <div class="imggg"><img src="slike/user.png"></div>
                        <div class="detailsss">
                          <div class="nameee">User</div>
                          <div class="usernameee">@deda.xz</div>
                        </div>
                      </div>
                      <div class="abouttt">500+ Projects</div>
                    </div>
                  </div>
                  <div class="texttt">
                    <a class="iconnn" href="https://www.linkedin.com/in/omer-dedić-808804314/">
                      <div class="layerrr">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span class="fab fa-linkedin">
                          <svg viewBox="0 0 448 512" height="1em">
                            <path
                              d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                            ></path>
                          </svg>
                        </span>
                      </div>
                      <div class="texttt">LinkedIn</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4" id="mobicon">

          </div>
        </div>
      </div>
    <!--kraj footera-->


      <script src="app.js"></script>

      <script>
        const swiper = new Swiper('.swiper', {
        loop: true,

        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });

      function showSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'flex'
      }

      function hideSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'none'
      }
      </script>
</body>
</html>
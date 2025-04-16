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

    <!--Naslov-->
      <h1 class="blognaslov">Pogledajte novosti na našem blogu:</h1>
    <!--Kraj naslova-->

    <!--Prve tri kartice bloga-->
      <div class="row" id="blog1">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-4" id="wdth">
              <div class="karticablog1" id="karticapdtop">
                <img src="slike/blog1.jpg" class="blog1slika objfcov">
                <p class="blog1p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
            <div class="col-md-4" id="wdth">
              <div class="karticablog2" id="karticapdtop">
                <img src="slike/blog2.png" class="blog2slika objfcov">
                <p class="blog2p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
            <div class="col-md-4" id="wdth">
              <div class="karticablog3" id="karticapdtop">
                <img src="slike/blog3.jpg" class="blog3slika objfcov">
                <p class="blog3p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    <!--Kraj prve tri kartice-->

    <!--Druge tri kartice bloga-->
      <div class="row" id="blog2">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-4" id="wdth">
              <div class="karticablog1" id="karticapdtop">
                <img src="slike/blog1.jpg" class="blog1slika objfcov">
                <p class="blog1p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
            <div class="col-md-4" id="wdth">
              <div class="karticablog2" id="karticapdtop">
                <img src="slike/blog2.png" class="blog2slika objfcov">
                <p class="blog2p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
            <div class="col-md-4" id="wdth">
              <div class="karticablog3" id="karticapdtop">
                <img src="slike/blog3.jpg" class="blog3slika objfcov">
                <p class="blog3p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    <!--Kraj druge tri kartice-->

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
        </div>
      </div>
    <!--kraj footera-->

    <script src="app.js"></script>
      <script>
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
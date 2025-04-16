<?php
session_start();

if(!isset($_SESSION['id'])){

    echo '<!DOCTYPE html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Template page">
    <meta name="keywords" content="Template page">
    <meta name="author" content="Omer Dedic">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="slike/icons8-capital-100.png">

    <title>Dashboard</title>

    <style>
    .bg-error {
  height: 300px;
  width: 50%;
  background-color: rgba(184, 184, 184, 0.155);
  border-radius: 12px;
}

.naslov-error-login {
  font-family: Arial, Helvetica, sans-serif;
  padding-top: 50px;
  text-align: center;
  color: rgb(123, 123, 123);
}

.error-dugmad {
  display: flex;
  justify-content: center;
  margin-top: 50px;
  gap: 50px;
}

.primary-button-error {
  background-color: #071952;
  color: white;
  border: none;
  padding: 12px;
  font-size: 18px;
  border-radius: 12px;
}

.secondary-button-error {
  background-color: transparent;
  color: #133FD1;
  border: 2px solid #133FD1;
  padding: 12px;
  font-size: 18px;
  border-radius: 12px;
}
.askdjn {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
    </style>

</head>
<body>

    <div class="askdjn">
    <div class="bg-error">
        <h1 class="naslov-error-login"> Prijavite se kako bi vidjeli ovu stranicu! </h1>
        <div class="error-dugmad">
            <a href="pocetna.php"><button class="secondary-button-error">Idi na početnu</button></a>
            <a href="login.php"><button class="primary-button-error">Idi na prijavu</button></a>
        </div>
    </div>
    </div>

</body>
</html>';
    die();
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Template page">
    <meta name="keywords" content="Template page">
    <meta name="author" content="Omer Dedic">
    <link href="style.css?v=1.4" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="slike/icons8-capital-100.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Dashboard</title>
</head>
<body>

    <!--Navbar fixed left-->
        <div class="navbar-fixed-left">
            <img class="logo-nav-dash" src="slike/logo.png">
            <div class="logcircle-dash">
                <img class="logiconimage-dash" src="slike/user-icon-login.png">
            </div>
            <p class="welcome-dash"><?= htmlspecialchars($_SESSION['username']) ?></p>
            <a href="dashboard.php" class="svg-link active">
                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                    <path class="st0" d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" stroke="#1C274C" stroke-width="1.5"/>
                    <path class="st0" d="M15 18H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/></svg>
            Pocetna</a>
            <a href="blog-dash.php" class="svg-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" xml:space="preserve">
                    <polygon class="st0" points="17.8,17 15,17 15,14.2 25.6,3.6 28.4,6.4"/>
                    <path class="st0" d="M25,10v13c0,1.1-0.9,2-2,2H9c-1.1,0-2-0.9-2-2V9c0-1.1,0.9-2,2-2h13.2"/></svg>
            Blog</a>
            <a href="#" class="svg-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                    <path class="st0" d="M3 13V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.0799 18 6.2 18H16.2446C16.5263 18 16.6672 18 16.8052 18.0193C16.9277 18.0365 17.0484 18.065 17.1656 18.1044C17.2977 18.1488 17.4237 18.2118 17.6757 18.3378L21 20V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H13M8.12132 3.87868C9.29289 5.05025 9.29289 6.94975 8.12132 8.12132C6.94975 9.29289 5.05025 9.29289 3.87868 8.12132C2.70711 6.94975 2.70711 5.05025 3.87868 3.87868C5.05025 2.70711 6.94975 2.70711 8.12132 3.87868Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Poruke</a>
            <a href="#" class="svg-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px" viewBox="0 0 52 52">
                    <path class="icon-shape" d="M27.4133467,3.10133815 L32.0133467,18.1013381 C32.2133467,18.7013381 32.8133467,19.0013381 33.4133467,19.0013381 L48.4133467,19.0013381 C49.9133467,19.0013381 50.5133467,21.0013381 49.3133467,21.9013381 L37.1133467,30.9013381 C36.6133467,31.3013381 36.4133467,32.0013381 36.6133467,32.6013381 L42.4133467,48.0013381 C42.8133467,49.4013381 41.3133467,50.6013381 40.1133467,49.7013381 L27.0133467,39.9013381 C26.5133467,39.5013381 25.8133467,39.5013381 25.2133467,39.9013381 L12.0133467,49.7013381 C10.8133467,50.6013381 9.21334668,49.4013381 9.71334668,48.0013381 L15.3133467,32.6013381 C15.5133467,32.0013381 15.3133467,31.3013381 14.8133467,30.9013381 L2.61334668,21.9013381 C1.41334668,21.0013381 2.11334668,19.0013381 3.51334668,19.0013381 L18.5133467,19.0013381 C19.2133467,19.0013381 19.7133467,18.8013381 19.9133467,18.1013381 L24.6133467,3.00133815 C25.0133467,1.60133815 27.0133467,1.70133815 27.4133467,3.10133815 Z M26.0133467,12.8023264 C26,14.1700393 26,33.5426636 26,34.4953918 C26.1865845,34.6476135 28.9331193,36.6890643 34.2396046,40.6197441 C34.9394191,41.144605 35.8141872,40.4447905 35.5809157,39.6283403 L35.5809157,39.6283403 L32.3085327,31.0201416 C31.9597778,30.2501831 32.3085327,29.7487793 32.7398682,29.4849854 L32.7398682,29.4849854 L39.6048489,24.6961622 C40.3046634,24.1713013 39.9547562,23.0049438 39.0799881,23.0049438 L39.0799881,23.0049438 L31.0206299,23.0049438 C30.6707226,23.0049438 29.7518921,22.8880615 29.5025635,21.9888306 L29.5025635,21.9888306 L26.8332347,13.4436151 C26.7175852,13.0388421 26.3602784,12.8204102 26.0133467,12.8023264 Z"/></svg>
            Recenzije</a>
            <a href="#" class="svg-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-2.8 -2.8 33.60 33.60" height="207px" width="207px" class="custom-icon">
                    <g>
                        <path d="M1 20C1 18.8954 1.89543 18 3 18H6C7.10457 18 8 18.8954 8 20V25C8 26.1046 7.10457 27 6 27H3C1.89543 27 1 26.1046 1 25V20ZM6 20.4C6 20.1791 5.82091 20 5.6 20H3.4C3.17909 20 3 20.1791 3 20.4V24.6C3 24.8209 3.17909 25 3.4 25H5.6C5.82091 25 6 24.8209 6 24.6V20.4Z" clip-rule="evenodd" class="icon-shape"></path>
                        <path d="M10 3C10 1.89543 10.8954 1 12 1H15C16.1046 1 17 1.89543 17 3V25C17 26.1046 16.1046 27 15 27H12C10.8954 27 10 26.1046 10 25V3ZM15 3.4C15 3.17909 14.8209 3 14.6 3L12.4 3C12.1791 3 12 3.17909 12 3.4V24.6C12 24.8209 12.1791 25 12.4 25H14.6C14.8209 25 15 24.8209 15 24.6V3.4Z" clip-rule="evenodd" class="icon-shape"></path>
                        <path d="M19 11C19 9.89543 19.8954 9 21 9H24C25.1046 9 26 9.89543 26 11V25C26 26.1046 25.1046 27 24 27H21C19.8954 27 19 26.1046 19 25V11ZM24 11.4C24 11.1791 23.8209 11 23.6 11H21.4C21.1791 11 21 11.1791 21 11.4V24.6C21 24.8209 21.1791 25 21.4 25H23.6C23.8209 25 24 24.8209 24 24.6V11.4Z" clip-rule="evenodd" class="icon-shape"></path>
                    </g></svg>
            Analitika</a>
            <a class="logout-nav svg-link" href="logout.php">
                <svg class="st0" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)">
                    <g id="SVGRepo_bgCarrier"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                    <polyline points="46.02 21.95 55.93 31.86 46.02 41.77"></polyline><line x1="55.93" y1="31.86" x2="19.59" y2="31.86"></line>
                    <path d="M40,38.18V52a2.8,2.8,0,0,1-2.81,2.8H12A2.8,2.8,0,0,1,9.16,52V11.77A2.8,2.8,0,0,1,12,9H37.19A2.8,2.8,0,0,1,40,11.77V25"></path>
                    </g></svg>
            Odjavi se</a>
        </div>
    <!--End of navbar fixed left-->

    <!--Page content-->
        <div class="content-dashboard">

            <h1 class="welcome-message">Dobrodošli <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
            <p class="quick-view-header">Brzi pregled</p>

            <!--Quick View-->
                <div class="quick-view-flex">

                    <a href="blog-dash.php" style="text-decoration: none;">
                        <div class="box-quick-view">
                            <div class="icon-quick-view-box">
                                <div class="circle-item-color" style="background-color: #05668d;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34px" height="34px" viewBox="0 0 32 32" xml:space="preserve">
                                        <polygon class="svg-boxes" points="17.8,17 15,17 15,14.2 25.6,3.6 28.4,6.4"/>
                                        <path class="svg-boxes" d="M25,10v13c0,1.1-0.9,2-2,2H9c-1.1,0-2-0.9-2-2V9c0-1.1,0.9-2,2-2h13.2"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="item-header">
                                <p class="item-p">Ukupno blogova</p>
                            </div>
                            <div class="item-number">
                                <p class="item-number-p">6</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" style="text-decoration: none;">
                        <div class="box-quick-view">
                            <div class="icon-quick-view-box">
                                <div class="circle-item-color" style="background-color: #028090;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                                        <path class="svg-boxes" d="M3 13V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.0799 18 6.2 18H16.2446C16.5263 18 16.6672 18 16.8052 18.0193C16.9277 18.0365 17.0484 18.065 17.1656 18.1044C17.2977 18.1488 17.4237 18.2118 17.6757 18.3378L21 20V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H13M8.12132 3.87868C9.29289 5.05025 9.29289 6.94975 8.12132 8.12132C6.94975 9.29289 5.05025 9.29289 3.87868 8.12132C2.70711 6.94975 2.70711 5.05025 3.87868 3.87868C5.05025 2.70711 6.94975 2.70711 8.12132 3.87868Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="item-header">
                                <p class="item-p">Nove poruke</p>
                            </div>
                            <div class="item-number">
                                <p class="item-number-p">1</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" style="text-decoration: none;">
                        <div class="box-quick-view">
                            <div class="icon-quick-view-box">
                                <div class="circle-item-color" style="background-color: #00a896;">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" width="30px" height="30px" viewBox="0 0 52 52">
                                        <path d="M27.4133467,3.10133815 L32.0133467,18.1013381 C32.2133467,18.7013381 32.8133467,19.0013381 33.4133467,19.0013381 L48.4133467,19.0013381 C49.9133467,19.0013381 50.5133467,21.0013381 49.3133467,21.9013381 L37.1133467,30.9013381 C36.6133467,31.3013381 36.4133467,32.0013381 36.6133467,32.6013381 L42.4133467,48.0013381 C42.8133467,49.4013381 41.3133467,50.6013381 40.1133467,49.7013381 L27.0133467,39.9013381 C26.5133467,39.5013381 25.8133467,39.5013381 25.2133467,39.9013381 L12.0133467,49.7013381 C10.8133467,50.6013381 9.21334668,49.4013381 9.71334668,48.0013381 L15.3133467,32.6013381 C15.5133467,32.0013381 15.3133467,31.3013381 14.8133467,30.9013381 L2.61334668,21.9013381 C1.41334668,21.0013381 2.11334668,19.0013381 3.51334668,19.0013381 L18.5133467,19.0013381 C19.2133467,19.0013381 19.7133467,18.8013381 19.9133467,18.1013381 L24.6133467,3.00133815 C25.0133467,1.60133815 27.0133467,1.70133815 27.4133467,3.10133815 Z M26.0133467,12.8023264 C26,14.1700393 26,33.5426636 26,34.4953918 C26.1865845,34.6476135 28.9331193,36.6890643 34.2396046,40.6197441 C34.9394191,41.144605 35.8141872,40.4447905 35.5809157,39.6283403 L35.5809157,39.6283403 L32.3085327,31.0201416 C31.9597778,30.2501831 32.3085327,29.7487793 32.7398682,29.4849854 L32.7398682,29.4849854 L39.6048489,24.6961622 C40.3046634,24.1713013 39.9547562,23.0049438 39.0799881,23.0049438 L39.0799881,23.0049438 L31.0206299,23.0049438 C30.6707226,23.0049438 29.7518921,22.8880615 29.5025635,21.9888306 L29.5025635,21.9888306 L26.8332347,13.4436151 C26.7175852,13.0388421 26.3602784,12.8204102 26.0133467,12.8023264 Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="item-header">
                                <p class="item-p">Nove recenzije</p>
                            </div>
                            <div class="item-number">
                                <p class="item-number-p">3</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" style="text-decoration: none;">
                        <div class="box-quick-view">
                            <div class="icon-quick-view-box">
                                <div class="circle-item-color" style="background-color: #02c39a;">
                                    <svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" width="35px" height="35px" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:none;stroke:#ffffff;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} </style> <path class="st0" d="M22,6v18c0,1.6,1.3,3,3,3h0c1.6,0,3-1.3,3-3v-9l-6,0"></path> <path class="st0" d="M22,6v18c0,1.3,0.8,2.4,2,2.8V27H8H7c-1.7,0-3-1.4-3-3V6H22z"></path> <line class="st0" x1="8" y1="11" x2="14" y2="11"></line> <line class="st0" x1="8" y1="15" x2="10" y2="15"></line> </g></svg>    
                                </div>
                            </div>
                            <div class="item-header">
                                <p class="item-p">Novosti</p>
                            </div>
                            <div class="item-number">
                                <p class="item-number-p">2</p>
                            </div>
                        </div>
                    </a>

                </div>
            <!--Kraj Quick View-->

            <div class="below-dash">
                <!--Left dash section (button, rating)-->
                    <div class="left-section-dash">
                        <div class="create-dash">
                            <a href="create-blog.php" style="text-decoration: none;"><button class="create-btn">
                                <svg class="svg-icon-create-btn" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 12H20M12 4V20" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>    
                                <span class="create-btn-lable">Kreiraj blog</span>
                            </button></a>
                        </div>
                        <div class="rating-card">
                            <div class="grade" style="display: flex;">
                                <h2 class="rating-grade">4.7</h2><svg viewBox="0 0 24 24" width="60px" height="60px" fill="#088395" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#088395" stroke-width="0.24000000000000005"></g><g id="SVGRepo_iconCarrier"> <path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="#088395" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </div>
                            <div style="display:flex; gap: 45px;">
                                <h6 class="rating-cat">Broj recenzija:</h6>
                                <h6 class="number-rating">875</h6>
                            </div>
                            <div class="btn-boc-dash">
                                <button class="view-more-rating-btn">POGLEDAJ VIŠE</button>
                            </div>
                        </div>
                    </div>
                <!--End of left section-->

                <!--Visits wheel-->
                    <div class="wheel-bg">
                        <canvas id="myPieChart"></canvas>
                        <p class="undertext">Ukupno posjeta danas: <span id="totalVisits">0</span></p>

                        <script>
                            // Dohvati podatke iz PHP-a pomoću AJAX-a
                            fetch('podaci.php')
                                .then(response => response.json())
                                .then(data => {
                                    const ctx = document.getElementById('myPieChart').getContext('2d');
                                    new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: data.labels,
                                            datasets: [{
                                                data: data.data,
                                                backgroundColor: ['#071952', '#133FD1', '#088295']
                                            }]
                                        },
                                        options: {
                                            cutout: '50%'
                                        }
                                    });
                                    document.getElementById('totalVisits').textContent = data.total;
                                })
                                .catch(error => console.error('Greška:', error));
                        </script>
                    </div>
                <!--End of visits wheel-->

                <!--Last items-->
                    <div class="last-inputs">
                        <!--Last message-->
                        <div class="getLastMessage">
                            <h2 class="lastmsg">Zadnja unesena poruka:</h2>
                            <div id="zadnjaPoruka">Učitavanje...</div>
                            <p class="read-more-latest-message"><a class="read-more-latest-message" href="#">Pročitaj više</a></p>

                            <script>
                                fetch('zadnja_poruka.php')
                                    .then(response => response.text())
                                    .then(data => document.getElementById('zadnjaPoruka').innerHTML = data)
                                    .catch(error => console.error('Greška:', error));
                            </script>
                        </div>
                        <!--End of last message-->

                        <!--Last review-->
                        <div class="getLastReview">
                            <h2 class="lastreview">Zadnja recenzija:</h2>
                            <div id="zadnjaRecenzija">Učitavanje...</div>
                            <p class="read-more-latest-message"><a class="read-more-latest-message" href="#">Pročitaj više</a></p>

                            <script>
                                fetch('zadnja_recenzija.php')
                                    .then(response => response.text())
                                    .then(data => document.getElementById('zadnjaRecenzija').innerHTML = data)
                                    .catch(error => console.error('Greška:', error));
                            </script>
                        </div>
                        <!--End of last review-->
                    </div>
                <!--End of last items-->
            </div>

        </div>
    <!--End of page content-->
</body>
</html>
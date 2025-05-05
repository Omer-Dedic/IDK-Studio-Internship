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

$conn = new mysqli("localhost", "root", "", "bazapodataka");
if ($conn->connect_error) {
    die("Konekcija s bazom nije uspjela: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    die("Nedostaje ID bloga.");
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM blogovi WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Blog nije pronađen.");
}

$blog = $result->fetch_assoc();

$datumObjave = strtotime($blog['datum_objave']);
    $trenutnoVrijeme = time();
    $sakrijDiv = $datumObjave < $trenutnoVrijeme;

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Template page">
    <meta name="keywords" content="Template page">
    <meta name="author" content="Omer Dedic">
    <link href="style.css?v=1.3" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="slike/icons8-capital-100.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <title>Edit-Blog</title>
</head>
<body>

    <!--Navbar fixed left-->
        <div class="navbar-fixed-left">
            <img class="logo-nav-dash" src="slike/logo.png">
            <div class="logcircle-dash">
                <img class="logiconimage-dash" src="slike/user-icon-login.png">
            </div>
            <p class="welcome-dash"><?= htmlspecialchars($_SESSION['username']) ?></p>
            <a href="dashboard.php" class="svg-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                    <path class="st0" d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" stroke="#1C274C" stroke-width="1.5"/>
                    <path class="st0" d="M15 18H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/></svg>
            Pocetna</a>
            <a href="blog-dash.php" class="svg-link active">
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
        <div class="content-dashboard" style="display: flex; justify-content: center; height: 100vh; margin-left: 200px;">
        
            <form id="blogForm" class="forma-create-blog" method="post" action="unos_bloga.php" enctype="multipart/form-data" style="margin-top: -20px;">
                <h1 class="create-blog-header"> UREDI BLOG </h1>
                    <div class="pdtpblogdt">
                        <div class="top-top-top">
                                <div class="naslov-create">
                                    <label for="naslov-blog">Naslov:</label><br>
                                    <input class="top-input-field-create-blog" type="text" id="blogTitle" name="naslov-blog" value="<?= htmlspecialchars($blog['naslov']) ?>">
                                </div>
                                <div class="podnaslov-create">
                                    <label for="podnaslov-blog">Podnaslov:</label><br>
                                    <input class="top-input-field-create-blog" type="text" id="podnaslov-blog" name="podnaslov-blog" value="<?= htmlspecialchars($blog['podnaslov']) ?>"><br>
                                </div>
                        </div>
                        <div class="top-section-create-blog">
                            <div class="top-middle-create-blog">
                                <label for="keywords-blog">Ključne riječi:</label><br>
                                <input class="input-fields-create-blog" type="text" id="keywords-blog" name="keywords-blog" value="<?= htmlspecialchars($blog['kljucne_rijeci']) ?>">
                                <button class="generate-button">
                                    <span class="text-button-create">GENERIŠI NOVI TEKST</span>
                                </button>
                            </div>
                            <div class="top-right-create-blog">
                                <input type="file" id="slika" name="slika">
                            </div>
                        </div>
                        <div class="bottom-section-create-blog">
                            <label for="blogText">Tekst bloga:</label>
                            <div class="textarea-wrapper">
                                <div id="blogText" style="height: 200px; width: 1000px; font-size: 16px; border-radius: 0px 0px 8px 8px;"></div>
                                    <input type="hidden" name="blogContent" id="blogContent" value="<?= htmlspecialchars($blog['tekst_bloga']) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="data-lower">
                        <div class="left-lower-edit">
                            <p style="padding-top: 45px;"> <b>Datum objave:</b> <p><?= date('d-m-Y H:i', strtotime($blog['datum_objave'])) ?></p> </p>
                        </div>
                        <div id="schedulePickerEdit" style="padding-top: 40px; padding-left: 80px; width: 100%; <?= $sakrijDiv ? 'display:none;' : '' ?>">
                            <label style="padding-bottom: 10px;" for="scheduleDate">Promjeni datum i vrijeme objave:</label><br>
                            <input type="datetime-local" id="scheduleDate" name="scheduleDate">
                        </div>
                        <div class="save-changes-btn">
                            <div class="dugme-div-edit">
                                <button class="btn-edit-blog-page" id="mainPublishBtn" name="mainPublishBtn" type="submit" style="font-weight: 400;"> Sačuvaj promjene </button>
                            </div>
                        </div>
                    </div>
                </form>            
            
        </div>
    <!--End of page content-->

<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
document.getElementById('blogForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const naslov = document.querySelector('input[name="naslov-blog"]').value;
    const podnaslov = document.querySelector('input[name="podnaslov-blog"]').value;
    const kljucne_rijeci = document.querySelector('input[name="keywords-blog"]').value;
    const tekst_bloga = quill.root.innerHTML.trim();
    const plain_text = quill.getText().trim();
    const file = pond.getFile();

    if (!naslov || !podnaslov || !kljucne_rijeci || plain_text.length < 5) {
        notyf.open({
            type: 'warning',
            message: 'Ispunite sva polja.',
        });
        return;
    }

    const formData = new FormData();
    formData.append('blog_id', <?= (int)$blog['id'] ?>);
    formData.append('naslov-blog', naslov);
    formData.append('podnaslov-blog', podnaslov);
    formData.append('keywords-blog', kljucne_rijeci);
    formData.append('blogContent', tekst_bloga);

    const zakazaniDatum = document.getElementById('scheduleDate')?.value;
    if (zakazaniDatum) {
        formData.append('scheduleDate', zakazaniDatum);
    }

    if (file) {
        formData.append('slika', file.file);
    }

    try {
        const response = await fetch('update_bloga.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.status === "successEdit") {
            notyf.success("Blog je uspješno ažuriran.");
            window.location.href = 'blog-dash.php?successEdit=1';
        } else {
            notyf.error(result.message || "Došlo je do greške prilikom ažuriranja.");
        }
    } catch (error) {
        console.error(error);
        notyf.error("Greška prilikom slanja podataka.");
    }
});
</script>
<script>
const notyf = new Notyf({
        duration: 4000,
        dismissible: true,
        position: {
            x: 'right',
            y: 'top'
        },
        types: [
            {
                type: 'success',
                background: 'linear-gradient(to right,rgb(55, 195, 109) 14%,rgb(8, 149, 76) 59%)',
                icon: {
                    className: 'material-icons',
                    tagName: 'i',
                    text: 'check_circle'
                }
            },
            {
                type: 'successEdit',
                background: 'linear-gradient(to right,rgb(55, 195, 109) 14%,rgb(8, 149, 76) 59%)',
                icon: {
                    className: 'material-icons',
                    tagName: 'i',
                    text: 'check_circle'
                }
            },
            {
                type: 'error',
                background: 'linear-gradient(to right,rgb(195, 69, 55) 14%,rgb(149, 8, 8) 59%)',
                icon: {
                    className: 'material-icons',
                    tagName: 'i',
                    text: 'error'
                }
            },
            {
                type: 'warning',
                background: 'linear-gradient(to right,rgb(195, 181, 55) 14%,rgb(215, 201, 0) 59%)',
                icon: {
                    className: 'material-icons',
                    tagName: 'i',
                    text: 'warning'
                }
            }
        ]
    });

    const quill = new Quill('#blogText', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

    const existingContent = document.getElementById('blogContent').value;
    quill.clipboard.dangerouslyPasteHTML(existingContent);

    document.getElementById('blogForm').addEventListener('submit', function() {
        document.getElementById('blogContent').value = quill.root.innerHTML;
    });

    const inputElement = document.querySelector('#slika');
    const pond = FilePond.create(inputElement, {
        instantUpload: false,
        labelIdle: 'Prevucite ili izaberite novu datoteku'
    });

</script>
</body>
</html>
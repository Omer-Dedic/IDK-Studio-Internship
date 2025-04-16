const dropArea = document.getElementById("drop-area");
const inputFile = document.getElementById("image-input-blog");
const imageView = document.getElementById("img-view");

// Kada korisnik odabere fajl putem inputa
inputFile.addEventListener("change", function () {
    if (inputFile.files.length > 0) {
        displayImage(inputFile.files[0]);
    }
});

// Sprječava default ponašanje kod prevlačenja
dropArea.addEventListener("dragover", function (e) {
    e.preventDefault();
    dropArea.style.border = "2px solid #088295";
});

// Kada korisnik napusti zonu prevlačenja
dropArea.addEventListener("dragleave", function () {
    dropArea.style.border = "none";
});

// Kada korisnik ispusti fajl u drop zonu
dropArea.addEventListener("drop", function (e) {
    e.preventDefault();
    dropArea.style.border = "none";

    if (e.dataTransfer.files.length > 0) {
        displayImage(e.dataTransfer.files[0]);
    }
});

// Funkcija za prikaz slike
function displayImage(file) {
    if (file && file.type.startsWith("image/")) {
        const reader = new FileReader();
        reader.onload = function (event) {
            console.log("Učitana slika:", event.target.result); // Debugging

            // Prikaz slike kao pozadine
            imageView.style.backgroundImage = `url(${event.target.result})`;
            imageView.style.backgroundSize = "cover";
            imageView.style.backgroundRepeat = "no-repeat";
            imageView.style.backgroundPosition = "center";
            imageView.style.border = "none";
            imageView.style.width = "100%"; // Dodano osiguravanje veličine
            imageView.style.height = "100%";

            // Sakrij SVG i tekst
            imageView.querySelector("svg").style.display = "none";
            imageView.querySelector("p").style.display = "none";
            imageView.querySelector("span").style.display = "none";
        };
        reader.readAsDataURL(file);
    } else {
        alert("Molimo odaberite validnu sliku!");
    }
}

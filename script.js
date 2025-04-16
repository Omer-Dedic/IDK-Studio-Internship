// Import FilePond i plugin za pregled slika
import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Registracija plugin-a
FilePond.registerPlugin(FilePondPluginImagePreview);

// Selektuj file input i pretvori ga u FilePond
const pond = FilePond.create(document.querySelector('.filepond'), {
    allowMultiple: true,          // Dozvoli više fajlova
    allowDrop: true,              // Omogući drag & drop
    allowPaste: true,             // Omogući paste (CTRL+V)
    allowReplace: true,           // Omogući zamjenu fajlova
    maxFiles: 5,                  // Ograniči na 5 slika
    labelIdle: 'Prevucite slike ili <span class="filepond--label-action">kliknite</span>'
});

// Ako želiš automatski upload na server
pond.setOptions({
    server: '/upload.php'  // Putanja do PHP skripte za upload
});


/*
We want to preview images, so we need to register the Image Preview plugin
*/
FilePond.registerPlugin(
	
	// encodes the file as base64 data
  FilePondPluginFileEncode,
	
	// validates the size of the file
	FilePondPluginFileValidateSize,
	
	// corrects mobile image orientation
	FilePondPluginImageExifOrientation,
	
	// previews dropped images
  FilePondPluginImagePreview
);

// Select the file input and use create() to turn it into a pond
FilePond.create(
	document.querySelector('input')
);
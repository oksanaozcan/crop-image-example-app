require('./bootstrap');
import Croppie from 'croppie';
import axios from 'axios';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
  // Croppie initialization
  var resize = new Croppie(document.getElementById('upload-demo'), {
    viewport: { width: 100, height: 100 },
    boundary: { width: 300, height: 300 },
    showZoomer: false,
    enableResize: true,
    enableOrientation: true,
    mouseWheelZoom: 'ctrl'     
  });

  // Event listener for file input change
  document.getElementById('images').addEventListener('change', function() {     
      var reader = new FileReader();
      reader.onload = function (e) {
          resize.bind({
              url: e.target.result
          }).then(function() {
              console.log('success bind image');
          });
      };
      reader.readAsDataURL(this.files[0]);
  });



  document.getElementById('image-upload').addEventListener('click', function() {
    resize.result('blob').then(function(blob) {  
        var extension = '';
        // Determine file extension based on blob type
        switch (blob.type) {
            case 'image/jpeg':
                extension = 'jpg';
                break;
            case 'image/png':
                extension = 'png';
                break;
            case 'image/gif':
                extension = 'gif';
                break;
            // Add more cases for other image types if needed
            default:
                console.error('Unsupported image type:', blob.type);
                return; // Exit function if unsupported type
        }
        // Generate file name with the determined extension
        var filename = 'cropped_image.' + extension;

        var formData = new FormData();
        formData.append('croppedImage', blob, filename);

        // Fetch CSRF token from meta tag
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

        // Send cropped image blob using Axios
        axios.post('/upload-image', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': csrfToken // Include CSRF token in the request headers
            }
        })
        .then(function(response) {
            // Handle response
            console.log(response);
        })
        .catch(function(error) {
            // Handle error
            console.error(error);
        });
    });
});
  


});


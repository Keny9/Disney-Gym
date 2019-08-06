// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
}

// Éléments pour prendre la photo
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

// Prendre une photo et l'Afficher sur le canvas
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 400, 300);

});

/**
 * S'occupe de télécharger l'image du canvas
*/
function downloadCanvas(link, canvasId, filename) {
    link.href = document.getElementById(canvasId).toDataURL();
    link.download = filename;
}

document.getElementById('download').addEventListener('click', function() {
  downloadCanvas(this, 'canvas', 'Photo.png');

}, false);

/**
 * The event handler for the link's onclick event. We give THIS as a
 * parameter (=the link element), ID of the canvas and a filename.
*/
document.getElementById('btn_confirmer').addEventListener('click', function() {
    var photo = canvas.toDataURL('image/png');
    var nom = document.getElementById('nom').value;
    $.ajax({
      method: 'POST',
      url: '../webcam/scriptUpload.php',
      data: {
        photo: photo,
        nom: nom
      }
    });

}, false);

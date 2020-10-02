let getJSON = function(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status === 200) {
        callback(null, xhr.response);
      } else {
        callback(status, xhr.response);
      }
    };
    xhr.send();
};



let imgTags = document.getElementsByClassName("slideImg");
let thumbnails = document.getElementsByClassName("demo cursor");
var captionText = document.getElementById("caption");
let currentImage = 1;
let count = 0;
let images = [];
let apiurl;
apiurl = 
"https://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key=204df225455ff4bafd6d7bf01c742e3d&photoset_id=72157706275341264&user_id=124478044@N03&gallery&per_page=10&format=json&nojsoncallback=1";

      
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "inline";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
  captionText.innerHTML = imgTags[slideIndex-1].alt;
}
        
  getJSON(apiurl, function(err, data){
    if (err !== null) {
  } else {
      console.log(data.photoset.photo[0]);
      console.log(data.photoset.photo.length);
    // alert('Your query count: ' + data.query.count);
    for(let i = 0; i < data.photoset.photo.length; i++){
        let photoURL = `https://farm${data.photoset.photo[i].farm}.static.flickr.com/${data.photoset.photo[i].server}/${data.photoset.photo[i].id}_${data.photoset.photo[i].secret}.jpg`;
        console.log(photoURL);
    thumbnails[i].setAttribute("alt", data.photoset.photo[i].title);
    images[i] = photoURL;
    imgTags[i].setAttribute("src", images[i]);
    imgTags[i].setAttribute("alt", data.photoset.photo[i].title);
    thumbnails[i].setAttribute("src", images[i]);
    console.log(imgTags);
    }
    captionText.innerHTML = data.photoset.photo[0].title
  }
  
});

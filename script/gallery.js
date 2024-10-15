let imageIndex;
function showImage(ths) {
  let slides1 = document.getElementsByClassName("zoom");
  imageIndex = Array.from(slides1).indexOf(ths) + 1;
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");

  modal.style.display = "block";
  modalImg.src = ths.src;
}
function closeImage() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}
function plusSlideImage(n) {
  showSlidesImage((imageIndex += n));
}

function showSlidesImage(n) {
  let slides = document.getElementsByClassName("zoom");

  if (n > slides.length) {
    imageIndex = 1;
  }
  if (n < 1) {
    imageIndex = slides.length;
  }
  showImage(slides[imageIndex - 1]);
}

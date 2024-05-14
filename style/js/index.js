// Fonction qui servents a montrer les div pour les filtres qui sont cachés

function showBrand() {
    var x = document.getElementById("filter1");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}

function showColor() {
  var x = document.getElementById("filter2");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function showDistance() {
  var x = document.getElementById("filter3");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

/*
var carAnnonces = document.querySelectorAll('.carAnnonce');
carAnnonces.forEach(function(carAnnonce) {
        carAnnonce.addEventListener('click', function() {
        var carId = this.getAttribute('data-carid');
        window.location.href = 'descriptive.php?id=' + carId;
    });
});
*/
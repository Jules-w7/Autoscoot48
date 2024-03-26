var carAnnonces = document.querySelectorAll('.carAnnonce');
carAnnonces.forEach(function(carAnnonce) {
        carAnnonce.addEventListener('click', function() {
        var carId = this.getAttribute('data-carid');
        window.location.href = 'descriptive.php?id=' + carId;
    });
});

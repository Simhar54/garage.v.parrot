fetch('/api/cars')
    .then(response => response.json())
    .then(cars => {
        const carList = document.getElementById('carCardContainer'); 
        console.log(cars);
        cars.forEach(car => {
            const cardCar = addCardCarBootstrap(car.id, car.brand, car.model, car.price, car.year, car.mileage, car.image);
            carList.appendChild(cardCar);
        });
    })
    .catch(error => {
        console.error('Erreur lors de la récupération des voitures:', error);
        // Créer une alerte Bootstrap
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger alert-dismissible fade show';
        alertDiv.setAttribute('role', 'alert');
        alertDiv.innerHTML = `
            Une erreur est survenue lors de la récupération des voitures. Veuillez réessayer plus tard.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        const alertContainer = document.getElementById('alertContainer');
        alertContainer.appendChild(alertDiv);
    });


    //escape html
    function escapeHtml(unsafe) {
        return unsafe.replace(/&/g, "&amp;")
                     .replace(/</g, "&lt;")
                     .replace(/>/g, "&gt;")
                     .replace(/"/g, "&quot;")
                     .replace(/'/g, "&#039;");
    }
    


    function addCardCarBootstrap($id, $brand, $model, $price, $year, $mileage, $image) {
        const cardCar = document.createElement('div');
        cardCar.id = $id;
        cardCar.className = 'card cardCar col col-10 col-lg-2 mt-3 mx-3';
        cardCar.innerHTML = `
            <div class="card-body">
                <img src="../../images/cars/${escapeHtml(String($image))}" class="card-img-top" alt="...">
                <h5 class="card-title">${escapeHtml(String($brand))}</h5>
                <p class="card-text mt-2">${escapeHtml(String($model))}</p>
                <p class="card-text mt-2">Prix: ${escapeHtml(String($price))}€</p>
                <p class="card-text mt-2">Année: ${String($year)}</p>
                <p class="card-text mt-2">Kilométrage: ${String($mileage)}km</p>
                <div class="text-center">
                    <a href="#" class="btn gp_button">Voir le detail</a>
                </div>
               
            </div>
        `;
        return cardCar;
    }

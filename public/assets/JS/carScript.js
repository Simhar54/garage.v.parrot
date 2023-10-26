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
    
        // Ajouter l'alerte à un élément parent, par exemple un élément avec l'ID "alertContainer"
        const alertContainer = document.getElementById('alertContainer');
        alertContainer.appendChild(alertDiv);
    });


    function addCardCarBootstrap($id, $brand, $model, $price, $year, $mileage, $image) {
        const cardCar = document.createElement('div');
        cardCar.id = $id;
        cardCar.className = 'card col col-10 col-lg-3 mt-3 mx-3';
        cardCar.innerHTML = `
            <div class="card-body">
                <img src="../../images/cars/${$image}" class="card-img-top" alt="...">
                <h5 class="card-title">${$brand}</h5>
                <p class="card-text mt-2">${$model}</p>
                <p class="card-text mt-2">Prix: ${$price}€</p>
                <p class="card-text mt-2">Année: ${$year}</p>
                <p class="card-text mt-2">Kilométrage: ${$mileage}km</p>
                <div class="text-center">
                    <a href="#" class="btn gp_button">Voir le detail</a>
                </div>
               
            </div>
        `;
        return cardCar;
    }

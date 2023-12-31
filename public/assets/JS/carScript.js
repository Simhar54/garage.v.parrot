const filterForm = document.getElementById("filterForm");

// Get cars from API
fetch("/api/cars")
  .then((response) => response.json())
  .then((cars) => {
    if (cars.length === 0) {
      // If no car found, create Bootstrap alert
      const alertDiv = document.createElement("div");
      alertDiv.className = "alert alert-warning alert-dismissible fade show mt-3";
      alertDiv.setAttribute("role", "alert");
      alertDiv.innerHTML = `Il n'y a aucune voiture à vendre en ce moment. Veuillez réessayer plus tard."
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
      const alertContainer = document.getElementById("alertContainer");
      alertContainer.appendChild(alertDiv);
    }else{
    // Display cars
    const carList = document.getElementById("carCardContainer");
    cars.forEach((car) => {
      const cardCar = addCardCarBootstrap(
        car.id,
        car.brand,
        car.model,
        car.price,
        car.year,
        car.mileage,
        car.image
      );
      carList.appendChild(cardCar);
    }); }
  })
  .catch((error) => {
    // If error, create Bootstrap alert
    console.error("Erreur lors de la récupération des voitures:", error);
    const alertDiv = document.createElement("div");
    alertDiv.className = "alert alert-danger alert-dismissible fade show mt-3";
    alertDiv.setAttribute("role", "alert");
    alertDiv.innerHTML = `
            Une erreur est survenue lors de la récupération des voitures. Veuillez réessayer plus tard.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
    const alertContainer = document.getElementById("alertContainer");
    alertContainer.appendChild(alertDiv);
  });

// Filter cars
filterForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const formData = new FormData(filterForm);
    const yearMin = formData.get("yearMin");
    const yearMax = formData.get("yearMax");
    const kmMin = formData.get("kmMin");
    const kmMax = formData.get("kmMax");
    const priceMin = formData.get("priceMin");
    const priceMax = formData.get("priceMax");

    fetch(`/api/cars/filter?yearMin=${yearMin}&yearMax=${yearMax}&kmMin=${kmMin}&kmMax=${kmMax}&priceMin=${priceMin}&priceMax=${priceMax}`)
        .then((response) => response.json())
        .then((cars) => {
            if (cars.length === 0) {
               // If no car found, create Bootstrap alert 
                const alertDiv = document.createElement("div");
                alertDiv.className = "alert alert-warning alert-dismissible fade show mt-3";
                alertDiv.setAttribute("role", "alert");
                alertDiv.innerHTML = `
                        Aucun résultat ne correspond à votre recherche.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    `;
                const alertContainer = document.getElementById("alertContainer");
                alertContainer.appendChild(alertDiv);
            } else {
              // If cars found, display them
            const carList = document.getElementById("carCardContainer");
            carList.innerHTML = "";
            cars.forEach((car) => {
                const cardCar = addCardCarBootstrap(
                    car.id,
                    car.brand,
                    car.model,
                    car.price,
                    car.year,
                    car.mileage,
                    car.image
                );
                carList.appendChild(cardCar);
            });}
        })
        .catch((error) => {
            // If error, create Bootstrap alert
            console.error("Erreur lors de la récupération des voitures:", error);
            const alertDiv = document.createElement("div");
            alertDiv.className = "alert alert-danger alert-dismissible fade show mt-3";
            alertDiv.setAttribute("role", "alert");
            alertDiv.innerHTML = `
                    Une erreur est survenue lors de la récupération des voitures. Veuillez réessayer plus tard.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
            const alertContainer = document.getElementById("alertContainer");
            alertContainer.appendChild(alertDiv);
        });



});

//escape html
function escapeHtml(unsafe) {
  return unsafe
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;");
}

function addCardCarBootstrap(
  $id,
  $brand,
  $model,
  $price,
  $year,
  $mileage,
  $image
) {
  const cardCar = document.createElement("div");
  cardCar.id = $id;
  cardCar.className = "card cardCar col col-10 col-sm-4 col-lg-2 mt-3 mx-2";
  cardCar.innerHTML = `
            <div class="card-body">
                <img src="../../images/cars/${escapeHtml(
                  String($image)
                )}" class="card-img-top" alt="...">
                <h5 class="card-title">${escapeHtml(String($brand))}</h5>
                <p class="card-text mt-2">${escapeHtml(String($model))}</p>
                <p class="card-text mt-2">Prix: ${escapeHtml(
                  String($price)
                )}€</p>
                <p class="card-text mt-2">Année: ${String($year)}</p>
                <p class="card-text mt-2">Kilométrage: ${String($mileage)}km</p>
                <div class="text-center">
                  <button class="btn gp_button col-6" data-id="${$id}" onclick="viewDetails(this)">
                    Voir le détail
                  </button>
                </div>
               
            </div>
        `;
  return cardCar;
}

// Redirect to car details page with car id
function viewDetails(element) {
  const id = element.getAttribute('data-id');
  const url = `/car/car_detail/${id}`;
  window.location.href = url;
}


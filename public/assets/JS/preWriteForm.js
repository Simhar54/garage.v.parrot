const subject = document.querySelector("#contact_subject");
const message = document.querySelector("#contact_message");
const modalButtons = document.querySelectorAll(".modal_button");



modalButtons.forEach(function (modalButton) {
  modalButton.addEventListener("click", (event) => {
    const brand = event.currentTarget.getAttribute('data-bran');
    const model = event.currentTarget.getAttribute('data-model');
    subject.value = `${brand} ${model}`;
    message.value = `Bonjour, je suis intéressé par votre annonce pour une ${brand} ${model}.`;
  });
});

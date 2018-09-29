import FormHandler from "./utilis/FormHandler.js";


window.onload = () => {
    let form = document.getElementById("user-from");
    form.onsubmit = (event) => {
        event.preventDefault();
        let formHandler = new FormHandler(form);
        let formData = formHandler.parseToObject();
        console.log(formData);
        let popUp = document.getElementById("pop-up");
        popUp.style.display= "flex";
        

    } 
}
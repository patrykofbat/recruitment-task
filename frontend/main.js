import FormHandler from "./utilis/FormHandler.js";


window.onload = () => {
    let form = document.getElementById("user-from");
    form.onsubmit = (event) => {
        event.preventDefault();
        let formHandler = new FormHandler(form);
        let formJson = formHandler.parseToJson();
        if(formJson){
            fetch("http://localhost/backend/index.php", {
                method:"POST",
                mode: "cors",
                cache: "no-cache",
                body: formHandler.formData
            }).then(response=>response.json())
        }
        else{
            Object.keys(formHandler.errors).forEach((key, index)=>{
                document.getElementById(key+"-error").innerHTML = formHandler.errors[key];
            });
            
        }
        

    } 
}
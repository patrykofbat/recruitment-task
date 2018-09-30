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
            }).then(response => {return response.text()})
                .then(text=>{
                    let popUp = document.getElementById("pop-up");
                    popUp.style.display="flex"
                    document.getElementById("message").innerHTML = text;
                    document.getElementById("exit-pop-up").onclick = (event) =>{
                        popUp.style.display="none";
                    }
                });
        }
        else{
            Object.keys(formHandler.errors).forEach((key, index)=>{
                document.getElementById(key+"-error").innerHTML = formHandler.errors[key];
            });
            
        }
        

    } 
}
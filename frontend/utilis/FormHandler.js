export default class FormHandler {
    
    constructor(form) {
        this.form = form
    }


    parseToObject () {
        let formObject = {};
        let formFields = this.form.elements;

        for(let i = 0; i<formFields.length; i++){
            if(formFields[i].type !== "submit") {
                formObject[formFields[i].id] = formFields[i].value;
            }
        }

        return formObject;

    }

    validateForm(){
        
    }
}
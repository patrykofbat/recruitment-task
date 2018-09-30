export default class FormHandler {
    
    constructor(form) {
        this.form = form
        this.errors = {};
        this.formData = new FormData(form);
    }


    parseToJson () {
        let formJson = {};
        let formFields = this.form.elements;

        for(let i = 0; i<formFields.length; i++){
            if(formFields[i].type !== "submit") {
                formJson[formFields[i].id] = formFields[i].value;
            }
        }

        this.validate(formJson);

        if(Object.keys(this.errors).length === 0)
            return formJson;
    }

    validate(data){
        let fileFormat = /.+\.jpg|jpeg|png/;

        if(!data.name)
            this.errors.name = "Pole nie może być puste";
        if(!fileFormat.test(data.file) && data.file.length !== 0)
            this.errors.file = "Dozwolony format pliku to jpg, jpeg, png";
        
    }

}
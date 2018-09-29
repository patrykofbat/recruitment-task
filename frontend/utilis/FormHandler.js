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

        if(!data.login)
            this.errors.login = "Pole nie może być puste";
        if(!data.password)
            this.errors.password = "Pole nie może być puste";
        if(data.password !== data.rePassword)
            this.errors.rePassword = "Hasła nie są identyczne";
        if(!data.name)
            this.errors.name = "Pole nie może być puste";
        if(!fileFormat.test(data.file))
            this.errors.file = "Dozwolony format pliku to jpg, jpeg, png";
        
    }

}
class Errors {
    constructor() {
        this.errors = {};
    }

    get(field) {
        if(this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        this.errors = errors;
    }

    clear(field) {
        if(field) {
            Vue.delete(this.errors, field);
        } else {
            this.errors = {};
        }  
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }
}

class Form {
    constructor(data) {
        this.originalData = data;

        for(let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }

    reset() {
        for(let field in this.originalData) {
            this[field] = "";
        }
    }

    submit(requestType, url) {
        axios[requestType](url, this.data())
            .then(this.onSucces.bind(this))
            .catch(this.onFail.bind(this))
    }

    onSucces(response) {
        alert(response.data.message);

        this.errors.clear();
        this.reset();
    }

    onFail(error) {
        this.errors.record(error.response.data.errors);
    }
}

new Vue ({
    el:"#app",

    data: {
        form: new Form({
            name: "",
            description: ""
        })
    },

    methods: {
        onSubmit() {
            this.form.submit("post", "/projects");
        }
    }
})
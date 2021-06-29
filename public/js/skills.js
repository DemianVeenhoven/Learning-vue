// Vue.prototype.$http = axios; can use as this.$http;

new Vue ({
    el: "#skills",
 
    data: {
        skills: []
    },
 
    mounted() {
         axios.get("/skills-array").then(response => this.skills = response.data);
    }
 });
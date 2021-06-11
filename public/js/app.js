// Vue.prototype.$http = axios; can use as this.$http;

new Vue ({
   el: "#root",

   data: {
       skills: []
   },

   mounted() {
        axios.get("/skills-array").then(response => this.skills = response.data);
   }
});
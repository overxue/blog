import App from './App.vue'
import Vue from 'vue'
import router from './router'

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router,
    render: (h) => h(App)
});

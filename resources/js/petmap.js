require('./bootstrap');

window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);


import Axios from 'axios';
import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDm1FatN00SfUdSbsPvCH3Ru_05PsLK9WA'
    }
});

const app = new Vue({
    el: '#app',
    data() {
        alert('');
        return {
            
            marker: [],
            infoWindowOptions: {
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            },
            activeRestaurant: {},
            infoWindowOpened: false
        }
    },
    created() {
        alert('');
        Axios.get('/api/pets')
            .then((response) => this.marker = response.data)
            .catch((error) => console.error(error));
    },
    methods: {
        getPosition(r) {
            alert('');
            return {
                lat: parseFloat(r.latitude),
                lng: parseFloat(r.longitude)
            }

        }
    }
});


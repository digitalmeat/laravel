import Vue from 'vue'

// components
import Reservation from './components/Reservation.vue';

import router from './router/router'
import store from './store/store';

import helpers from './includes/helpers.js';

Vue.config.productionTip = false;

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: {Reservation}
})

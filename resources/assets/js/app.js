/**
 * Created by jhonzya on 1/17/17.
 */

require('./bootstrap.js');

import Vue from 'vue';
import App from './components/App.vue';
import router from './router';

const app = new Vue({
  el: '#wrapper',
  router,
  render: h => h(App)
});
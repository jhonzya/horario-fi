/**
 * Created by jhonzya on 1/17/17.
 */

require('./bootstrap');
require('./inspinia');

import Vue from 'vue';
import VueResource from 'vue-resource';
import router from './router';
import App from './components/App.vue';

Vue.use(VueResource);
Vue.http.options.root = $('meta[name=_path]').attr('content') + '/api/v1';
Vue.http.interceptors.push((request, next) => {
    request.headers.set('Authorization', 'Bearer '+localStorage.getItem('_token'));
    next();
});

const app = new Vue({
  el: '#wrapper',
  router,
  render: h => h(App)
});
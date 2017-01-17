/**
 * Created by jhonzya on 1/17/17.
 */

import Vue from 'vue';
import VueRouter from 'vue-router';

import Welcome from '../components/Welcome.vue';

const routes = [
  { path: '/', component: Welcome, name: 'welcome' }
];

Vue.use(VueRouter);

export default new VueRouter({
  routes
});
/**
 * Created by jhonzya on 1/17/17.
 */

import Vue from 'vue';
import VueRouter from 'vue-router';

import Horario from '../components/Horario.vue';

const routes = [
  { path: '/', component: Horario, name: 'horario' }
];

Vue.use(VueRouter);

export default new VueRouter({
  routes
});
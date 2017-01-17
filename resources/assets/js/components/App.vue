<template>

  <div id="page-wrapper" class="gray-bg">
    <!-- Page wrapper -->
    <navbar-component></navbar-component>

    <!-- Main view  -->
    <router-view></router-view>

    <!-- Footer -->
    <footer-component></footer-component>
  </div>

</template>

<script>
  /**
   * Created by jhonzya on 1/17/17.
   */

  import FooterComponent from './partials/Footer.vue';
  import NavbarComponent from './partials/TopNavbar.vue';

  export default{
    components: {FooterComponent, NavbarComponent}
  }

</script>
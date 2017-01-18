<template>

  <div id="page-wrapper" class="gray-bg">
    <!-- Page wrapper -->
    <navbar-component @login="login"></navbar-component>

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
    components: {FooterComponent, NavbarComponent},

    created(){
      $.ajaxSetup({ cache: true });
      $.getScript('//connect.facebook.net/en_US/sdk.js', () => {
        FB.init({
          appId: '1146037498761455',
          version: 'v2.7' // or v2.1, v2.2, v2.3, ...
        });
        $('#loginbutton,#feedbutton').removeAttr('disabled');

        FB.getLoginStatus((response) => {
          this.statusChangeCallback(response);
        });
      });
    },

    methods: {
      login(){
        FB.login((response) => {
          this.statusChangeCallback(response);
        });
      },

      statusChangeCallback(response){
        console.log(response);

        if (response.status === 'connected') {
          // Logged into your app and Facebook.
          this.testAPI();
        } else if (response.status === 'not_authorized') {
          // The person is logged into Facebook, but not your app.
          console.log("Inicia sesión en Horario FI");
        } else {
          // The person is not logged into Facebook, so we're not sure if
          // they are logged into this app or not.
          console.log("Inicia sesión en Facebook");
        }
      },

      testAPI(){
        FB.api('/me', function(response) {
          console.log('Successful login for: ' + response.name);
          console.log(response);
        });
      }
    }
  }

</script>
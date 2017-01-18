<template>

  <div id="page-wrapper" class="gray-bg">
    <!-- Page wrapper -->
    <navbar-component @login="login" @logout="logout" :usuario="usuario"></navbar-component>

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

    data(){
      return {
        usuario: {
          id: null,
          nombre: null,
          correo: null,
          avatar: null,
          invitado: true
        }
      }
    },

    created(){
      console.log($('meta[name="_token"]').attr('content'));

      $.ajaxSetup({ cache: true });
      $.getScript('//connect.facebook.net/en_US/sdk.js', () => {
        FB.init({
          appId: '1146037498761455',
          version: 'v2.7'
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

      logout(){
        console.log("Cerrando sesión...");
        FB.logout((response) => {
          this.statusChangeCallback(response);
        });
      },

      statusChangeCallback(response){
        if (response.status === 'connected') {
          this.getProfile();
        } else if (response.status === 'not_authorized') {
          this.createFakeProfile();
        } else {
          this.createFakeProfile();
        }
      },

      getProfile(){
        FB.api('/me?fields=email,id,name,picture',(response) => {
          this.usuario = {
            id: response.id,
            nombre: response.name,
            correo: response.email,
            avatar: response.picture.data.url,
            invitado: false
          }
        });
      },

      createFakeProfile(){
        this.usuario = {
          invitado: true,
          nombre: 'Invitado'
        };
      }
    }
  }

</script>
<template>

  <div id="page-wrapper" class="gray-bg">
    <!-- Page wrapper -->
    <navbar-component @login="login" @logout="logout" :usuario="usuario"></navbar-component>

    <!-- Main view  -->
    <router-view :asignaturas="asignaturas" :usuario="usuario"></router-view>

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
        asignaturas: [],
        usuario: {
          token: null,
          nombre: 'Invitado',
          correo: null,
          avatar: null,
          invitado: true,
          guardado: false
        }
      }
    },

    created(){
      localStorage.removeItem('_token');

      this.$http.get('asignaturas').then((response) => {
        this.asignaturas = response.body;
      });

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
        FB.logout((response) => {
          this.usuario.guardado = false;
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
          var usuario = {
            token: response.id,
            nombre: response.name,
            correo: response.email,
            avatar: response.picture.data.url,
            invitado: false
          };

          this.saveUser(usuario);
        });
      },

      createFakeProfile(){
        var usuario = {
          token: $('meta[name="_token"]').attr('content'),
          invitado: true,
          nombre: 'Invitado'
        };

        this.saveUser(usuario);
      },

      saveUser(usuario){
        this.$http.post('save', usuario).then((response) => {
          localStorage.setItem('_token', response.body._token);

          this.usuario = response.body.usuario;
          this.usuario.guardado = true;
        }, (error) => {
          console.log(error.body);
        });
      }

    }
  }

</script>
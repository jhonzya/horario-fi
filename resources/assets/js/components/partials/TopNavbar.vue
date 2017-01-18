<template>
  <div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
      <div class="navbar-header">
        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
          <i class="fa fa-reorder"></i>
        </button>
        <router-link tag="span" :to="{ name: 'horario' }" active-class="active">
          <a class="navbar-brand"> Horario FI</a>
        </router-link>
      </div>
      <div class="navbar-collapse collapse" id="navbar">
        <a class="btn btn-success btn-facebook btn-outline btn-sm navbar-btn navbar-right" @click.prevent="login">
          <i class="fa fa-facebook"> </i> Log in with Facebook
        </a>

        <ul class="nav navbar-top-links navbar-right">
          <li>
            <a href="#">
              <i class="fa fa-sign-out"></i> Log out
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
  /**
   * Created by jhonzya on 1/17/17.
   */

  export default{

    methods: {
      login(){
        this.$emit('login');
      }
    }

  }
</script>
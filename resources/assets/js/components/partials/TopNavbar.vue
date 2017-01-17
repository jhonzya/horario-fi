<template>
  <div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
      <div class="navbar-header">
        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
          <i class="fa fa-reorder"></i>
        </button>
        <a href="#" class="navbar-brand">Horario FI</a>
      </div>
      <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav">
          <router-link tag="li" :to="{ name: 'welcome' }" active-class="active">
            <a aria-expanded="false" role="button"> Welcome</a>
          </router-link>

          <li class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
              <li><a href="">Menu item</a></li>
              <li><a href="">Menu item</a></li>
              <li><a href="">Menu item</a></li>
              <li><a href="">Menu item</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
              <li><a href="">Menu item</a></li>
              <li><a href="">Menu item</a></li>
              <li><a href="">Menu item</a></li>
              <li><a href="">Menu item</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
              <li><a href="">Menu item</a></li>
              <li><a href="">Menu item</a></li>
              <li><a href="">Menu item</a></li>
              <li><a href="">Menu item</a></li>
            </ul>
          </li>
        </ul>
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

  export default{}
</script>
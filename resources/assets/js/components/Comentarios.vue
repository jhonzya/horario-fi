<template>
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>
            Comentarios y sugerencias de profesores
          </h5>
        </div>
        <div class="ibox-content ibox-heading">
          <h3>{{ asignatura.nombre }} <small>Clave: {{ asignatura.clave }}</small></h3>
        </div>
        <div class="ibox-content">
          <div class="fb-comments"
               data-width="100%" data-numposts="5" order_by="reverse_time">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default{
    props: {
      asignatura: {type: Object, required: true}
    },

    mounted(){
      this.FBParse();
    },

    methods: {
      FBParse(){
        var $div = $(this.$el).find(".fb-comments");
        $div.attr( 'data-href', "http://horario.amico.mx/"+this.asignatura.clave );

        FB.XFBML.parse();
      }
    },

    watch: {
      asignatura(){
        this.FBParse();
      }
    }
  }
</script>
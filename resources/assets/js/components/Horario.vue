<template>

  <div class="wrapper wrapper-content  animated fadeIn">

    <div class="row">

      <div class="col-sm-4">

        <!-- BÚSQUEDA DE ASIGNATURAS -->
        <div class="ibox">
          <div class="ibox-title">
            <h5>Asignaturas</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="form-group">
              <select v-model="busqueda" name="asignatura" id="asignatura" class="input form-control" style="width: 100%">
                <option v-for="asignatura in asignaturas" :value="asignatura.id" v-text="asignatura.nombre"></option>
              </select>
            </div>
            <button type="button" class="btn btn btn-primary btn-sm" :disabled="!busqueda" @click.prevent="buscar">
              <i class="fa fa-search"></i>
              Buscar
            </button>

          </div>
        </div>
        <!-- BÚSQUEDA DE ASIGNATURAS -->

        <!-- RESULTADOS -->
        <div class="ibox float-e-margins" v-show="grupos.length > 0">
          <div class="ibox-title">
            <h5>Resultados</h5>
          </div>
          <div class="ibox-content ibox-heading" v-if="grupos.length > 0">
            <h3>{{ grupos[0].ASIGNATURA }}</h3>
            <small>Clave: {{ grupos[0].CLAVE }} - Grupos: {{ grupos.length }}</small>
          </div>
          <div class="ibox-content resultados">
            <div class="feed-activity-list">

              <div v-for="grupo in grupos" class="feed-element">
                <div>
                  <small class="pull-right text-navy">{{ grupo.VACANTES }} vacantes</small>
                  <strong v-text="grupo.PROFESOR_A_"></strong>
                  <div class="text-muted" v-text="formato(grupo)"></div>
                  <div class="actions">
                    <div class="pull-right">
                      <a v-if="valida(grupo)" class="btn btn-xs btn-outline btn-primary" @click.prevent="inscribir(grupo)">
                        <i class="fa fa-plus"></i>
                        Agregar
                      </a>
                      <a v-else class="btn btn-xs btn-outline btn-warning" @click.prevent="salir(grupo)">
                        <i class="fa fa-minus"></i>
                        Salir
                      </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- RESULTADOS -->
      </div>

      <div class="col-sm-8">
        <div class="tabs-container">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Calendario</a></li>
            <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Tabla</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
              <div class="panel-body">
                <calendario :inscritas="inscritas"></calendario>
              </div>
            </div>
            <div id="tab-2" class="tab-pane">
              <div class="panel-body tabla">
                <inscritas :inscritas="inscritas" @salir="salir"></inscritas>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Estática
              <small class="m-l-sm">Comentarios y sugerencias de profesores</small>
            </h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            Comentarios de facebook
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  /**
   * Created by jhonzya on 1/17/17.
   */

  import Inscritas from './Inscritas.vue';
  import Calendario from './Calendario.vue';

  export default{

    components: {Inscritas, Calendario},

    props: {
      asignaturas: {type: Array, required: true}
    },

    data(){
      return{
        busqueda: null,
        grupos: [],
        inscritas: []
      }
    },

    created(){
      this.$http.get('asignatura/inscritas').then((response) => {
        this.inscritas = response.body;
      }, (error) => {
        console.log(error.body);
      });
    },

    mounted(){
      let $asignatura = $(this.$el).find('#asignatura');
      $asignatura.select2({
        placeholder: "Selecciona una asignatura"
      });
      $asignatura.on("select2:select", (evt) => {
        this.busqueda = evt.params.data.id;
      });

      $('.resultados').slimScroll({
        height: '455px'
      });

      $('.tabla').slimScroll({
        height: '733px'
      });
    },

    methods: {
      buscar(){
        this.grupos = [];

        this.$http.get('asignatura/buscar', {params: {id: this.busqueda}}).then((response) => {
          this.grupos = response.body;
        }, (error) => {
          console.log(error.body);
        });
      },

      formato(grupo){
        var inicio = ("00000" + grupo.INICIO).slice(-4);
        var fin = ("00000" + grupo.FIN).slice(-4);

        inicio = inicio.slice(0,2)+":"+inicio.slice(2);
        fin = fin.slice(0,2)+":"+fin.slice(2);

        var horarios = "Horario: ";
        if(grupo.LUN == "*") horarios += "Lun-";
        if(grupo.MAR == "*") horarios += "Mar-";
        if(grupo.MIE == "*") horarios += "Mie-";
        if(grupo.JUE == "*") horarios += "Jue-";
        if(grupo.VIE == "*") horarios += "Vie-";
        if(grupo.SAB == "*") horarios += "Sáb-";
        horarios = horarios.slice(0, -1);
        horarios += " / "+inicio+"-"+fin+", ";

        horarios += grupo.TIPO == "T" ?  "Teoría, " : "Laboratorio, ";
        horarios += "Grupo: "+grupo.GRUPO;

        return horarios;
      },

      inscribir(grupo){
        this.$http.post('asignatura', grupo).then((response) => {
          this.inscritas = _.union(this.inscritas, response.body);
        });
      },

      valida(grupo){
        var res = _.find(this.inscritas, (inscrita) => {
              return (inscrita.grupo == grupo.GRUPO && inscrita.asignatura.clave == grupo.CLAVE);
            });

        return ! _.isObject(res);
      },

      salir(grupo){
        this.$http.delete('asignatura', {params: grupo}).then((response) => {
          _.each(response.body.grupos, (grupo) => {
            var index = _.findIndex(this.inscritas, {'id': grupo});
            if(index >= 0)
                this.inscritas.splice(index, 1);
          });
        }, (error) => {
          console.log(error.body);
        });
      }
    }

  }
</script>
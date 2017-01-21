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
                      <a class="btn btn-xs btn-outline btn-primary" @click.prevent="inscribir(grupo)">
                        <i class="fa fa-plus"></i>
                        Agregar
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
                <div id="calendar"></div>
              </div>
            </div>
            <div id="tab-2" class="tab-pane">
              <div class="panel-body tabla">
                <table class="table table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Data</th>
                    <th>User</th>
                    <th>Value</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td><span class="pie" style="display: none;">0.52,1.041</span><svg class="peity" height="16" width="16"><path d="M 8 8 L 8 0 A 8 8 0 0 1 14.933563796318165 11.990700825968545 Z" fill="#1ab394"></path><path d="M 8 8 L 14.933563796318165 11.990700825968545 A 8 8 0 1 1 7.999999999999998 0 Z" fill="#d7d7d7"></path></svg></td>
                    <td>Samantha</td>
                    <td class="text-navy"> <i class="fa fa-level-up"></i> 40% </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><span class="pie" style="display: none;">226,134</span><svg class="peity" height="16" width="16"><path d="M 8 8 L 8 0 A 8 8 0 1 1 2.2452815972907922 13.55726696367198 Z" fill="#1ab394"></path><path d="M 8 8 L 2.2452815972907922 13.55726696367198 A 8 8 0 0 1 7.999999999999998 0 Z" fill="#d7d7d7"></path></svg></td>
                    <td>Jacob</td>
                    <td class="text-warning"> <i class="fa fa-level-down"></i> -20% </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><span class="pie" style="display: none;">0.52/1.561</span><svg class="peity" height="16" width="16"><path d="M 8 8 L 8 0 A 8 8 0 0 1 14.933563796318165 11.990700825968545 Z" fill="#1ab394"></path><path d="M 8 8 L 14.933563796318165 11.990700825968545 A 8 8 0 1 1 7.999999999999998 0 Z" fill="#d7d7d7"></path></svg></td>
                    <td>Damien</td>
                    <td class="text-navy"> <i class="fa fa-level-up"></i> 26% </td>
                  </tr>
                  </tbody>
                </table>
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

  export default{

    props: {
      asignaturas: {type: Array, required: true}
    },

    data(){
      return{
        busqueda: null,
        grupos: []
      }
    },

    mounted(){
      let $asignatura = $(this.$el).find('#asignatura');
      $asignatura.select2({
        placeholder: "Selecciona una asignatura"
      });
      $asignatura.on("select2:select", (evt) => {
        this.busqueda = evt.params.data.id;
      });

      $('#calendar').fullCalendar({
        defaultView: 'agendaWeek',
        columnFormat: 'dddd',
        allDaySlot: false,
        slotDuration: '00:30:00',
        lang: 'es',
        contentHeight: 660,
        header: {
          left: '',
          right: ''
        },
        minTime: '07:00',
        maxTime: '23:00',
        hiddenDays: [0]
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
        this.$http.post('asignatura/inscribir', grupo).then((response) => {
          console.log(response.body);
        });
      }
    }

  }
</script>
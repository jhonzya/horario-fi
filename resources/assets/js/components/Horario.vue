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
            <p>
              Busca por Clave o Nombre
            </p>
            <div class="input-group">
              <input v-model="busqueda" autofocus type="text" placeholder="Buscar asignatura" class="input form-control">
              <span class="input-group-btn">
                <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
              </span>
            </div>
          </div>
        </div>
        <!-- BÚSQUEDA DE ASIGNATURAS -->

        <!-- RESULTADOS -->
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Resultados</h5>
          </div>
          <div class="ibox-content ibox-heading">
            <h3><i class="fa fa-envelope-o"></i> Estática</h3>
            <small><i class="fa fa-tim"></i> 17 grupos para esta materia.</small>
          </div>
          <div class="ibox-content resultados">
            <div class="feed-activity-list">

              <div class="feed-element">
                <div>
                  <small class="pull-right text-navy">5 vacantes</small>
                  <strong>Monica Smith</strong>
                  <div class="small text-muted">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                  </div>
                  <div class="actions">
                    <a class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus"></i> Inscribir </a>
                  </div>
                </div>
              </div>

              <div class="feed-element">
                <div>
                  <small class="pull-right text-navy">5 vacantes</small>
                  <strong>Monica Smith</strong>
                  <div class="small text-muted">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                  </div>
                  <div class="actions">
                    <a class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus"></i> Inscribir </a>
                  </div>
                </div>
              </div>

              <div class="feed-element">
                <div>
                  <small class="pull-right text-navy">5 vacantes</small>
                  <strong>Monica Smith</strong>
                  <div class="small text-muted">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                  </div>
                  <div class="actions">
                    <a class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus"></i> Inscribir </a>
                  </div>
                </div>
              </div>

              <div class="feed-element">
                <div>
                  <small class="pull-right text-navy">5 vacantes</small>
                  <strong>Monica Smith</strong>
                  <div class="small text-muted">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                  </div>
                  <div class="actions">
                    <a class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus"></i> Inscribir </a>
                  </div>
                </div>
              </div>

              <div class="feed-element">
                <div>
                  <small class="pull-right text-navy">5 vacantes</small>
                  <strong>Monica Smith</strong>
                  <div class="small text-muted">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                  </div>
                  <div class="actions">
                    <a class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus"></i> Inscribir </a>
                  </div>
                </div>
              </div>

              <div class="feed-element">
                <div>
                  <small class="pull-right text-navy">5 vacantes</small>
                  <strong>Monica Smith</strong>
                  <div class="small text-muted">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                  </div>
                  <div class="actions">
                    <a class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus"></i> Inscribir </a>
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
        busqueda: ''
      }
    },

    computed: {
      resultados(){
        if(this.busqueda.toString().length < 2) return [];

        return _.filter(this.asignaturas, (item) => {
          return (item.clave == this.busqueda || item.nombre.indexOf(this.busqueda.toUpperCase()) >= 0)
        });
      }
    },

    mounted(){
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
        height: '468px'
      });

      $('.tabla').slimScroll({
        height: '733px'
      });
    }

  }
</script>
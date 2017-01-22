<template>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Clave</th>
        <th>Asignatura</th>
        <th>Grupo</th>
        <th>Profesor</th>
        <th>Horario</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="inscrita in inscritas">
        <td class="text-white" v-text="inscrita.asignatura.clave" :style="'background-color:' + inscrita.pivot.color"></td>
        <td v-text="inscrita.asignatura.nombre"></td>
        <td v-text="inscrita.grupo"></td>
        <td v-text="inscrita.profesor"></td>
        <td v-text="formato(inscrita)"></td>
        <td>
          <a class="btn btn-xs btn-outline btn-warning" @click.prevent="salir(inscrita)">
            <i class="fa fa-minus"></i>
            Salir
          </a>
        </td>
      </tr>
    </tbody>
  </table>

</template>

<script>

  export default{

    props: {
      inscritas: {type: Array, required: true}
    },

    methods: {
      salir(inscrita){
        this.$emit('salir', {
          CLAVE: inscrita.asignatura.clave,
          TIPO: inscrita.asignatura.tipo,
          GRUPO: inscrita.grupo
        });
      },

      formato(inscrita){
        var inicio = inscrita.inicio.slice(0,5);
        var fin = inscrita.fin.slice(0,5);

        var horarios = "Horario: ";
        if(inscrita.lunes) horarios += "Lun-";
        if(inscrita.martes) horarios += "Mar-";
        if(inscrita.miercoles) horarios += "Mie-";
        if(inscrita.jueves) horarios += "Jue-";
        if(inscrita.viernes) horarios += "Vie-";
        if(inscrita.sabado) horarios += "Sáb-";
        horarios = horarios.slice(0, -1);
        horarios += " / "+inicio+"-"+fin+", ";

        horarios += inscrita.asignatura.tipo == "T" ?  "Teoría, " : "Laboratorio, ";
        horarios += "Grupo: "+inscrita.grupo;

        return horarios;
      }
    }

  }

</script>

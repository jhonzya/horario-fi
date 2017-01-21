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
        <td v-text="inscrita.asignatura.clave"></td>
        <td v-text="inscrita.asignatura.nombre"></td>
        <td v-text="inscrita.grupo"></td>
        <td v-text="inscrita.profesor"></td>
        <td>Horario</td>
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
      }
    }

  }

</script>

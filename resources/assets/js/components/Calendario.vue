<template>
  <div></div>
</template>

<script>

  export default{

    props: {
      inscritas: {type: Array, required: true}
    },

    mounted(){

      $(this.$el).fullCalendar({
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
    },

    watch: {
      inscritas(){
        $(this.$el).fullCalendar('removeEvents');

        _.each(this.inscritas, (inscrita) => {
          var evento = {
            id: inscrita.id,
            title: inscrita.asignatura.nombre +" - "+inscrita.grupo,
            backgroundColor: inscrita.pivot.color,
            borderColor: inscrita.pivot.color,
            textColor: '#fff'
          };
          _.each(inscrita.eventos, (dia) => {
            evento.start = moment(dia.inicio).format();
            evento.end = moment(dia.fin).format();
            $(this.$el).fullCalendar('renderEvent', evento);

            evento.start = moment(dia.inicio).add(1, 'w').format();
            evento.end = moment(dia.fin).add(1, 'w').format();
            $(this.$el).fullCalendar('renderEvent', evento);

            evento.start = moment(dia.inicio).subtract(1, 'w').format();
            evento.end = moment(dia.fin).subtract(1, 'w').format();
            $(this.$el).fullCalendar('renderEvent', evento);
          });
        });

      }
    }

  }
</script>

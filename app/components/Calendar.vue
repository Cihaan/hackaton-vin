<script>
import FullCalendar from '@fullcalendar/vue3'
import interactionPlugin from '@fullcalendar/interaction'
import timeGridPlugin from '@fullcalendar/timegrid'

export default {
  components: {
    FullCalendar
  },
  props: {
    workshopEvents: {
      type: Array,
      default: null,
      required: true
    }
  },
  data() {
    return {
      calendarOptions: {
        plugins: [interactionPlugin, timeGridPlugin],
        displayEventTime: true,
        initialView: 'timeGridWeek',
        editable: false,
        initialEvents: this.workshopEvents,
      }
    }
  },
  mounted() {
    console.log("ici enft", this.workshopEvents)
    this.calendarOptions.initialEvents = this.workshopEvents
    console.log(this.calendarOptions.initialEvents)
  }
}

</script>

<template>
  <FullCalendar v-if="workshopEvents !== null" :options='calendarOptions' />
</template>

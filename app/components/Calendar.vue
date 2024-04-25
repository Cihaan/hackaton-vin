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
        timeZone: 'UTC',
        plugins: [interactionPlugin, timeGridPlugin],
        initialView: 'timeGridWeek',
        nowIndicator: true,
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

<template>
  <div>
    <form @submit.prevent>
      <div class="garden_container">
        <div class="child" v-for="i in watermelons">
          <input
              v-bind:class="{clicked_watermelon: i.clicked}"
              v-if="bed !== 0 && i.status_id === 1"
              type="submit"
              v-on:click="checkForClicked(i); $emit('make-order', selected_watermelons, cut_into_slices)"
              v-model="i.weight"
              title="Watermelon is green"
              class="watermelon_not_ready"
          >
          <input
              v-bind:class="{clicked_watermelon: i.clicked}"
              v-else-if="bed !== 0 && i.status_id === 2"
              type="submit"
              v-on:click="checkForClicked(i); $emit('make-order', selected_watermelons, cut_into_slices)"
              v-model="i.weight"
              title="Watermelon is ready"
          >
          <input
              v-else
              type="submit"
              title="Already ripped off"
              class="not-available"
          >
        </div>

        <div class="child" v-show="bed === 0" v-for="i in 4">
          <input
              type="submit"
              class="not-available"
              title="Please, select a garden bed"
          >
        </div>
      </div>
    </form>
    <input type="checkbox" id="cut_slices" value="Cut"
           v-show="bed !== 0"
           v-on:change="cut_into_slices = !cut_into_slices; $emit('make-order', selected_watermelons, cut_into_slices)">
    <label v-show="bed !== 0"
           for="cut_slices"> Cut into slices</label><br>
  </div>
</template>

<script>
export default {
  props: {
    watermelons: {
      type: Object,
      required: true
    },
    bed: Number
  },
  data() {
    return {
      clicked: 0,
      selected_watermelons: [],
      cut_into_slices: false
    }
  },
  methods: {
    checkForClicked(item) {
      if (!item.clicked) {
        if (this.clicked < 3) {
          item.clicked = true
          this.selected_watermelons.push(item)
          this.clicked++
        }
      } else {
        item.clicked = false
        this.selected_watermelons.splice(this.selected_watermelons.indexOf(item), 1)
        this.clicked--;
      }
    }
  }
}
</script>

<style scoped>
input[type='submit'] {
  min-width: 100%;
  font-size: smaller;
}

input:hover {
  background-color: #bf4147;
}

div {
  margin-bottom: 10%;
}

.not-available {
  border-color: darkgrey;
  color: lightgrey;
  background-color: lightgrey;
}

.not-available:hover {
  background-color: lightgrey;
}

form {
  justify-content: center;
  width: 100%;
}

.garden_container {
  margin-bottom: 3%;
  width: 20%;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}

.clicked_watermelon {
  background-color: #007944;
}

.child {
  margin-bottom: 1%;
  margin-inline: 3%;
  min-width: 17%;
  max-width: 17%;
}

.watermelon_not_ready:hover {
  background-color: lightgreen;
}

@media only screen and (max-width: 500px) {
  .garden_container {
    flex: 2;
  }
}
</style>
<template>
  <form @submit.prevent>
    <input
        type="submit"
        v-for="bed in garden_bed"
        v-bind:class="{clicked_garden_bed: bed.clicked}"
        v-model="bed.id"
        v-on:click="$emit('pass-watermelons', bed); bed.clicked = !bed.clicked;"
    >
  </form>
</template>

<script>
export default {
  props: {
    garden_bed: {
      type: Object,
      required: true
    }
  }
}
</script>

<style>
form {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

input[type='submit'] {
  color: #007944;
  background-color: transparent;
  border: 3px solid #007944;
  margin-inline: 1%;
  max-width: 3%;
  font-size: x-large;
  border-radius: 6px;
  text-align: center;
  justify-content: center;
}

input:hover {
  background-color: lightgrey;
}

.clicked_garden_bed {
  background-color: lightgrey;
}
</style>
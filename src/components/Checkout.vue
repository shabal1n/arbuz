<template>
  <div class="container">
    <div class="check">
      <h2>Your order:</h2>
      <hr>
      <h3>Items:</h3>
      <ul>
        <li
            v-for="melon in selected_watermelons"
        >
          Watermelon from garden bed #{{ melon.garden_bed_id }}, position #{{ melon.position }} and weight
          {{ melon.weight }} &emsp; &emsp; {{ Math.floor(watermelon_price_per_kg * melon.weight * 10) / 10 }} KZT
        </li>
      </ul>
      <h4>Additional options:</h4>
      <h5>Cut to slice &emsp; &emsp; {{ cut_slices_price * selected_watermelons.length }}</h5>
      <hr>
      <h3>Total: {{ total }}</h3>
    </div>
    <input type="button" value="Submit order">
  </div>
</template>

<script>
export default {
  props: {
    selected_watermelons: {
      type: Object,
      required: true
    },
    cut_slices: Boolean
  },
  data() {
    return {
      total: 0,
      cut_slices_price: 590,
      watermelon_price_per_kg: 610
    }
  },
  methods: {
    countTotal() {

    }
  }
}
</script>

<style scoped>
.container {
  display: flex;
  text-align: center;
  flex-direction: column;
  justify-content: center;
}

.check {
  width: 30%;
  height: 20%;
  border: 1px solid black;
  text-align: left;
  margin: 0 auto;
}

input[type='button'] {
  border: 3px solid #007944;
  background-color: transparent;
  color: #007944;
  border-radius: 6px;
  width: 10%;
  font-size: large;
  margin: 5% auto;
  font-family: 'Dancing Script', cursive;
}

input[type='button']:hover {
  background-color: lightgrey;
}

hr {
  border: 1px dashed black;
}

ul {
  text-align: left;
}

h2 {
  text-align: center;
}

h3, h4, h5 {
  margin-left: 5%;
}

@media screen and (max-width: 500px) {
  .check {
    width: 50%;
    height: 20%;
    border: 1px solid black;
    text-align: left;
    margin: 0 auto;
  }

  input[type='button'] {
    border: 3px solid #007944;
    background-color: transparent;
    color: #007944;
    border-radius: 6px;
    width: 30%;
    font-size: large;
    font-family: 'Dancing Script', cursive;
  }

  li {
    font-size: x-small;
  }
}
</style>
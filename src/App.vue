<template>
  <Header/>
  <h2>Please, choose the garden bed</h2>
  <GardenBed
      v-bind:garden_bed="garden_beds"
      @pass-watermelons="passWatermelons"
  />
  <h2>Choose the watermelon</h2>
  <Watermelons
      v-bind:watermelons="current_bed_watermelons"
      v-bind:bed="current_bed_capacity"
      @make-order="makeOrder"
  />
  <Checkout
      v-bind:selected_watermelons="selected_watermelons"
      v-bind:cut_slices="cut_slices"
      @open-modal="showModal"
  />
  <Modal
      v-show="isModalVisible"
      @close="closeModal"
      @submit-order="submitOrder"
      />
</template>

<script>
import Header from '@/components/Header'
import GardenBed from '@/components/GardenBed'
import Watermelons from "@/components/Watermelons";
import Checkout from '@/components/Checkout'
import Modal from '@/components/Modal'

export default {
  name: 'App',
  data() {
    return {
      garden_beds: [
        {id: 1, capacity: 8, curr_available: 11, clicked: false},
        {id: 2, capacity: 16, curr_available: 1, clicked: false},
        {id: 3, capacity: 20, curr_available: 15, clicked: false},
        {id: 4, capacity: 24, curr_available: 0, clicked: false}
      ],
      watermelons: [
        {id: 1, garden_bed_id: 1, position: 1, weight: 3.22, status_id: 1, clicked: false},
        {id: 2, garden_bed_id: 1, position: 2, weight: 1.22, status_id: 2, clicked: false},
        {id: 3, garden_bed_id: 1, position: 3, weight: 2.22, status_id: 3, clicked: false},
        {id: 4, garden_bed_id: 1, position: 4, weight: 4.22, status_id: 1, clicked: false},
        {id: 5, garden_bed_id: 1, position: 5, weight: 5.22, status_id: 2, clicked: false},
        {id: 6, garden_bed_id: 1, position: 6, weight: 4.22, status_id: 1, clicked: false},
        {id: 7, garden_bed_id: 1, position: 7, weight: 4.22, status_id: 1, clicked: false},
        {id: 8, garden_bed_id: 1, position: 8, weight: 4.22, status_id: 1, clicked: false},
      ],
      current_bed_watermelons: [],
      current_bed_capacity: 0,
      watermelon_statuses: [
        {id: 1, name: 'Green'},
        {id: 2, name: 'Ripe'},
        {id: 3, name: 'Taken'},
      ],
      selected_watermelons: [],
      cut_slices: false,
      isModalVisible: false
    }
  },
  components: {
    Header,
    GardenBed,
    Watermelons,
    Checkout,
    Modal
  },
  methods: {
    passWatermelons(bed) {
      this.current_bed_watermelons = this.watermelons.filter(t => t.garden_bed_id === bed.id)
      this.current_bed_capacity = bed.capacity
    },
    makeOrder(watermelons, slices) {
      this.selected_watermelons = watermelons
      this.cut_slices = slices
    },
    showModal() {
      this.isModalVisible = true;
    },
    closeModal() {
      this.isModalVisible = false;
    },
    submitOrder() {
      const listOfIds = [];
      for (let i = 0; i < this.selected_watermelons.length; i++) {
        listOfIds.push(this.selected_watermelons[i].id);
      }
      for (let i = 0; i < this.watermelons.length; i++) {
        if (listOfIds.includes(this.watermelons[i].id)) {
          this.watermelons[i].status_id = 3;
        }
      }
    }
  }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  justify-content: center;
}

h2 {
  font-family: 'Dancing Script', cursive;
  margin-top: 5%;
}
</style>

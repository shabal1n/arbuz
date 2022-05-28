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
  />
  <!--  <AddTodoComponent-->
  <!--    @add-todo="addTodo"-->
  <!--  />-->
  <!--  <TodoList-->
  <!--      v-bind:todos="todos"-->
  <!--      @remove-todo="removeToDo"-->
  <!--  />-->
</template>

<script>
import Header from '@/components/Header'
import GardenBed from '@/components/GardenBed'
import Watermelons from "@/components/Watermelons";

import TodoList from '@/components/TodoList'
import AddTodoComponent from '@/components/AddTodoComponent'

export default {
  name: 'App',
  data() {
    return {
      todos: [
        {id: 1, title: "Купить хлеб", completed: false},
        {id: 2, title: "Купить муку", completed: false},
        {id: 3, title: "Купить яйца", completed: false},
      ],
      garden_beds: [
        {id: 1, capacity: 12, curr_available: 11},
        {id: 2, capacity: 16, curr_available: 1},
        {id: 3, capacity: 18, curr_available: 15},
        {id: 4, capacity: 22, curr_available: 0}
      ],
      watermelons: [
        {id: 1, garden_bed_id: 1, position: 1, weight: 3.22, status_id: 1},
        {id: 2, garden_bed_id: 1, position: 2, weight: 1.22, status_id: 2},
        {id: 3, garden_bed_id: 1, position: 3, weight: 2.22, status_id: 3},
        {id: 4, garden_bed_id: 1, position: 4, weight: 4.22, status_id: 1},
        {id: 5, garden_bed_id: 1, position: 5, weight: 5.22, status_id: 2}
      ],
      current_bed_watermelons: [],
      current_bed_capacity: 0
    }
  },
  components: {
    Header,
    GardenBed,
    Watermelons,
    AddTodoComponent,
    TodoList
  },
  // mounted() {
  //   fetch('https://jsonplaceholder.typicode.com/todos')
  //       .then(response => response.json())
  //       .then(json => {
  //         this.todos = json
  //       })
  // },
  methods: {
    passWatermelons(bed) {
      this.current_bed_watermelons = this.watermelons.filter(t => t.garden_bed_id === bed.id)
      this.current_bed_capacity = bed.capacity
    },
    removeToDo(id) {
      this.todos = this.todos.filter(t => t.id !== id)
    },
    addTodo(todo) {
      this.todos.push(todo)
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

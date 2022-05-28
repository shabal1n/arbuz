<template>
  <form>
    <input
        type="submit"
        v-for="i in bed"
    >
  </form>
</template>

<script>
export default {
  props: {
    watermelons: {
      type: Object,
      required: true
    },
    bed: Number
  }
}
</script>

<style scoped>
input {
  color: transparent;
}

input:hover {
  background-color: #bf4147;
}
</style>
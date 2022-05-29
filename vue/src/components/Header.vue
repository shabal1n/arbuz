<template>
  <div class="header">
    <div class="rounded_background">
      <h1>Fresh watermelons</h1>
    </div>
  </div>
</template>

<style scoped>
.header {
  width: 100%;
  height: 400px;
  display: flex;
  justify-content: center;
  margin-bottom: 5%;
}

.rounded_background {
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
  background-color: #d66f7f;
  width: 90%;
  height: 100%;
  line-height: 400px;
}

h1 {
  color: #007944;
  font-family: 'Dancing Script', cursive;
}

@media screen and (min-width: 401px) {
  h1 {
    font-size: 40px;
  }
}

@media screen and (max-width: 400px) {
  h1 {
    font-size: 30px;
  }
}
</style>
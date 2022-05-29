<template>
  <div class="modal-backdrop">
    <div class="modal">
      <div class="modal-header">
        <button
            type="button"
            class="btn-close"
            @click="close"
        >
          x
        </button>
      </div>

      <div class="elements_container">
        <div class="input_container">
          <label for="name">Your name:</label>
          <input required v-model="full_name" type="text" id="name" placeholder="Your name">
        </div>
        <div class="input_container">
          <label for="mail">Your address:</label>
          <input required v-model="address" type="text" id="mail" placeholder="Arbuz str., 12 buil., 34 ap.">
        </div>
        <div class="input_container">
          <label for="number">Your number:</label>
          <label for="number" style="margin-right: 1px">+7</label>
          <input required v-model="number" @input="validatePhone" type="text" id="number" placeholder="(708)909-9017">
        </div>
        <div class="input_container">
          <label for="date">Delivery date:</label>
          <input
              required type="date" id="date"
              :min="getMinYear">
        </div>
        <div class="input_container">
          <button
              v-on:click="validateFields"
              id="order">Order</button>
        </div>
        <span class="error" v-show="msg !== ''">{{msg}}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Modal',
  methods: {
    close() {
      this.$emit('close');
    },
    validateFields() {
      if (this.full_name !== "" && this.address !== "" && (this.number !== "" && this.number.charAt(1) === '7')) {
        this.msg = 'Order created successfully!';
        this.close();
      } else {
        if (this.full_name === "") {
          this.msg = 'Please enter a valid name';
        } else if (this.address === "") {
          this.msg = 'Please enter a valid address';
        } else if (this.number === "" || this.number.charAt(1) !== '7') {
          this.msg = 'Please enter a valid phone number(Number should start with 7)'
        }
      }
    },
    validatePhone() {
      const num = this.number.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
      this.number = !num[2] ? num[1] : '(' + num[1] + ') ' + num[2] + (num[3] ? '-' + num[3] : '');
    },
    submitOrder() {
      this.$emit('submit-order')
    },
    getMinYear() {
      const d = new Date();
      const date_string = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
      return date_string;
    }
  },
  data() {
    return {
      full_name: "",
      address: "",
      number: "",
      date: new Date(),
      msg: ""
    }
  }
};
</script>


<style scoped>
.error {
  color: red;
}
#order {
  background-color: transparent;
  border: 3px solid #007944;
  border-radius: 6px;
  color: #007944;
  width: 20%;
}

#order:hover {
  background-color: lightgreen;
}
label {
  margin-right: 2%;
}
.input_container {
  margin-bottom: 2%;
  display: flex;
  flex-direction: row;
  justify-content: center;
}

input {
  width: 40%;
  border: 3px solid #007944;
  border-radius: 6px;
}

.elements_container {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  justify-content: center;
}

.modal-backdrop {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.3);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal {
  background: #FFFFFF;
  width: 50%;
  height: 50%;
  box-shadow: 2px 2px 20px 1px;
  overflow-x: auto;
  display: flex;
  flex-direction: column;
}

.modal-header {
  padding: 20px;
  margin-bottom: 3%;
  display: flex;
  background-color: #007944;
}

.modal-header {
  position: relative;
  border-bottom: 1px solid #eeeeee;
  color: #4AAE9B;
  justify-content: space-between;
}


.btn-close {
  position: absolute;
  top: 0;
  right: 0;
  border: none;
  font-size: 20px;
  padding: 10px;
  cursor: pointer;
  font-weight: bold;
  color: #4AAE9B;
  background: transparent;
}
</style>
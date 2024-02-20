<script setup>
import { ref } from "vue";
</script>

<template>
  <div class="email-orders">
    <div class="eo-input">
      <input type="text" v-model="email" placeholder="Inserisci Email" />
      <button @click="fetchOrders">Fetch Orders</button>
    </div>
    <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
    <div v-if="orders.length > 0">
      <h2>Recent Orders</h2>
      <ul>
        <li v-for="order in orders" :key="order.id">
          {{ order.id }} - {{ order.date }}
        </li>
      </ul>
    </div>
    <div v-else-if="orders.length == 0">
      <p>Ordini recenti non trovati.</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      orders: [],
      errorMessage: ''
    };
  },
  methods: {
    async fetchOrders() {
      try {
        const response = await fetch("/api/orders", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ email: this.email }),
        });
        if (!response.ok) {
          throw new Error("Errore nella richiesta effettuata");
        }
        const data = await response.json();

        if (data.message) {
          this.errorMessage = data.message;
        } else {
          this.orders = data.orders;
          this.errorMessage = "";
        }
      } catch (error) {
        console.error(error);
        this.errorMessage = error.message;
      }
    },
  },
};
</script>

<style scoped>
.eo-input {
  display: flex;
  font-family: "Lyon Text OSF Web", Georgia, "Times New Roman", Times, serif;
  gap: 2rem;
}

.eo-input button {
  border-radius: 0;
  padding: 8px 44px;
  font-size: 18px;
  font-weight: normal;
  margin-top: 0;
  margin-right: 10px;
  color: #007bb5;
  text-decoration: none;
  background-color: transparent;
  cursor: pointer;
  border: solid 1px #007bb5;
}

.eo-input input {
  width: 100%;
  background: #f5f4f4;
  border: none;
  color: #999790;
  border-radius: 0;
  padding: 8px 20px;
  font-size: 18px;
  font-weight: normal;
  margin-top: 0;
  line-height: 30px;
  display: flex;
}
</style>

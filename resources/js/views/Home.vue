<template>
  <div>
    <h1>Home</h1>
    <p>Counter: {{ counter }}</p>
    <button @click="increment">Tambah</button>
  </div>
</template>

<script setup>
import { useMainStore } from '../store'
const { counter, increment } = useMainStore()
</script>

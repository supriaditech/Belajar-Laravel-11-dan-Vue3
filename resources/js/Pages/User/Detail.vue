<script setup>
defineProps({
  user: {
    type: Object,
    require: true,
  },
})
</script>

<template>
  <p>ID : {{ user.id }}</p>
  <p>Nama : {{ user.nama }}</p>
</template>

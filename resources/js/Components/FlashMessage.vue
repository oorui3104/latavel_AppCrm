<script setup> 
</script>

<template>
  <div v-if="$page.props.flash.status === 'success'" class=" text-white bg-blue-400 p-4 text-center w-1/3 mx-auto my-4">
  {{ $page.props.flash.message }}
  </div> 
  <div v-if="$page.props.flash.status === 'error'" class=" text-white bg-red-400 p-4 text-center w-1/3 mx-auto my-4">
  {{ $page.props.flash.message }}
  </div> 
</template>
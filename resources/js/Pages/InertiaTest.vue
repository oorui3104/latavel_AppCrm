<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>

  nertiaテストです。<br>
<a href="/">aタグでWelcomeに移動</a><br> 
<Link href="/" as="button">LinkでWelcomeに移動</Link>

</template>
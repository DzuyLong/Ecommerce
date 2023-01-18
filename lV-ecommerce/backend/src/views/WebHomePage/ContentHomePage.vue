<template>
<Slider />
<section id="content" class="flex md:justify-between md:flex-nowrap flex-wrap">
<ContentLeft />
<router-view></router-view>
</section>
</template>

<script setup>  
import ProductsContent from './contentsite/ProductContent.vue';
import Slider from './contentsite/Slider.vue';
import ContentLeft from './contentsite/ContentLeft.vue'
</script>
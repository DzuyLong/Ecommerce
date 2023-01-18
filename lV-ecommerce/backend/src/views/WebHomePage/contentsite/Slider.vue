<template>
    <section id="slider">
        <Swiper  class=" border-gray-500 w-full mb-10 "
                 :effect="'coverflow'" 
                 :speed=500
                 :centeredSlides="true"
                 :slidesPerView="'auto'"
                 :coverflowEffect="{
                        rotate: 5,
                        stretch: 0,
                        depth: 150,
                        modifier: 4,
                        slideShadows: true,
                        }"
                :modules="modules"
                :space-between="50"
                :loop="true"
                    navigation
                :pagination="{clickable:true}"
                :autoplay="{delay:99999, disableOnInteraction: false, pauseOnMouseEnter: true}"          
        >
        <SwiperSlide v-for="(text, index) in swiperTextBase" :key="text.index" class="relative 
        before:w-full before:h-full before:absolute before:rounded-md">
            <div class="slide-img">
                <img :src="text.img" alt="image" class="md:w-[20rem] md:h-[25rem] w-[15rem] h-[20rem] 
                rounded-lg object-cover" />
                <button class="btn-buy-now absolute top-1/2 left-1/2  
                z-20 bg-transparent hover:bg-amber-400 text-white font-bold md:py-4 md:px-8 py-2 px-6 border-b-4 
                 border-2 border-amber-200 hover:border-amber-600 hover:text-slate-900 rounded">
                <a class="text-sm md:text-[18px]">Buy Now</a>
            </button>
            </div>
            <div class="absolute top-0 right-0 bottom-0 left-0 z-10">
                <h1 class="text-price md:text-4xl text-2xl top-1 left-[77%] text-amber-400 absolute md:left-[75%] font-extrabold">{{ text.price }}</h1>
                <div class="absolute bottom-0 left-4">
                <h1 class="text-title md:text-4xl text-2xl text-white font-semibold">{{ text.author }}</h1>
                <div class="rating flex items-center gap-1 md:gap-3 mt-1 mb-2">
                        <svg aria-hidden="true" class="md:w-7 md:h-7 h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg aria-hidden="true" class="md:w-7 md:h-7 h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg aria-hidden="true" class="md:w-7 md:h-7 h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg aria-hidden="true" class="md:w-7 md:h-7 h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg aria-hidden="true" class="md:w-7 md:h-7 h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <span class=" text-white md:text-3xl text-2xl font-bold px-1.5 md:px-2.5 mb-3 md:mb-0 rounded">5.0</span>
                    </div>
                </div>     
            </div>
        </SwiperSlide>
        </Swiper>
    </section>
</template>
  <script>
   import { Swiper, SwiperSlide } from 'swiper/vue';
   import { Autoplay, Pagination, Navigation ,EffectCoverflow} from 'swiper';
   import 'swiper/css';
   import 'swiper/css/pagination';
   import 'swiper/css/navigation';
  import 'swiper/css/scrollbar';
   import {ref} from 'vue';
   export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
       
   const swiperTextBase = ref([
    {
    author: 'elon Musk',
    price: '25$',
    description: 'sadaaaaaaaaaaa',
    img: 'https://images.ctfassets.net/hrltx12pl8hq/7yQR5uJhwEkRfjwMFJ7bUK/dc52a0913e8ff8b5c276177890eb0129/offset_comp_772626-opt.jpg?fit=fill&w=800&h=300' 
    },
    {
    author: 'elon Musk',
    price: '25$',
    description: 'sadaaaaaaaaaaa',
    img: 'https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg' 
    },    
    {
    author: 'elon Musk',
    price: '25$',
    description: 'sadaaaaaaaaaaa',
    img: 'https://media.istockphoto.com/id/1322277517/photo/wild-grass-in-the-mountains-at-sunset.jpg?s=612x612&w=0&k=20&c=6mItwwFFGqKNKEAzv0mv6TaxhLN3zSE43bWmFN--J5w=' 
    }    
    
   ]);
   return { modules: [Pagination, Autoplay, Navigation, EffectCoverflow], swiperTextBase}
}
}
  </script>
  <style>
/* .swiper-button-prev {
    left: 58% !important;
    transform: translateX(58%);
} */
.btn-buy-now{
    opacity: 0;
    transform: translate(-50%,50%) ;
}
.swiper-slide:hover .btn-buy-now{
    opacity: 1;
    transform: translate(-50%,-50%) ;
    transition: ease-in;
    transition-duration: 300ms;
}
.slide-img img{
    box-shadow: 2px 3px 5px -1px #00000085;
}
.swiper-slide:hover::before{
    background-color: #0000006b;
}
.swiper-slide:hover .text-price{
    opacity: 0.5;
}
.swiper-slide:hover .text-title{
    opacity: 0.5;
}
.swiper-slide:hover .rating{
    opacity: 0.5;
}
.swiper-slide{
    width: 20rem !important;
    height: 25rem !important;
}
@media (max-width:768px) {
    .swiper-slide {
    width: 15rem !important;
    height: 20rem !important;
  }
}
.swiper-pagination {
    position: relative;
    bottom: 0 !important;
    filter: drop-shadow(2px 4px 6px black);
    margin-top: 15px;
    cursor: default;
}
.swiper-pagination .swiper-pagination-bullet{
    height: 14px;
    width: 14px;
    cursor: pointer;
}
.swiper-pagination-bullet.swiper-pagination-bullet-active {
    background: #e7b430a8;
}
</style>
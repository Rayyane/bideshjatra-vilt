<script setup lang="ts">
const heroBgUrl = '/pexels-bydresla-18197918.jpg'
const heroImgUrl = '/alex-quezada-e1zjPaFFTDY-unsplash.jpg'
</script>

<template>
    <section id="home" class="hero flex min-h-[680px] items-center bg-cover bg-center px-5 pb-16 pt-28 sm:px-8 md:min-h-screen md:px-10" :style="{
        backgroundImage: `linear-gradient(to bottom, rgba(19, 104, 124, 0.9), rgba(252, 150, 39, 0.9)), url('${heroBgUrl}')`
    }">
        <div class="container mx-auto grid w-full max-w-6xl grid-cols-1 items-center gap-12 md:grid-cols-2">

            <div class="flex flex-col justify-center space-y-6 text-center md:text-left">
                <h1 class="text-4xl font-extrabold tracking-wide text-gray-300 sm:text-5xl lg:text-6xl font-montserrat">
                    <span class="text-brand-secondary">Your Gateway</span> <br> <span
                        class="text-shadow-brand text-shadow-lg">to the World</span>
                </h1>
                <p class="text-xl text-gray-100 text-shadow-md/20 text-shadow-brand-secondary max-w-md mx-auto md:mx-0">
                    Explore new destinations, secure your visa, and travel with confidence through expert guidance from
                    Bidesh Jatra.
                </p>
                <div class="flex items-center justify-center gap-4 md:justify-start">
                    <button
                        class="rounded-lg bg-brand-secondary border border-brand-secondary px-6 py-3 font-medium text-white hover:bg-transparent transition">
                        Get Started
                    </button>
                    <button
                        class="rounded-lg border border-brand px-6 py-3 font-medium text-gray-300 hover:bg-brand hover:text-white transition">
                        Learn More
                    </button>
                </div>
            </div>

            <div class="hidden md:flex items-center justify-center md:justify-end">
                <div class="relative w-4/5 max-w-sm md:w-full md:max-w-md lg:max-w-lg">

                    <img :src="heroImgUrl" alt="Hero Image"
                        class="hero-image-dissolve aspect-[4/5] w-full object-cover" />

                </div>
            </div>

        </div>
    </section>
</template>

<style scoped>
.hero-image-dissolve {
    border-radius: 1rem;
    opacity: 1;
    -webkit-mask-image:
        linear-gradient(to top right, transparent 0%, #000 15%, #000 70%, transparent 100%),
        linear-gradient(to bottom right, transparent 0%, #000 30%, #000 75%, transparent 100%),
        linear-gradient(to right, transparent 0%, #000 20%, #000 85%, transparent 100%),
        linear-gradient(to bottom, transparent 0%, #000 20%, #000 90%, transparent 100%),
        radial-gradient(ellipse at center, #000 58%, transparent 95%);
    -webkit-mask-composite: source-in;
    mask-image:
        linear-gradient(to top right, transparent 0%, #000 15%, #000 70%, transparent 100%),
        linear-gradient(to bottom right, transparent 0%, #000 30%, #000 75%, transparent 100%),
        linear-gradient(to right, transparent 0%, #000 20%, #000 85%, transparent 100%),
        linear-gradient(to bottom, transparent 0%, #000 20%, #000 90%, transparent 100%),
        radial-gradient(ellipse at center, #000 58%, transparent 95%);
    mask-composite: intersect;
    filter: saturate(1.04) contrast(1.03);
}
</style>

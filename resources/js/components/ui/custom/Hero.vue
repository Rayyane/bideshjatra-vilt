<script setup lang="ts">
import FlightSearchForm from '@/components/ui/custom/FlightSearchForm.vue';

const heroBgUrl = '/pexels-bydresla-18197918.jpg'
const heroImgUrl = '/alex-quezada-e1zjPaFFTDY-unsplash.jpg'
const openContactModal = () => window.dispatchEvent(new Event('open-contact-modal'));
</script>

<template>
    <section id="home" class="hero flex items-start bg-cover bg-center px-5 pb-10 pt-24 sm:px-8 sm:pt-28 md:px-10 lg:min-h-screen lg:items-center lg:px-0 lg:pb-16" :style="{
        backgroundImage: `linear-gradient(to bottom, rgba(19, 104, 124, 0.9), rgba(252, 150, 39, 0.9)), url('${heroBgUrl}')`
    }">
        <div class="mx-auto grid w-full max-w-7xl grid-cols-1 items-center gap-1 lg:grid-cols-2 lg:px-8">

            <div class="flex flex-col justify-center space-y-4 text-center lg:-mt-28 lg:space-y-6 lg:text-left">
                <h1 class="font-montserrat text-3xl font-extrabold tracking-wide text-gray-300 sm:text-4xl lg:text-6xl">
                    <span class="text-brand-secondary">
                        Your Gateway
                    </span>
                    <span class="text-shadow-brand text-shadow-lg">
                        to the World
                    </span>
                </h1>
                <p class="mx-auto hidden text-xl text-gray-100 text-shadow-md/20 text-shadow-brand-secondary lg:block lg:mx-0">
                    Explore new destinations, secure your visa, and travel with confidence through expert guidance from
                    Bidesh Jatra.
                </p>
                <div class="flex items-center justify-center gap-3 lg:justify-start lg:gap-4">
                    <button
                        class="rounded-lg border border-brand-secondary bg-brand-secondary px-4 py-2.5 text-sm font-medium text-white transition hover:bg-transparent sm:px-6 sm:py-3 sm:text-base"
                        @click="openContactModal">
                        Get Started
                    </button>
                    <a href="#highlights"
                        class="rounded-lg border border-brand px-4 py-2.5 text-sm font-medium text-gray-300 transition hover:bg-brand hover:text-white sm:px-6 sm:py-3 sm:text-base">
                        Learn More
                    </a>
                </div>
                <FlightSearchForm class="mt-3 w-full lg:hidden" title-id="mobile-flight-search-title" />
            </div>

            <div class="hidden items-center justify-center lg:flex lg:justify-end lg:-mt-28">
                <div class="relative w-3/6">

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

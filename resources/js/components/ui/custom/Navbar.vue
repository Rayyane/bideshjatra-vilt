<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';

const isScrolled = ref<boolean>(false);

const handleScroll = () => {
    isScrolled.value = window.scrollY > 50;
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

const navItems: string[] = ["Home", "Destinations", "Packages", "Contact Us"];

</script>

<template>
    <nav :class="[
        'fixed top-0 left-0 w-full z-50 transition-color duration-300', isScrolled ? 'bg-white shadow-md' : 'bg-transparent']">

        <div class="flex items-center justify-between max-w-7xl px-8 py-4 mx-auto w-full">
            <div class="shrink-0">
                <img src="/bidesh_jatra_logo.png" alt="Bidesh Jatra Logo" class="h-14 w-auto" />
            </div>

            <div class="flex items-center justify-center gap-8 flex-1">
                <a v-for="item in navItems" :key="item" href="#" class="text-gray-800 hover:text-brand-secondary transition-colors duration-300">
                    {{ item }}
                </a>
            </div>

            <div class="shrink-0">
                <button class="px-6 py-2 rounded-lg font-medium transition-opacity duration-300 hover:opacity-90 bg-brand-primary">
                    Customize my Trip
                </button>
            </div>
        </div>
    </nav>
</template>
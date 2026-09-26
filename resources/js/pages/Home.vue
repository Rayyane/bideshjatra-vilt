<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from '@/components/ui/custom/Navbar.vue';
import Hero from '@/components/ui/custom/Hero.vue';
import LandingSections from '@/components/ui/custom/LandingSections.vue';
</script>

<template>
    <Head title="Bidesh Jatra | Your Gateway to the World" />
    <div class="min-h-screen overflow-x-hidden bg-white">
        <Navbar />
        <Hero />
        <LandingSections />
        <footer class="bg-slate-950 px-5 py-7 text-center text-sm text-slate-300">
            (c) {{ new Date().getFullYear() }} Bidesh Jatra. Travel with confidence.
        </footer>
    </div>
</template>

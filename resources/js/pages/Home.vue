<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from '@/components/ui/custom/Navbar.vue';
import Hero from '@/components/ui/custom/Hero.vue';
import LandingSections from '@/components/ui/custom/LandingSections.vue';
import EnquiryModals from '@/components/ui/custom/EnquiryModals.vue';
import SiteFooter from '@/components/ui/custom/SiteFooter.vue';
</script>

<template>
    <Head title="Bidesh Jatra | Your Gateway to the World" />
    <div class="min-h-screen overflow-x-hidden bg-white">
        <Navbar />
        <Hero />
        <LandingSections />
        <EnquiryModals />
        <SiteFooter />
    </div>
</template>

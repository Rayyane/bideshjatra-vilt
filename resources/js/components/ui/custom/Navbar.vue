<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';

const isScrolled = ref(false);
const menuOpen = ref(false);
const navItems = [
    { label: 'Home', href: '#home' },
    { label: 'Destinations', href: '#destinations' },
    { label: 'Packages', href: '#packages' },
    { label: 'Contact Us', href: '#contact' },
];

const handleScroll = () => {
    isScrolled.value = window.scrollY > 32;
};

onMounted(() => window.addEventListener('scroll', handleScroll, { passive: true }));
onUnmounted(() => window.removeEventListener('scroll', handleScroll));
</script>

<template>
    <header :class="['fixed inset-x-0 top-0 z-50 transition-colors duration-300', isScrolled || menuOpen ? 'bg-white text-slate-900 shadow-md' : 'bg-transparent text-white']">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 sm:px-8" aria-label="Main navigation">
            <a href="#home" class="shrink-0" aria-label="Bidesh Jatra home" @click="menuOpen = false">
                <img src="/bidesh_jatra_logo.png" alt="Bidesh Jatra" class="h-18 w-auto sm:h-[4.5rem] md:h-18" :class="isScrolled || menuOpen ? '' : 'brightness-0 invert'" />
            </a>

            <div class="hidden items-center gap-8 lg:flex">
                <a v-for="item in navItems" :key="item.label" :href="item.href" class="text-sm font-semibold transition-colors hover:text-brand-secondary">{{ item.label }}</a>
            </div>

            <a href="#contact" class="hidden rounded-lg bg-brand-primary px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-secondary lg:inline-flex">Customize my Trip</a>

            <button
                type="button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-current/20 lg:hidden"
                :aria-expanded="menuOpen"
                aria-controls="mobile-navigation"
                :aria-label="menuOpen ? 'Close navigation menu' : 'Open navigation menu'"
                @click="menuOpen = !menuOpen"
            >
                <svg v-if="!menuOpen" viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                <svg v-else viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" d="m6 6 12 12M18 6 6 18" /></svg>
            </button>
        </nav>

        <div v-if="menuOpen" id="mobile-navigation" class="border-t border-slate-100 bg-white px-5 pb-5 pt-2 text-slate-900 shadow-lg lg:hidden">
            <a v-for="item in navItems" :key="item.label" :href="item.href" class="block rounded-lg px-3 py-3 font-medium hover:bg-orange-50 hover:text-brand-primary" @click="menuOpen = false">{{ item.label }}</a>
            <a href="#contact" class="mt-2 block rounded-lg bg-brand-primary px-4 py-3 text-center font-semibold text-white" @click="menuOpen = false">Customize my Trip</a>
        </div>
    </header>
</template>

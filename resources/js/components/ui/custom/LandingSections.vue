<script setup lang="ts">
import { ref } from 'vue';

const tripType = ref<'round-trip' | 'one-way'>('round-trip');
</script>

<template>
    <main>
        <section class="relative z-10 mx-auto -mt-10 max-w-6xl px-5 sm:-mt-14 sm:px-8" aria-labelledby="flight-search-title">
            <form class="rounded-2xl bg-white p-5 shadow-[0_18px_55px_rgba(15,55,64,0.16)] ring-1 ring-slate-900/5 sm:p-8" @submit.prevent>
                <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Start your journey</p>
                        <h2 id="flight-search-title" class="mt-1 text-2xl font-bold text-slate-900 sm:text-3xl">Find your next flight</h2>
                    </div>
                    <div class="inline-flex rounded-full bg-slate-100 p-1" aria-label="Trip type">
                        <button type="button" :aria-pressed="tripType === 'round-trip'" :class="['rounded-full px-4 py-2 text-sm font-semibold', tripType === 'round-trip' ? 'bg-brand-primary text-white shadow-sm' : 'text-slate-600']" @click="tripType = 'round-trip'">Round trip</button>
                        <button type="button" :aria-pressed="tripType === 'one-way'" :class="['rounded-full px-4 py-2 text-sm font-semibold', tripType === 'one-way' ? 'bg-brand-primary text-white shadow-sm' : 'text-slate-600']" @click="tripType = 'one-way'">One way</button>
                    </div>
                </div>
                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-6">
                    <label class="rounded-xl border border-slate-200 px-4 py-3 focus-within:border-brand-primary"><span class="block text-xs font-semibold text-slate-500">From</span><input required name="origin" autocomplete="off" placeholder="City or airport" class="mt-1 w-full border-0 bg-transparent p-0 text-sm font-semibold text-slate-900 outline-none placeholder:font-normal placeholder:text-slate-400 focus:ring-0" /></label>
                    <label class="rounded-xl border border-slate-200 px-4 py-3 focus-within:border-brand-primary"><span class="block text-xs font-semibold text-slate-500">To</span><input required name="destination" autocomplete="off" placeholder="Where to?" class="mt-1 w-full border-0 bg-transparent p-0 text-sm font-semibold text-slate-900 outline-none placeholder:font-normal placeholder:text-slate-400 focus:ring-0" /></label>
                    <label class="rounded-xl border border-slate-200 px-4 py-3 focus-within:border-brand-primary"><span class="block text-xs font-semibold text-slate-500">Departure</span><input required type="date" name="departure" class="mt-1 w-full border-0 bg-transparent p-0 text-sm font-semibold text-slate-900 outline-none focus:ring-0" /></label>
                    <label v-if="tripType === 'round-trip'" class="rounded-xl border border-slate-200 px-4 py-3 focus-within:border-brand-primary"><span class="block text-xs font-semibold text-slate-500">Return</span><input required type="date" name="return" class="mt-1 w-full border-0 bg-transparent p-0 text-sm font-semibold text-slate-900 outline-none focus:ring-0" /></label>
                    <label class="rounded-xl border border-slate-200 px-4 py-3 focus-within:border-brand-primary"><span class="block text-xs font-semibold text-slate-500">Travellers</span><select name="travellers" class="mt-1 w-full border-0 bg-transparent p-0 text-sm font-semibold text-slate-900 outline-none focus:ring-0"><option>1 traveller</option><option>2 travellers</option><option>3 travellers</option><option>4+ travellers</option></select></label>
                    <button type="submit" class="min-h-14 rounded-xl bg-brand-secondary px-6 font-bold text-white transition hover:bg-brand-primary sm:col-span-2 lg:col-span-1">Search flights</button>
                </div>
                <p class="mt-4 text-xs text-slate-500">Our travel team can help you compare routes and plan with confidence.</p>
            </form>
        </section>

        <section id="destinations" class="mx-auto max-w-7xl px-5 py-20 sm:px-8 sm:py-24">
            <div class="mb-9 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                <div><p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Go somewhere memorable</p><h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Popular destinations</h2></div>
                <a href="#contact" class="font-semibold text-brand-primary hover:text-brand-secondary">Plan a custom trip <span aria-hidden="true">→</span></a>
            </div>
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <article class="group relative min-h-72 overflow-hidden rounded-2xl bg-slate-900">
                    <img src="/alex-quezada-e1zjPaFFTDY-unsplash.jpg" alt="A scenic travel destination" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/10 to-transparent"></div><div class="absolute inset-x-0 bottom-0 p-6 text-white"><p class="text-sm font-medium text-white/75">Explore beyond the familiar</p><h3 class="mt-1 text-2xl font-bold">Asia & the tropics</h3></div>
                </article>
                <article class="flex min-h-72 flex-col justify-between rounded-2xl bg-brand-primary p-7 text-white"><span class="text-4xl" aria-hidden="true">✈</span><div><p class="text-sm font-medium text-white/75">Handpicked travel ideas</p><h3 class="mt-2 text-2xl font-bold">Find the right journey for you</h3><p class="mt-3 max-w-sm leading-relaxed text-white/85">From a quick getaway to a long-awaited adventure, our team can help shape your plans.</p></div><a href="#contact" class="mt-6 font-semibold text-white underline decoration-white/50 underline-offset-4">Talk to a travel expert</a></article>
                <article id="packages" class="flex min-h-72 flex-col justify-between rounded-2xl border border-slate-200 bg-orange-50 p-7 sm:col-span-2 lg:col-span-1"><span class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Travel, made easier</span><div><h3 class="text-2xl font-bold text-slate-900">More than a ticket</h3><p class="mt-3 leading-relaxed text-slate-600">Get support with flights, visa guidance and the details that make travelling abroad feel simpler.</p></div><a href="#contact" class="mt-6 inline-flex w-fit rounded-lg bg-brand-secondary px-5 py-3 font-semibold text-white hover:bg-brand-primary">Explore our services</a></article>
            </div>
        </section>

        <section id="contact" class="bg-slate-50 px-5 py-16 sm:px-8 sm:py-20">
            <div class="mx-auto flex max-w-7xl flex-col gap-8 md:flex-row md:items-center md:justify-between"><div class="max-w-2xl"><p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Here for every step</p><h2 class="mt-2 text-3xl font-bold text-slate-900 sm:text-4xl">Your next chapter starts with a conversation.</h2><p class="mt-3 text-slate-600">Tell us where you want to go. We’ll help you work out the next steps.</p></div><a href="#flight-search-title" class="inline-flex w-fit rounded-lg bg-brand-primary px-6 py-3 font-semibold text-white transition hover:bg-brand-secondary">Customize my trip</a></div>
        </section>
    </main>
</template>

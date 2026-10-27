<script setup lang="ts">
import { ref } from 'vue';

defineProps<{ titleId: string }>();

const tripType = ref<'round-trip' | 'one-way'>('round-trip');
</script>

<template>
    <form
        :aria-labelledby="titleId"
        class="rounded-2xl bg-white p-4 text-left shadow-[0_18px_55px_rgba(15,55,64,0.16)] ring-1 ring-slate-900/5 sm:p-5 lg:p-8"
        @submit.prevent>
        <div class="mb-4 flex flex-wrap items-center justify-between gap-3 sm:mb-5 lg:mb-6 lg:gap-4">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-brand-primary sm:text-xs sm:tracking-[0.18em]">Start your journey</p>
                <h2 :id="titleId" class="mt-1 text-lg font-bold text-slate-900 sm:text-2xl lg:text-3xl">Find your next flight</h2>
            </div>
            <div class="inline-flex rounded-full bg-slate-100 p-1" aria-label="Trip type">
                <button type="button" :aria-pressed="tripType === 'round-trip'"
                    :class="['rounded-full px-3 py-1.5 text-xs font-semibold sm:px-4 sm:py-2 sm:text-sm', tripType === 'round-trip' ? 'bg-brand-primary text-white shadow-sm' : 'text-slate-600']"
                    @click="tripType = 'round-trip'">Round trip</button>
                <button type="button" :aria-pressed="tripType === 'one-way'"
                    :class="['rounded-full px-3 py-1.5 text-xs font-semibold sm:px-4 sm:py-2 sm:text-sm', tripType === 'one-way' ? 'bg-brand-primary text-white shadow-sm' : 'text-slate-600']"
                    @click="tripType = 'one-way'">One way</button>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 sm:gap-3 lg:grid-cols-6">
            <label class="min-w-0 rounded-xl border border-slate-200 px-3 py-2 focus-within:border-brand-primary sm:px-4 sm:py-3">
                <span class="block text-[10px] font-semibold text-slate-500 sm:text-xs">From</span>
                <input required name="origin" autocomplete="off" placeholder="City or airport"
                    class="mt-1 w-full min-w-0 border-0 bg-transparent p-0 text-xs font-semibold text-slate-900 outline-none placeholder:font-normal placeholder:text-slate-400 focus:ring-0 sm:text-sm" />
            </label>
            <label class="min-w-0 rounded-xl border border-slate-200 px-3 py-2 focus-within:border-brand-primary sm:px-4 sm:py-3">
                <span class="block text-[10px] font-semibold text-slate-500 sm:text-xs">To</span>
                <input required name="destination" autocomplete="off" placeholder="Where to?"
                    class="mt-1 w-full min-w-0 border-0 bg-transparent p-0 text-xs font-semibold text-slate-900 outline-none placeholder:font-normal placeholder:text-slate-400 focus:ring-0 sm:text-sm" />
            </label>
            <label class="min-w-0 rounded-xl border border-slate-200 px-3 py-2 focus-within:border-brand-primary sm:px-4 sm:py-3">
                <span class="block text-[10px] font-semibold text-slate-500 sm:text-xs">Departure</span>
                <input required type="date" name="departure"
                    class="mt-1 w-full min-w-0 border-0 bg-transparent p-0 text-xs font-semibold text-slate-900 outline-none focus:ring-0 sm:text-sm" />
            </label>
            <label v-if="tripType === 'round-trip'" class="min-w-0 rounded-xl border border-slate-200 px-3 py-2 focus-within:border-brand-primary sm:px-4 sm:py-3">
                <span class="block text-[10px] font-semibold text-slate-500 sm:text-xs">Return</span>
                <input required type="date" name="return"
                    class="mt-1 w-full min-w-0 border-0 bg-transparent p-0 text-xs font-semibold text-slate-900 outline-none focus:ring-0 sm:text-sm" />
            </label>
            <label class="min-w-0 rounded-xl border border-slate-200 px-3 py-2 focus-within:border-brand-primary sm:px-4 sm:py-3">
                <span class="block text-[10px] font-semibold text-slate-500 sm:text-xs">Travellers</span>
                <select name="travellers" class="mt-1 w-full min-w-0 border-0 bg-transparent p-0 text-xs font-semibold text-slate-900 outline-none focus:ring-0 sm:text-sm">
                    <option>1 traveller</option><option>2 travellers</option><option>3 travellers</option><option>4+ travellers</option>
                </select>
            </label>
            <button type="submit" class="col-span-2 min-h-11 rounded-xl bg-brand-secondary px-4 text-sm font-bold text-white transition hover:bg-brand-primary sm:min-h-12 sm:text-base lg:col-span-1">Search flights</button>
        </div>
        <p class="mt-3 text-[10px] text-slate-500 sm:mt-4 sm:text-xs">For assistance, call: +88 01331227744 / +88 01331227755</p>
    </form>
</template>

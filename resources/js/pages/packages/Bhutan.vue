<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from '@/components/ui/custom/Navbar.vue';
import SiteFooter from '@/components/ui/custom/SiteFooter.vue';
import EnquiryModals from '@/components/ui/custom/EnquiryModals.vue';

const itinerary = [
    {
        day: '01', place: 'Paro & Ponakha', title: 'Arrive Paro — Welcome',
        description: 'Arrive at the airport. Meet our representative and take a private transfer to the hotel. Check in at Janka boutique or similar. Enjoy lunch at Paro with one sightseeing stop if time permits. In the evening, take a private transfer to Ponakha for sightseeing enjoying the panoramic views of the Eastern Himalayas',
        transfer: 'Private airport pickup', hotel: 'Zen Hotel Or Similar — Ponakha', meals: ['Lunch', 'Dinner'], activities: ['Arrival','Sightseeing','Hotel check-in'],
    },
    {
        day: '02', place: 'Ponakha & Thimphu', title: 'Explore Ponakha',
        description: 'After breakfast, proceed for guided sightseeing at Punakha Dzong and the Suspension Bridge. Lunch at a local restaurant in Punakha. Visit Chimi Lhakhang (Fertility Temple). Optional white-water rafting. In the evening, Drive towards Thimphu via Dochula Pass.',
        transfer: 'Private AC vehicle with guide', hotel: '3-star hotel or similar — Thimphu', sightseeing: ['Punakha Dzong', 'Suspension Bridge'], meals: ['Breakfast', 'Lunch', 'Dinner'], activities: ['Guided tour','Hotel check-in'],
    },
    {
        day: '03', place: 'Paro', title: 'Explore Paro — Tiger’s Nest (Taktsang)',
        description: 'After breakfast, proceed for guided sightseeing in Paro including Tiger’s Nest (Taktsang). Return to the hotel. Evening at leisure or optional activities.',
        transfer: 'Private AC vehicle with guide', hotel: '3-star hotel or similar — Paro', sightseeing: ['Tiger’s Nest'], meals: ['Breakfast', 'Lunch', 'Dinner'], activities: ['Guided tour'],
    },
    {
        day: '04', place: 'Paro', title: 'Departure',
        description: 'Breakfast at the hotel. Check out and take a private airport transfer for your onward journey. Tour ends with wonderful memories.',
        transfer: 'Private airport drop', meals: ['Breakfast'], activities: ['Check-out', 'Airport transfer'],
    },
];

const included = [
    'Hotel accommodation (4 nights)', 'Daily meals as per itinerary', 'Guided tours in Thimphu and Paro',
    'Private airport and inter-city transfers', 'English-speaking guide on tour days',
    'Sightseeing entrance fees (as listed)', 'Full board — Breakfast, Lunch & Dinner (B/L/D)', 'Air ticket',
];
const excluded = [
    'Personal expenses, laundry and minibar', 'Visa fees and passport charges', 'Meals not mentioned',
    'Travel insurance premium', 'Tips to guide, driver and hotel staff', 'Optional activities not in itinerary',
];
const openContactModal = () => window.dispatchEvent(new Event('open-contact-modal'));
</script>

<template>
    <Head title="Bhutan (Thimphu & Paro) | Bidesh Jatra" />
    <div class="min-h-screen overflow-x-hidden bg-slate-50 text-slate-800">
        <Navbar />

        <main class="pb-16 pt-28 sm:pt-32">
            <div class="mx-auto max-w-7xl px-5 sm:px-8">
                <nav class="mb-5 text-sm text-slate-500" aria-label="Breadcrumb">
                    <a href="/" class="hover:text-brand-primary">Home</a><span class="px-2">/</span><a href="/packages/bhutan-thimphu-paro" class="hover:text-brand-primary">Packages</a><span class="px-2">/</span><span class="text-slate-700">Bhutan</span>
                </nav>

                <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-brand-primary via-[#167d8d] to-[#0b485d] text-white shadow-xl">
                    <div class="absolute inset-0 opacity-20" style="background-image: url('/nepal.jpg'); background-position: center 45%; background-size: cover;"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-[#073c50]/95 via-[#0c5366]/80 to-transparent"></div>
                    <div class="relative grid min-h-[360px] items-end gap-8 p-7 sm:p-10 lg:grid-cols-[1fr_auto] lg:items-center lg:p-14">
                        <div class="max-w-3xl">
                            <div class="mb-5 flex flex-wrap gap-2 text-xs font-semibold uppercase tracking-wider">
                                <span class="rounded-full bg-white/15 px-3 py-1.5 ring-1 ring-white/25">Featured</span><span class="rounded-full bg-white/15 px-3 py-1.5 ring-1 ring-white/25">Family package</span><span class="rounded-full bg-white/15 px-3 py-1.5 ring-1 ring-white/25">Flights available</span><span class="rounded-full bg-white/15 px-3 py-1.5 ring-1 ring-white/25">Visa assistance</span>
                            </div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-amber-200">Thimphu · Paro · Bhutan</p>
                            <h1 class="mt-3 text-3xl font-extrabold tracking-tight sm:text-5xl">Bhutan (Thimphu &amp; Paro)<br class="hidden sm:block"> 5 Days 4 Night — B/L/D Included</h1>
                            <p class="mt-4 max-w-2xl leading-relaxed text-white/80">A guided Bhutan journey with hotel accommodation, private transfers, cultural sightseeing and full-board meals.</p>
                            <div class="mt-6 flex flex-wrap gap-x-6 gap-y-2 text-sm text-white/85"><span>◷ 5 Days / 4 Nights</span><span>⌖ Thimphu, Paro</span><span>♧ Bhutan</span></div>
                        </div>
                        <div class="w-full rounded-2xl border border-white/20 bg-white/10 p-5 backdrop-blur-sm sm:max-w-sm lg:w-80">
                            <p class="text-sm text-white/75">Starting price per adult</p>
                            <p class="mt-1 text-3xl font-extrabold">BDT 69,000</p>
                            <p class="mt-1 text-xs text-white/70">Twin sharing basis · 5 Days / 4 Nights</p>
                            <div class="my-4 border-t border-white/20"></div>
                            <div class="flex justify-between text-sm"><span>Travel date</span><strong>01 Dec 2026</strong></div>
                            <div class="mt-2 flex justify-between text-sm"><span>Travelers</span><strong>2 adults · 0 children</strong></div>
                            <div class="mt-4 flex justify-between border-t border-white/20 pt-4"><span>Estimated total</span><strong class="text-xl">BDT 138,000</strong></div>
                            <button type="button" class="mt-5 w-full rounded-xl bg-brand-secondary px-5 py-3 font-bold text-white transition hover:bg-orange-500" @click="openContactModal">Enquire about this trip</button>
                            <p class="mt-3 text-center text-xs text-white/70">Optional return flights from Dhaka can be added at booking.</p>
                        </div>
                    </div>
                </section>

                <div class="mt-8 grid gap-8 lg:grid-cols-[minmax(0,1fr)_320px]">
                    <div class="min-w-0 space-y-8">
                        <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Your Bhutan escape</p>
                            <h2 class="mt-2 text-2xl font-bold text-slate-900">About this package</h2>
                            <p class="mt-4 leading-7 text-slate-600">Book Bhutan (Thimphu &amp; Paro) 5 Days 4 Night — B/L/D Included with Bidesh Jatra — 5 Days / 4 Nights covering Thimphu and Paro. The package includes hotel accommodation, guided tours, private transfers, and entrance to key sightseeing spots. Perfect for families, couples, and group travellers from Bangladesh. Optional return flights from Dhaka are available at booking.</p>
                            <div class="mt-6 grid gap-3 sm:grid-cols-3"><div class="rounded-xl bg-slate-50 p-4"><p class="text-xs text-slate-500">Duration</p><p class="mt-1 font-semibold">5 Days / 4 Nights</p></div><div class="rounded-xl bg-slate-50 p-4"><p class="text-xs text-slate-500">Destinations</p><p class="mt-1 font-semibold">Thimphu, Paro</p></div><div class="rounded-xl bg-slate-50 p-4"><p class="text-xs text-slate-500">Meals</p><p class="mt-1 font-semibold">Full board (B/L/D)</p></div></div>
                        </section>

                        <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Day by day</p><h2 class="mt-2 text-2xl font-bold text-slate-900">Itinerary in detail</h2>
                            <div class="mt-7 space-y-0">
                                <article v-for="(day, index) in itinerary" :key="day.day" class="relative grid gap-4 pb-8 last:pb-0 sm:grid-cols-[58px_1fr]">
                                    <div class="relative flex sm:justify-center">
                                        <span class="z-10 flex h-11 w-11 items-center justify-center rounded-full bg-brand-primary text-sm font-bold text-white">
                                            {{ day.day }}
                                        </span>
                                        <span v-if="index < itinerary.length - 1" class="absolute left-[21px] top-11 h-full w-px bg-slate-200 sm:left-1/2"></span>
                                    </div>
                                    <div class="rounded-xl border border-slate-200 p-5 sm:p-6">
                                        <div class="flex flex-wrap items-start justify-between gap-2">
                                            <div>
                                                <p class="text-xs font-bold uppercase tracking-widest text-brand-primary">Day {{ Number(day.day) }} · {{ day.place }}</p>
                                                <h3 class="mt-1 text-lg font-bold text-slate-900">
                                                    {{ day.title }}
                                                </h3>
                                            </div>
                                            <span class="rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700">
                                                {{ day.place }}
                                            </span>
                                        </div>
                                        <p class="mt-3 leading-7 text-slate-600">
                                            {{ day.description }}
                                        </p>
                                        <div class="mt-4 grid gap-3 text-sm sm:grid-cols-2">
                                            <p v-if="day.transfer">
                                                <span class="font-semibold text-slate-800">Transfer:</span> {{ day.transfer }}
                                            </p>
                                            <p v-if="day.hotel">
                                                <span class="font-semibold text-slate-800">Hotel:</span> {{ day.hotel }}
                                            </p>
                                            <p v-if="day.sightseeing">
                                                <span class="font-semibold text-slate-800">Sightseeing:</span> {{ day.sightseeing.join(', ') }}
                                            </p>
                                            <p>
                                                <span class="font-semibold text-slate-800">Meals:</span> {{ day.meals.join(', ') }}
                                            </p>
                                            <p>
                                                <span class="font-semibold text-slate-800">Activities:</span> {{ day.activities.join(', ') }}
                                            </p>
                                        </div>
                                        <p v-if="day.hotel" class="mt-3 text-xs leading-relaxed text-slate-500">
                                            3-Star category (or similar). Proposed category — exact hotel name confirmed after booking / availability.
                                        </p>
                                    </div>
                                </article>
                            </div>
                            <!-- <div class="mt-8 rounded-xl border border-amber-200 bg-amber-50 p-5 text-sm leading-relaxed text-amber-950">
                                <p class="font-bold">
                                    Please confirm itinerary details before booking
                                </p>
                                <p class="mt-2">
                                    The package heading states 5 Days / 4 Nights, while the visible day-by-day itinerary has four days. The hotel section lists 2 nights in Thimphu and 1 night in Paro (3 nights total). Tiger’s Nest (Taktsang) appears in the included services, but is not listed in the day-by-day itinerary. Confirm the missing day and night and the Taktsang visit with the operator.
                                </p>
                            </div> -->
                        </section>

                        <section class="grid gap-6 md:grid-cols-2">
                            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-7">
                                <h2 class="text-xl font-bold text-slate-900">
                                    Included in this package
                                </h2><ul class="mt-5 space-y-3 text-sm text-slate-600"><li v-for="item in included" :key="item" class="flex gap-3"><span class="font-bold text-emerald-600">✓</span><span>{{ item }}</span></li></ul></div>
                            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-7">
                                <h2 class="text-xl font-bold text-slate-900">
                                    Not included
                                </h2>
                                <ul class="mt-5 space-y-3 text-sm text-slate-600">
                                    <li v-for="item in excluded" :key="item" class="flex gap-3">
                                        <span class="font-bold text-rose-500">×</span>
                                        <span>{{ item }}</span>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8"><p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Stay</p><h2 class="mt-2 text-2xl font-bold text-slate-900">Hotels to be used</h2><p class="mt-3 text-sm leading-relaxed text-slate-600">Proposed category — exact hotel name confirmed after booking / availability.</p><div class="mt-5 grid gap-4 sm:grid-cols-2"><article v-for="hotel in [{ name: '4-star hotel or similar — Thimphu', location: 'Thimphu', nights: '2 nights' }, { name: '4-star hotel or similar — Paro', location: 'Paro', nights: '1 night' }]" :key="hotel.location" class="rounded-xl border border-slate-200 p-5"><h3 class="font-bold text-slate-900">{{ hotel.name }}</h3><dl class="mt-4 space-y-2 text-sm text-slate-600"><div class="flex justify-between"><dt>Location</dt><dd>{{ hotel.location }}</dd></div><div class="flex justify-between"><dt>Category</dt><dd>4-Star (or similar)</dd></div><div class="flex justify-between"><dt>Nights</dt><dd>{{ hotel.nights }}</dd></div><div class="flex justify-between"><dt>Room type</dt><dd>Superior Twin / Double</dd></div><div class="flex justify-between"><dt>Check-in/out</dt><dd>As per itinerary</dd></div></dl></article></div></section>

                        <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8"><p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Flights</p><h2 class="mt-2 text-2xl font-bold text-slate-900">Flight to be used</h2><p class="mt-3 leading-7 text-slate-600">Optional return flights from Dhaka can be added at booking. Fare is subject to airline availability and travel dates.</p><div class="mt-4 grid gap-3 text-sm sm:grid-cols-3"><p><span class="font-semibold">Departure:</span> Dhaka (DAC)</p><p><span class="font-semibold">Airline:</span> Subject to availability</p><p><span class="font-semibold">Class:</span> Economy</p></div><p class="mt-3 text-sm text-slate-500">Flight schedule will be shared after booking confirmation.</p></section>

                        <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8"><p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Before you book</p><h2 class="mt-2 text-2xl font-bold text-slate-900">Booking, cancellation &amp; child policy</h2><div class="mt-5 grid gap-6 md:grid-cols-2"><div><h3 class="font-bold">Booking policy</h3><ul class="mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-600"><li>Full payment required at the time of booking to confirm seats and hotel.</li><li>Subject to hotel and transport availability.</li></ul></div><div><h3 class="font-bold">Cancellation policy</h3><ul class="mt-3 space-y-2 text-sm text-slate-600"><li class="flex justify-between gap-3"><span>30+ days before departure</span><strong>25% of package cost</strong></li><li class="flex justify-between gap-3"><span>15–29 days before departure</span><strong>50%</strong></li><li class="flex justify-between gap-3"><span>7–14 days before departure</span><strong>75%</strong></li><li class="flex justify-between gap-3"><span>Less than 7 days before departure</span><strong>100%</strong></li></ul></div></div><div class="mt-6 rounded-xl bg-slate-50 p-5"><h3 class="font-bold">Child policy &amp; other information</h3><ul class="mt-3 space-y-2 text-sm leading-relaxed text-slate-600"><li>Child 0–2 years: free without extra bed (one per room).</li><li>Child 2–12 years with extra bed: BDT 5 per child.</li><li>Passport valid 6+ months required.</li></ul><div class="mt-4 border-t border-slate-200 pt-4"><p class="text-sm font-semibold">Services included in this package</p><ul class="mt-2 grid gap-2 text-sm text-slate-600 sm:grid-cols-2"><li>Sightseeing: Buddha Dordenma (Thimphu)</li><li>Sightseeing: Tiger’s Nest (Taktsang) hike (Paro)</li><li>Tour: Guided city &amp; cultural tours — Thimphu + Paro</li><li>Transfer: Private airport pickup &amp; drop</li><li>Transfer: Inter-hotel &amp; sightseeing AC transfers</li></ul></div></div></section>
                    </div>

                    <aside class="h-fit rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 lg:sticky lg:top-28"><p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Your trip</p><h2 class="mt-2 text-xl font-bold text-slate-900">Bhutan · 5 Days / 4 Nights</h2><div class="my-5 border-t border-slate-200"></div><div class="flex justify-between text-sm"><span>Per adult</span><strong>BDT 69,000</strong></div><div class="mt-3 flex justify-between text-sm"><span>Travelers</span><strong>2 adults</strong></div><div class="mt-3 flex justify-between text-sm"><span>Travel date</span><strong>01 Dec 2026</strong></div><div class="mt-5 flex justify-between border-t border-slate-200 pt-4"><span class="font-semibold">Estimated total</span><strong class="text-xl text-brand-primary">BDT 138,000</strong></div><p class="mt-1 text-xs text-slate-500">Twin sharing basis. Flights optional and additional.</p><button type="button" class="mt-5 w-full rounded-xl bg-brand-primary px-5 py-3 font-semibold text-white transition hover:bg-brand-secondary" @click="openContactModal">Enquire now</button><p class="mt-4 text-xs leading-relaxed text-slate-500">Prices and availability are subject to confirmation. Full payment is required at booking as stated on the package page.</p></aside>
                </div>
            </div>
        </main>
        <EnquiryModals />
        <SiteFooter />
    </div>
</template>

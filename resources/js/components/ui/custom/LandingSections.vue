<script setup lang="ts">
import FlightSearchForm from '@/components/ui/custom/FlightSearchForm.vue';

const openContactModal = () => window.dispatchEvent(new Event('open-contact-modal'));
</script>

<template>
    <main>
        <section class="relative z-20 mx-auto hidden max-w-6xl px-4 lg:-mt-36 lg:block lg:px-8"
            aria-labelledby="flight-search-title">
            <FlightSearchForm title-id="flight-search-title" />
        </section>

        <!-- <section id="destinations" class="mx-auto max-w-7xl px-5 py-20 sm:px-8 sm:py-24">
            <div class="mb-9 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Go somewhere memorable
                    </p>
                    <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Popular destinations
                    </h2>
                </div>
                <a href="#contact" class="font-semibold text-brand-primary hover:text-brand-secondary">Plan a custom
                    trip <span aria-hidden="true">→</span></a>
            </div>
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <article class="group relative min-h-72 overflow-hidden rounded-2xl bg-slate-900">
                    <img src="/alex-quezada-e1zjPaFFTDY-unsplash.jpg" alt="A scenic travel destination"
                        class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/10 to-transparent">
                    </div>
                    <div class="absolute inset-x-0 bottom-0 p-6 text-white">
                        <p class="text-sm font-medium text-white/75">
                            Explore beyond the familiar
                        </p>
                        <h3 class="mt-1 text-2xl font-bold">
                            Asia & the tropics
                        </h3>
                    </div>
                </article>
                <article class="flex min-h-72 flex-col justify-between rounded-2xl bg-brand-primary p-7 text-white">
                    <span class="text-4xl" aria-hidden="true">✈</span>
                    <div>
                        <p class="text-sm font-medium text-white/75">
                            Handpicked travel ideas
                        </p>
                        <h3 class="mt-2 text-2xl font-bold">
                            Find the right journey for you
                        </h3>
                        <p class="mt-3 max-w-sm leading-relaxed text-white/85">
                            From a quick getaway to a long-awaited adventure, our team can help shape your plans.
                        </p>
                    </div>
                    <a href="#contact"
                        class="mt-6 font-semibold text-white underline decoration-white/50 underline-offset-4">
                        Talk to a travel expert
                    </a>
                </article>
                <article id="packages"
                    class="flex min-h-72 flex-col justify-between rounded-2xl border border-brand-primary bg-blue-50 p-7 sm:col-span-2 lg:col-span-1">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">
                        Travel, made easier
                    </span>
                    <div>
                        <h3 class="text-2xl font-bold text-slate-900">
                            More than a ticket
                        </h3>
                        <p class="mt-3 leading-relaxed text-slate-600">
                            Get support with flights, visa guidance and the
                            details that make travelling abroad feel simpler.
                        </p>
                    </div>
                    <a href="#contact" class="mt-6 inline-flex w-fit rounded-xl 
                        bg-brand-primary px-5 py-3 font-semibold border border-brand-primary 
                        text-white hover:bg-transparent hover:text-brand-primary 
                        hover:border hover:border-brand-primary transition-colors duration-200">
                        Explore our services
                    </a>
                </article>
            </div>
        </section> -->

        <section id="highlights" class="relative mt-0 bg-gradient-to-br from-brand-primary via-[#167d8d] to-[#0b485d] pt-10 text-white sm:pt-12 lg:-mt-28 lg:pt-44">
            <div class="mx-auto max-w-7xl px-5 pb-16 sm:px-8 sm:pb-24">
                <div class="mb-10 max-w-2xl sm:mb-14">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/70">Make your next trip unforgettable</p>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight sm:text-4xl">Places worth going the extra mile for</h2>
                </div>
                <div class="grid overflow-hidden rounded-3xl bg-white/10 shadow-2xl ring-1 ring-white/15 lg:grid-cols-2">
                    <div class="order-1 h-150 md:h-170 overflow-hidden lg:order-1">
                        <img src="thailand.jpg" alt="Tropical islands in Indonesia" class="h-full w-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <article class="order-2 flex flex-col justify-center px-6 py-9 sm:px-10 sm:py-12 lg:order-2 lg:px-14">
                        <p class="text-sm font-semibold uppercase tracking-widest text-amber-200">SMILES & SUNSETS</p>
                        <h3 class="mt-3 text-3xl font-bold sm:text-4xl">Thailand - Golden Temples, Pristine Shores</h3>
                        <p class="mt-4 max-w-xl leading-relaxed text-white/80">
                            Immerse yourself in the vibrant energy of Bangkok, feast on world-class street food, and lose yourself along the turquoise bays of the Andaman islands.
                        </p>
                        <button type="button" class="mt-6 w-fit text-left font-semibold text-white underline decoration-white/50 underline-offset-4 transition hover:decoration-white" @click="openContactModal">Connect with our travel experts</button>
                    </article>
                    <article class="order-4 flex flex-col justify-center px-6 py-9 sm:px-10 sm:py-12 lg:order-3 lg:px-14">
                        <p class="text-sm font-semibold uppercase tracking-widest text-amber-200">ISLAND ODYSSEY</p>
                        <h3 class="mt-3 text-3xl font-bold sm:text-4xl">Indonesia - Tropical Peaks & Hidden Reefs</h3>
                        <p class="mt-4 max-w-xl leading-relaxed text-white/80">
                            Journey beyond the ordinary into lush jungle valleys, ancient volcanic craters, and secluded coastal paradises scattered across the archipelago.
                        </p>
                        <button type="button" class="mt-6 w-fit text-left font-semibold text-white underline decoration-white/50 underline-offset-4 transition hover:decoration-white" @click="openContactModal">Connect with our travel experts</button>
                    </article>
                    <div class="order-3 h-150 md:h-170  overflow-hidden lg:order-4">
                        <img src="/indonasia.png" alt="A scenic tropical coastline" class="h-full w-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <div class="order-5 h-150 md:h-170 overflow-hidden lg:order-5">
                        <img src="/nepal.jpg" alt="Placeholder scenic destination image" class="h-full w-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <article class="order-6 flex flex-col justify-center px-6 py-9 sm:px-10 sm:py-12 lg:order-6 lg:px-14">
                        <p class="text-sm font-semibold uppercase tracking-widest text-amber-200">CROWN OF THE EARTH</p>
                        <h3 class="mt-3 text-3xl font-bold sm:text-4xl">Nepal - Where Mountains Touch the Sky</h3>
                        <p class="mt-4 max-w-xl leading-relaxed text-white/80">
                            Step into a world of Himalayan majesty, timeless spiritual traditions, and breathtaking high-altitude trails crafted for the true explorer.
                        </p>
                        <button type="button" class="mt-6 w-fit text-left font-semibold text-white underline decoration-white/50 underline-offset-4 transition hover:decoration-white" @click="openContactModal">Connect with our travel experts</button>
                    </article>
                    <div class="order-7 h-150 md:h-170  overflow-hidden lg:order-8">
                        <img src="/maldeves.jpg" alt="Placeholder coastal destination image" class="h-full w-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <article class="order-8 flex flex-col justify-center px-6 py-9 sm:px-10 sm:py-12 lg:order-7 lg:px-14">
                        <p class="text-sm font-semibold uppercase tracking-widest text-amber-200">PURE SERENITY</p>
                        <h3 class="mt-3 text-3xl font-bold sm:text-4xl">Maldives - Bungalows Floating Over Paradise</h3>
                        <p class="mt-4 max-w-xl leading-relaxed text-white/80">
                            Unwind in crystalline lagoons, dive alongside vibrant marine life, and experience bare-foot luxury on private coral-rimmed islands.
                        </p>
                        <button type="button" class="mt-6 w-fit text-left font-semibold text-white underline decoration-white/50 underline-offset-4 transition hover:decoration-white" @click="openContactModal">Connect with our travel experts</button>
                    </article>
                    <div class="order-9 h-150 md:h-170  overflow-hidden lg:order-9">
                        <img src="/malaysia.jpg" alt="Placeholder mountain destination image" class="h-full w-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <article class="order-10 flex flex-col justify-center px-6 py-9 sm:px-10 sm:py-12 lg:order-10 lg:px-14">
                        <p class="text-sm font-semibold uppercase tracking-widest text-amber-200">CULTURAL TAPESTRY</p>
                        <h3 class="mt-3 text-3xl font-bold sm:text-4xl">Malaysia - Rainforest Heights to Skyline Nights</h3>
                        <p class="mt-4 max-w-xl leading-relaxed text-white/80">
                            Discover a striking fusion of modern metropolis, ancient rainforest reserves, and world-renowned culinary heritage at every stop.
                        </p>
                        <button type="button" class="mt-6 w-fit text-left font-semibold text-white underline decoration-white/50 underline-offset-4 transition hover:decoration-white" @click="openContactModal">Connect with our travel experts</button>
                    </article>
                </div>
            </div>
        </section>

        <section id="contact" class="bg-slate-50 px-5 py-16 sm:px-8 sm:py-20 lg:px-0">
            <div class="mx-auto flex max-w-7xl flex-col gap-8 md:flex-row md:items-center md:justify-between lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Here for every step</p>
                    <h2 class="mt-2 text-3xl font-bold text-slate-900 sm:text-4xl">Your next chapter starts with a
                        conversation.</h2>
                    <p class="mt-3 text-slate-600">Tell us where you want to go. We’ll help you work out the next steps.
                    </p>
                </div><a href="#flight-search-title"
                    @click.prevent="openContactModal"
                    class="inline-flex w-fit rounded-lg bg-brand-primary px-6 py-3 font-semibold text-white transition hover:bg-brand-secondary">Customize
                    my trip</a>
            </div>
        </section>
    </main>
</template>

<style scoped>
.highlight-image {
    clip-path: polygon(0 0, 100% 0, 100% 88%, 88% 100%, 0 100%);
}

@media (min-width: 1024px) {
    .highlight-image-left {
        clip-path: polygon(0 0, 100% 0, 88% 100%, 0 100%);
    }

    .highlight-image-right {
        clip-path: polygon(12% 0, 100% 0, 100% 100%, 0 100%);
    }
}
</style>

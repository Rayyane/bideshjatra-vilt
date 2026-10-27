<script setup lang="ts">
import { ref } from 'vue';

const email = ref('');
const isSubmitting = ref(false);
const message = ref('');
const error = ref('');
const openContactModal = () => window.dispatchEvent(new Event('open-contact-modal'));

const subscribe = async () => {
    isSubmitting.value = true;
    message.value = '';
    error.value = '';

    const xsrfCookie = document.cookie.split('; ').find((cookie) => cookie.startsWith('XSRF-TOKEN='));

    try {
        const response = await fetch('/enquiries', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-XSRF-TOKEN': xsrfCookie ? decodeURIComponent(xsrfCookie.slice('XSRF-TOKEN='.length)) : '',
            },
            body: JSON.stringify({ type: 'newsletter', email: email.value }),
        });
        const result = await response.json();

        if (response.status === 422) {
            error.value = result.errors?.email?.[0] ?? 'Please enter a valid email address.';
        } else if (!response.ok) {
            throw new Error(result.message ?? 'Unable to subscribe right now. Please try again.');
        } else {
            message.value = 'Thanks for subscribing. We’ve received your email address.';
            email.value = '';
        }
    } catch (submitError) {
        error.value = submitError instanceof Error ? submitError.message : 'Unable to subscribe right now. Please try again.';
    } finally {
        isSubmitting.value = false;
    }
};
</script>

<template>
    <footer class="bg-slate-950 text-slate-300">
        <div class="px-5 py-14 sm:px-8 sm:py-16 lg:px-0">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-3 lg:gap-16 lg:px-8">
                <div class="mt-0 md:-mt-8">
                    <a href="#home" class="inline-flex" aria-label="Bidesh Jatra home">
                        <img src="/bidesh_jatra_logo.png" alt="Bidesh Jatra Global Tours & Travels" class="h-28 w-auto brightness-0 invert" />
                    </a>
                    <address class="space-y-3 text-sm not-italic leading-relaxed text-slate-400">
                        <p>House 70/71, Road 03, Janata Housing Society, Ring Road, Adabor, Dhaka-1207, Bangladesh</p>
                        <a class="block transition hover:text-white" href="mailto:info@bideshjatraglobal.com">info@bideshjatraglobal.com</a>
                        <a class="block transition hover:text-white" href="tel:+8801331227744">+880 1331-227744</a>
                        <a class="block transition hover:text-white" href="tel:+8801331227755">+880 1331-227755</a>
                    </address>
                </div>

                <nav aria-label="Footer links">
                    <h2 class="text-sm font-bold uppercase tracking-[0.18em] text-white">Explore</h2>
                    <ul class="mt-5 space-y-3 text-sm">
                        <li><a href="#home" class="transition hover:text-white">Home</a></li>
                        <li><a href="#highlights" class="transition hover:text-white">Destinations</a></li>
                        <li><a href="#contact" class="transition hover:text-white" @click.prevent="openContactModal">Plan a trip</a></li>
                        <li><a href="#contact" class="transition hover:text-white" @click.prevent="openContactModal">Contact us</a></li>
                    </ul>
                </nav>

                <div>
                    <h2 class="text-sm font-bold uppercase tracking-[0.18em] text-white">Travel notes & updates</h2>
                    <p class="mt-3 text-sm leading-relaxed text-slate-400">Subscribe for travel inspiration and news from our team.</p>
                    <form class="mt-5 flex gap-2" @submit.prevent="subscribe">
                        <label for="newsletter-email" class="sr-only">Email address</label>
                        <input id="newsletter-email" v-model="email" required type="email" autocomplete="email" placeholder="Your email address" class="min-w-0 flex-1 rounded-xl border border-white/15 bg-white/5 px-4 py-3 text-sm text-white outline-none placeholder:text-slate-500 focus:border-brand-secondary focus:ring-2 focus:ring-brand-secondary/30" />
                        <button type="submit" :disabled="isSubmitting" class="shrink-0 rounded-xl bg-brand-primary px-4 py-3 text-sm font-semibold text-white transition hover:bg-brand-secondary disabled:cursor-wait disabled:opacity-60">
                            {{ isSubmitting ? 'Sending…' : 'Subscribe' }}
                        </button>
                    </form>
                    <p v-if="message" role="status" class="mt-3 text-sm text-emerald-300">{{ message }}</p>
                    <p v-if="error" role="alert" class="mt-3 text-sm text-red-300">{{ error }}</p>

                    <h3 class="mt-8 text-sm font-bold uppercase tracking-[0.18em] text-white">Follow us</h3>
                    <div class="mt-4 flex gap-3">
                        <a href="https://www.facebook.com/BideshJatraGlobalToursandTravels/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/15 text-slate-300 transition hover:border-white/50 hover:bg-white/10 hover:text-white">
                            <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current" aria-hidden="true"><path d="M13.4 21v-8.2h2.8l.4-3.2h-3.2v-2c0-.9.3-1.5 1.6-1.5h1.7V3.2c-.3 0-1.3-.2-2.5-.2-2.5 0-4.2 1.5-4.2 4.3v2.3H7.2v3.2H10V21h3.4Z" /></svg>
                        </a>
                        <a href="https://www.instagram.com/bideshjatraglobal" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/15 text-slate-300 transition hover:border-white/50 hover:bg-white/10 hover:text-white">
                            <svg viewBox="0 0 24 24" class="h-5 w-5 fill-none stroke-current" stroke-width="1.8" aria-hidden="true"><rect x="3.2" y="3.2" width="17.6" height="17.6" rx="5" /><circle cx="12" cy="12" r="4" /><circle cx="17.8" cy="6.5" r=".8" class="fill-current stroke-none" /></svg>
                        </a>
                        <a href="https://www.linkedin.com/in/bidesh-jatra-global-tours-and-travels-ltd-0b7b06429/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/15 text-slate-300 transition hover:border-white/50 hover:bg-white/10 hover:text-white">
                            <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current" aria-hidden="true"><path d="M6.5 8.4a2 2 0 1 0 0-4 2 2 0 0 0 0 4ZM4.8 10h3.4v9.2H4.8V10Zm5.4 0h3.3v1.3h.1a3.6 3.6 0 0 1 3.2-1.7c3.4 0 4 2.2 4 5v4.6h-3.4v-4.1c0-1 0-2.4-1.5-2.4s-1.8 1.1-1.8 2.3v4.2h-3.4V10Z" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10 px-5 py-6 text-center text-sm text-slate-400 sm:px-8">
            (c) {{ new Date().getFullYear() }} Bidesh Jatra Global Tours & Travels | Travel with confidence.
        </div>
    </footer>
</template>

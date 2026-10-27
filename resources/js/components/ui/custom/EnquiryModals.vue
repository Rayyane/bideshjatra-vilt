<script setup lang="ts">
import { onMounted, onUnmounted, reactive, ref } from 'vue';

type ModalType = 'scroll' | 'contact';

const isOpen = ref(false);
const modalType = ref<ModalType>('scroll');
const isSubmitting = ref(false);
const successMessage = ref('');
const submitError = ref('');
const fieldErrors = ref<Record<string, string[]>>({});
const form = reactive({
    name: '',
    email: '',
    phone: '',
    travel_enquiry: '',
    departure_date: '',
    return_date: '',
    destinations: '',
    enquiry: '',
});

const clearForm = () => {
    Object.assign(form, {
        name: '', email: '', phone: '', travel_enquiry: '',
        departure_date: '', return_date: '', destinations: '', enquiry: '',
    });
    fieldErrors.value = {};
    successMessage.value = '';
    submitError.value = '';
};

const openModal = (type: ModalType) => {
    clearForm();
    modalType.value = type;
    isOpen.value = true;
};

const openContactModal = () => openModal('contact');
const closeModal = () => { isOpen.value = false; };

const handleScroll = () => {
    if (window.scrollY <= 0) return;
    if (isOpen.value) return;
    window.removeEventListener('scroll', handleScroll);
    openModal('scroll');
};

const csrfToken = () => {
    const cookie = document.cookie.split('; ').find((item) => item.startsWith('XSRF-TOKEN='));
    return cookie ? decodeURIComponent(cookie.slice('XSRF-TOKEN='.length)) : '';
};

const submitForm = async () => {
    isSubmitting.value = true;
    fieldErrors.value = {};
    submitError.value = '';

    try {
        const response = await fetch('/enquiries', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-XSRF-TOKEN': csrfToken(),
            },
            body: JSON.stringify({ ...form, type: modalType.value }),
        });
        const result = await response.json();

        if (response.status === 422) {
            fieldErrors.value = result.errors ?? {};
            return;
        }
        if (!response.ok) throw new Error(result.message ?? 'We could not send your enquiry. Please try again.');

        successMessage.value = result.message;
        clearForm();
        successMessage.value = result.message;
    } catch (error) {
        submitError.value = error instanceof Error ? error.message : 'We could not send your enquiry. Please try again.';
    } finally {
        isSubmitting.value = false;
    }
};

const handleKeydown = (event: KeyboardEvent) => {
    if (event.key === 'Escape' && isOpen.value) closeModal();
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll, { passive: true });
    window.addEventListener('open-contact-modal', openContactModal);
    window.addEventListener('keydown', handleKeydown);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
    window.removeEventListener('open-contact-modal', openContactModal);
    window.removeEventListener('keydown', handleKeydown);
});
</script>

<template>
    <Teleport to="body">
        <div v-if="isOpen" class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto bg-slate-950/65 p-4 backdrop-blur-sm" @click.self="closeModal">
            <section role="dialog" aria-modal="true" :aria-labelledby="modalType === 'scroll' ? 'scroll-modal-title' : 'contact-modal-title'" class="relative my-auto max-h-[calc(100vh-2rem)] w-full max-w-xl overflow-y-auto rounded-3xl bg-white p-6 shadow-2xl sm:p-8">
                <button type="button" aria-label="Close enquiry form" class="absolute right-4 top-4 inline-flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-2xl leading-none text-slate-600 transition hover:bg-slate-200" @click="closeModal">&times;</button>
                <template v-if="successMessage">
                    <p class="pr-10 text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Bidesh Jatra</p>
                    <h2 class="mt-3 text-2xl font-bold text-slate-900">Thank you for reaching out</h2>
                    <p class="mt-3 text-slate-600">{{ successMessage }}</p>
                    <button type="button" class="mt-6 rounded-xl bg-brand-primary px-5 py-3 font-semibold text-white" @click="closeModal">Done</button>
                </template>
                <template v-else>
                    <p class="pr-10 text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">Let’s plan your journey</p>
                    <h2 :id="modalType === 'scroll' ? 'scroll-modal-title' : 'contact-modal-title'" class="mt-2 pr-8 text-2xl font-bold text-slate-900 sm:text-3xl">
                        {{ modalType === 'scroll' ? 'Tell us about your travel plans' : 'Contact our travel team' }}
                    </h2>
                    <p class="mt-2 text-sm text-slate-600">Share a few details and our team will get back to you.</p>

                    <form class="mt-6 space-y-4" @submit.prevent="submitForm">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="block text-sm font-semibold text-slate-700">Name <span class="text-red-600">*</span>
                                <input v-model="form.name" required autocomplete="name" maxlength="120" class="mt-1.5 w-full rounded-xl border border-slate-300 px-3 py-2.5 font-normal outline-none transition focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20" />
                                <span v-if="fieldErrors.name" class="mt-1 block text-xs font-normal text-red-600">{{ fieldErrors.name[0] }}</span>
                            </label>
                            <label class="block text-sm font-semibold text-slate-700">Email <span class="text-red-600">*</span>
                                <input v-model="form.email" required type="email" autocomplete="email" maxlength="254" class="mt-1.5 w-full rounded-xl border border-slate-300 px-3 py-2.5 font-normal outline-none transition focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20" />
                                <span v-if="fieldErrors.email" class="mt-1 block text-xs font-normal text-red-600">{{ fieldErrors.email[0] }}</span>
                            </label>
                        </div>
                        <label class="block text-sm font-semibold text-slate-700">Phone number <span class="text-red-600">*</span>
                            <input v-model="form.phone" required type="tel" autocomplete="tel" maxlength="40" class="mt-1.5 w-full rounded-xl border border-slate-300 px-3 py-2.5 font-normal outline-none transition focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20" />
                            <span v-if="fieldErrors.phone" class="mt-1 block text-xs font-normal text-red-600">{{ fieldErrors.phone[0] }}</span>
                        </label>

                        <template v-if="modalType === 'scroll'">
                            <label class="block text-sm font-semibold text-slate-700">Travel enquiry <span class="text-red-600">*</span>
                                <textarea v-model="form.travel_enquiry" required rows="4" maxlength="5000" placeholder="Where would you like to go?" class="mt-1.5 w-full resize-y rounded-xl border border-slate-300 px-3 py-2.5 font-normal outline-none transition focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20"></textarea>
                                <span v-if="fieldErrors.travel_enquiry" class="mt-1 block text-xs font-normal text-red-600">{{ fieldErrors.travel_enquiry[0] }}</span>
                            </label>
                        </template>
                        <template v-else>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <label class="block text-sm font-semibold text-slate-700">Expected departure date <span class="font-normal text-slate-500">(optional)</span>
                                    <input v-model="form.departure_date" type="date" class="mt-1.5 w-full rounded-xl border border-slate-300 px-3 py-2.5 font-normal outline-none transition focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20" />
                                    <span v-if="fieldErrors.departure_date" class="mt-1 block text-xs font-normal text-red-600">{{ fieldErrors.departure_date[0] }}</span>
                                </label>
                                <label class="block text-sm font-semibold text-slate-700">Expected return date <span class="font-normal text-slate-500">(optional)</span>
                                    <input v-model="form.return_date" type="date" class="mt-1.5 w-full rounded-xl border border-slate-300 px-3 py-2.5 font-normal outline-none transition focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20" />
                                    <span v-if="fieldErrors.return_date" class="mt-1 block text-xs font-normal text-red-600">{{ fieldErrors.return_date[0] }}</span>
                                </label>
                            </div>
                            <label class="block text-sm font-semibold text-slate-700">Destinations <span class="font-normal text-slate-500">(optional)</span>
                                <input v-model="form.destinations" maxlength="500" placeholder="Countries or cities you have in mind" class="mt-1.5 w-full rounded-xl border border-slate-300 px-3 py-2.5 font-normal outline-none transition focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20" />
                                <span v-if="fieldErrors.destinations" class="mt-1 block text-xs font-normal text-red-600">{{ fieldErrors.destinations[0] }}</span>
                            </label>
                            <label class="block text-sm font-semibold text-slate-700">Enquiry <span class="font-normal text-slate-500">(optional)</span>
                                <textarea v-model="form.enquiry" rows="3" maxlength="5000" placeholder="Tell us anything else that would help us plan." class="mt-1.5 w-full resize-y rounded-xl border border-slate-300 px-3 py-2.5 font-normal outline-none transition focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20"></textarea>
                                <span v-if="fieldErrors.enquiry" class="mt-1 block text-xs font-normal text-red-600">{{ fieldErrors.enquiry[0] }}</span>
                            </label>
                        </template>

                        <p v-if="submitError" role="alert" class="text-sm text-red-600">{{ submitError }}</p>
                        <button type="submit" :disabled="isSubmitting" class="w-full rounded-xl bg-brand-primary px-5 py-3 font-bold text-white transition hover:bg-brand-secondary disabled:cursor-wait disabled:opacity-60">
                            {{ isSubmitting ? 'Sending…' : 'Send enquiry' }}
                        </button>
                    </form>
                </template>
            </section>
        </div>
    </Teleport>
</template>

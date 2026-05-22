<template>

    <Head :title="`${room?.title || 'Camera'} room's`" />

    <div class="h-[89vh] bg-gray-50 p-6 flex flex-col gap-6 overflow-hidden">

        <!-- Header -->
        <div class="flex items-start justify-between gap-4 flex-wrap">
            <div class="flex flex-col gap-1.5">
                <span class="text-xs font-semibold uppercase tracking-widest text-gray-400 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg>
                    Current room
                </span>
                <h1 class="text-2xl font-semibold text-gray-900 tracking-tight">{{ room.title }}</h1>
                <p v-if="room.excerpt" class="text-sm text-gray-500 leading-relaxed max-w-lg">
                    {{ room.excerpt }}
                </p>
                <div class="flex items-center gap-2 flex-wrap mt-1">
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1 rounded-full" :class="room.status
                        ? 'bg-emerald-50 text-emerald-700'
                        : 'bg-gray-100 text-gray-500'">
                        <span class="w-1.5 h-1.5 rounded-full"
                            :class="room.status ? 'bg-emerald-500' : 'bg-gray-400'" />
                        {{ room.status ? 'Active' : 'Inactive' }}
                    </span>
                    <span
                        class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1 rounded-full bg-blue-50 text-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        {{ room.max_clients }} max clients
                    </span>
                </div>
            </div>

            <!-- Presence bar -->
            <div class="flex items-center gap-3 px-4 py-2.5 bg-white border border-gray-200 rounded-xl shadow-sm">
                <div class="flex">
                    <div v-for="(user, i) in onlineUsers" :key="i"
                        class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold border-2 border-white -mr-2"
                        :style="{ backgroundColor: user.bgColor, color: user.textColor }" :title="user.name">
                        {{ user.initials }}
                    </div>
                </div>
                <span class="text-sm text-gray-500 pl-2">{{ onlineUsers.length }} online</span>
                <span class="w-2 h-2 rounded-full bg-emerald-500 ml-1" />
            </div>
        </div>

        <!-- Hover Zone -->
        <div id="container" @mousemove="updateMousePosition" @mouseenter="isInside = true"
            @mouseleave="isInside = false"
            class="relative w-full rounded-2xl border-2 border-dashed cursor-none flex justify-center items-center overflow-hidden transition-colors duration-200 select-none flex-1 min-h-0"
            :class="isInside ? 'border-violet-400 bg-violet-50/40' : 'border-gray-300 bg-gray-100/60'">
            <!-- Corner accents -->
            <div class="absolute inset-0 pointer-events-none opacity-50">
                <span
                    class="absolute top-3.5 left-3.5 w-3.5 h-3.5 border-t-2 border-l-2 border-violet-400 rounded-tl" />
                <span
                    class="absolute top-3.5 right-3.5 w-3.5 h-3.5 border-t-2 border-r-2 border-violet-400 rounded-tr" />
                <span
                    class="absolute bottom-3.5 left-3.5 w-3.5 h-3.5 border-b-2 border-l-2 border-violet-400 rounded-bl" />
                <span
                    class="absolute bottom-3.5 right-3.5 w-3.5 h-3.5 border-b-2 border-r-2 border-violet-400 rounded-br" />
            </div>

            <h1 class="text-5xl font-semibold text-center pointer-events-none transition-colors duration-300 tracking-tight"
                :class="isInside ? 'text-gray-500' : 'text-gray-300'">
                Hover mouse in this zone
            </h1>

            <!-- Cursorul Virtual -->
            <div v-if="isInside"
                class="pointer-events-none absolute flex flex-col items-start will-change-transform z-50"
                :style="{ left: mouseX + 'px', top: mouseY + 'px' }">
                <div class="mb-1 px-2 py-0.5 text-xs font-bold text-white rounded-md shadow-sm whitespace-nowrap"
                    :style="{ backgroundColor: currentColor }">
                    You
                </div>
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 3V19.5L9.75 14.25H18.75L4.5 3Z" :fill="currentColor" stroke="white" stroke-width="2"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>

    </div>
</template>

<script>
import { Head } from '@inertiajs/vue3'
import Layout from "@/Layouts/Layout.vue";

export default {
    components: {
        Head
    },
    // Proprietățile primite din backend (Inertia)
    props: {
        room: {
            type: Object,
            required: true,
        },
    },

    layout: Layout,

    // Starea internă a componentei (fostele ref-uri)
    data() {
        return {
            isInside: false,
            // Poziția reală a mouse-ului în container
            mouseX: 0,
            mouseY: 0,
            // Poziția fluidă (smooth) pentru cursor
            cursorX: 0,
            cursorY: 0,
            // Culoarea generată aleatoriu la refresh
            currentColor: '#7C3AED',
            // Viteza de urmărire a cursorului (0.1 = foarte smooth, 0.3 = mai rapid)
            cursorSpeed: 0.15,
            // Lista ta de utilizatori online
            onlineUsers: [
                { initials: 'OC', name: 'Octav C.', bgColor: '#EDE9FE', textColor: '#5B21B6' },
                { initials: 'AL', name: 'Alex L.', bgColor: '#D1FAE5', textColor: '#065F46' },
                { initials: 'MR', name: 'Maria R.', bgColor: '#FEE2E2', textColor: '#991B1B' },
            ]
        };
    },
    // Se execută automat la refresh-ul paginii (când componenta se încarcă)
    mounted() {
        // 1. Schimbăm culoarea într-una complet aleatorie și vie
        this.currentColor = this.generateRandomColor();

        // 2. Pornim bucla de animație pentru efectul fluid (smooth tracking)
        this.animateSmoothCursor();
    },
    methods: {
        // Actualizează poziția reală a mouse-ului relativ la container
        updateMousePosition(e) {
            const rect = e.currentTarget.getBoundingClientRect();
            this.mouseX = e.clientX - rect.left;
            this.mouseY = e.clientY - rect.top;
        },

        // Calculează poziția fluidă utilizând interpolare (Lerp) la fiecare cadru video
        animateSmoothCursor() {
            // Formula de fluiditate: distanța scade progresiv
            this.cursorX += (this.mouseX - this.cursorX) * this.cursorSpeed;
            this.cursorY += (this.mouseY - this.cursorY) * this.cursorSpeed;

            // Rulăm funcția în mod continuu (asigură 60fps+)
            requestAnimationFrame(this.animateSmoothCursor);
        },

        // Generator de culori moderne (folosește HSL pentru a evita culorile urâte sau șterse)
        generateRandomColor() {
            const randomHue = Math.floor(Math.random() * 360);
            return `hsl(${randomHue}, 80%, 55%)`; // Saturație 80%, Luminozitate 55% pentru un look vibrant
        }
    }
}
</script>
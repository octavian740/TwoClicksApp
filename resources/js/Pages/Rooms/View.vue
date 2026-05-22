<template>

    <Head :title="`${room?.title || 'Camera'} room's`" />

    <div class="h-[89vh] bg-gray-50 p-6 flex flex-col gap-6 overflow-hidden">

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

            <div>
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
                <div>
                    <button @click="inviteModal = !inviteModal"
                        class="bg-indigo-500 hover:bg-indigo-400 text-white font-medium text-lg w-full py-1.5 rounded-lg mt-2.5">+
                        Invite aboard</button>
                </div>
            </div>
        </div>

        <div id="container" @mousemove="updateMousePosition" @mouseenter="isInside = true"
            @mouseleave="isInside = false"
            class="relative w-full rounded-2xl border-2 border-dashed cursor-none flex justify-center items-center overflow-hidden transition-colors duration-200 select-none flex-1 min-h-0"
            :class="isInside ? 'border-violet-400 bg-violet-50/40' : 'border-gray-300 bg-gray-100/60'">

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

    <Modal :closeable="true" :show="inviteModal" @close="inviteModal = false">
        <div class="bg-white rounded-3xl overflow-hidden">

            <div class="px-6 pt-6 pb-5 border-b border-gray-100 flex items-start justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 tracking-tight">
                        Invite people
                    </h2>

                    <p class="text-sm text-gray-500 mt-1 max-w-sm">
                        Invite teammates to collaborate in this cursor room.
                    </p>
                </div>

                <button @click="inviteModal = false"
                    class="w-10 h-10 rounded-xl flex items-center justify-center hover:bg-gray-100 text-gray-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-6 flex flex-col gap-6">

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Invite internally
                        </label>

                        <span class="text-xs text-gray-400">
                            {{ users.length }} users
                        </span>
                    </div>

                    <div class="relative">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>

                        <input v-model="searchQuery" type="text" placeholder="Search by username or email..."
                            class="w-full h-12 rounded-2xl border border-gray-200 bg-gray-50/70 pl-11 pr-4 text-sm text-gray-800 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />

                        <div v-if="searchQuery"
                            class="absolute left-0 right-0 top-14 bg-white border border-gray-200 rounded-2xl shadow-xl overflow-hidden z-50">
                            <div v-for="user in filteredUsers" :key="user.id"
                                class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 transition">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-sm font-semibold">
                                        {{ user.name.charAt(0) }}
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-900">
                                            {{ user.name }}
                                        </span>

                                        <span class="text-xs text-gray-400">
                                            {{ user.email }}
                                        </span>
                                    </div>
                                </div>

                                <button @click="sendInternalInvite(user.id)"
                                    class="px-4 h-9 rounded-xl bg-gray-900 text-white text-xs font-medium hover:bg-black active:scale-95 transition">
                                    Invite
                                </button>
                            </div>

                            <div v-if="!filteredUsers.length" class="py-8 text-center text-sm text-gray-400">
                                No users found.
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-3">
                        <label class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Share externally
                        </label>
                    </div>

                    <div class="grid grid-cols-3 gap-3">

                        <button @click="shareSocial('facebook')"
                            class="group border border-gray-200 hover:border-gray-300 bg-white rounded-2xl p-4 flex flex-col items-center justify-center gap-2 transition hover:-translate-y-0.5">
                            <div class="w-11 h-11 rounded-2xl bg-gray-100 flex items-center justify-center">
                                <i class="fa-brands fa-facebook-f text-[18px] text-gray-700"></i>
                            </div>

                            <span class="text-xs font-medium text-gray-700">
                                Facebook
                            </span>
                        </button>

                        <button @click="shareSocial('twitter')"
                            class="group border border-gray-200 hover:border-gray-300 bg-white rounded-2xl p-4 flex flex-col items-center justify-center gap-2 transition hover:-translate-y-0.5">
                            <div class="w-11 h-11 rounded-2xl bg-gray-100 flex items-center justify-center">
                                <i class="fa-brands fa-x-twitter text-[18px] text-gray-700"></i>
                            </div>

                            <span class="text-xs font-medium text-gray-700">
                                X
                            </span>
                        </button>

                        <button @click="shareSocial('whatsapp')"
                            class="group border border-gray-200 hover:border-gray-300 bg-white rounded-2xl p-4 flex flex-col items-center justify-center gap-2 transition hover:-translate-y-0.5">
                            <div class="w-11 h-11 rounded-2xl bg-gray-100 flex items-center justify-center">
                                <i class="fa-brands fa-whatsapp text-[18px] text-gray-700"></i>
                            </div>

                            <span class="text-xs font-medium text-gray-700">
                                WhatsApp
                            </span>
                        </button>

                        <button @click="shareSocial('messenger')"
                            class="group border border-gray-200 hover:border-gray-300 bg-white rounded-2xl p-4 flex flex-col items-center justify-center gap-2 transition hover:-translate-y-0.5">
                            <div class="w-11 h-11 rounded-2xl bg-gray-100 flex items-center justify-center">
                                <i class="fa-brands fa-facebook-messenger text-[18px] text-gray-700"></i>
                            </div>

                            <span class="text-xs font-medium text-gray-700">
                                Messenger
                            </span>
                        </button>

                        <button @click="shareSocial('telegram')"
                            class="group border border-gray-200 hover:border-gray-300 bg-white rounded-2xl p-4 flex flex-col items-center justify-center gap-2 transition hover:-translate-y-0.5">
                            <div class="w-11 h-11 rounded-2xl bg-gray-100 flex items-center justify-center">
                                <i class="fa-brands fa-telegram text-[18px] text-gray-700"></i>
                            </div>

                            <span class="text-xs font-medium text-gray-700">
                                Telegram
                            </span>
                        </button>

                        <button @click="shareSocial('tiktok')"
                            class="group border border-gray-200 hover:border-gray-300 bg-white rounded-2xl p-4 flex flex-col items-center justify-center gap-2 transition hover:-translate-y-0.5">
                            <div class="w-11 h-11 rounded-2xl bg-gray-100 flex items-center justify-center">
                                <i class="fa-brands fa-tiktok text-[18px] text-gray-700"></i>
                            </div>

                            <span class="text-xs font-medium text-gray-700">
                                TikTok
                            </span>
                        </button>

                    </div>
                </div>

                <div class="border border-gray-200 rounded-2xl p-4 bg-gray-50/70">
                    <div class="flex items-start justify-between gap-4 mb-3">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900">
                                Private invite link
                            </h3>

                            <p class="text-xs text-gray-500 mt-1">
                                Anyone with this link can request access.
                            </p>
                        </div>

                        <div
                            class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.828 10.172a4 4 0 0 0-5.656 5.656m1.414-7.07 1.414-1.415a4 4 0 0 1 5.657 5.657l-1.414 1.414m-7.071 1.414-1.414 1.414a4 4 0 1 0 5.657 5.657l1.414-1.414" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="text" readonly ref="inviteInput" :value="inviteUrl"
                            class="flex-1 h-11 rounded-xl border border-gray-200 bg-white px-4 text-sm text-gray-700 font-mono focus:outline-none" />

                        <button @click="copyToClipboard"
                            class="h-11 px-5 rounded-xl bg-gray-900 hover:bg-black text-white text-sm font-medium transition active:scale-95">
                            {{ copied ? 'Copied' : 'Copy' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </Modal>

</template>

<script>
import { Head } from '@inertiajs/vue3'
import Layout from "@/Layouts/Layout.vue";
import Modal from "@/Components/Modal.vue";
import Hashids from "hashids";

export default {
    components: {
        Head, Modal
    },

    props: {
        room: Object,
        users: Object
    },

    layout: Layout,

    data() {
        return {
            isInside: false,
            mouseX: 0,
            mouseY: 0,
            cursorX: 0,
            cursorY: 0,
            currentColor: '#7C3AED',
            cursorSpeed: 0.15,
            onlineUsers: [
                { initials: 'OC', name: 'Octav C.', bgColor: '#EDE9FE', textColor: '#5B21B6' },
                { initials: 'AL', name: 'Alex L.', bgColor: '#D1FAE5', textColor: '#065F46' },
                { initials: 'MR', name: 'Maria R.', bgColor: '#FEE2E2', textColor: '#991B1B' },
            ],
            inviteModal: false,
            copied: false,
            searchQuery: '',
        };
    },

    mounted() {
        this.currentColor = this.generateRandomColor();
        this.animateSmoothCursor();
    },

    computed: {
        inviteUrl() {
            return `${this.$page.props.ziggy.url}/rooms/invite/${this.generateHash(this.$page.props.auth.user.id)}/${this.generateHash(this.room.id)}`
        },

        filteredUsers() {
            if (!this.searchQuery) return []

            return this.users.filter(user =>
                user.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                user.email.toLowerCase().includes(this.searchQuery.toLowerCase())
            )
        }
    },

    methods: {
        updateMousePosition(e) {
            const rect = e.currentTarget.getBoundingClientRect();
            this.mouseX = e.clientX - rect.left;
            this.mouseY = e.clientY - rect.top;
        },

        animateSmoothCursor() {
            this.cursorX += (this.mouseX - this.cursorX) * this.cursorSpeed;
            this.cursorY += (this.mouseY - this.cursorY) * this.cursorSpeed;

            requestAnimationFrame(this.animateSmoothCursor);
        },

        generateRandomColor() {
            const randomHue = Math.floor(Math.random() * 360);
            return `hsl(${randomHue}, 80%, 55%)`;
        },

        generateHash(value) {
            const SALT = this.$page.props.app_key;
            const MIN_HASH_LENGTH = 8;
            const hashids = new Hashids(SALT, MIN_HASH_LENGTH);
            return hashids.encode(value);
        },

        copyToClipboard() {
            const inputElement = this.$refs.inviteInput;

            inputElement.select();
            inputElement.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(inputElement.value).then(() => {
                this.copied = true;

                setTimeout(() => {
                    this.copied = false;
                }, 2000);
            }).catch(err => {
                console.error('Nu s-a putut copia textul: ', err);
            });
        },

        shareSocial(platform) {
            const url = encodeURIComponent(this.inviteUrl)
            const text = encodeURIComponent(`Join my cursor room: ${this.room.title}`)

            let shareUrl = ''

            switch (platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`
                    break

                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?text=${text}&url=${url}`
                    break

                case 'whatsapp':
                    shareUrl = `https://wa.me/?text=${text}%20${url}`
                    break

                case 'telegram':
                    shareUrl = `https://t.me/share/url?url=${url}&text=${text}`
                    break

                case 'messenger':
                    shareUrl = `https://www.facebook.com/dialog/send?link=${url}&app_id=YOUR_APP_ID&redirect_uri=${url}`
                    break

                case 'tiktok':
                    navigator.clipboard.writeText(this.inviteUrl)

                    this.copied = true

                    setTimeout(() => {
                        this.copied = false
                    }, 2000)

                    alert('Invite link copied. Paste it in TikTok 😎')
                    return

                case 'instagram':
                    navigator.clipboard.writeText(this.inviteUrl)

                    this.copied = true

                    setTimeout(() => {
                        this.copied = false
                    }, 2000)

                    alert('Invite link copied. Paste it in Instagram Story 📸')
                    return
            }

            window.open(shareUrl, '_blank', 'width=700,height=700')
        },

    }
}
</script>
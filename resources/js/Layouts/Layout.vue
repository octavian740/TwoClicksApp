<template class="h-full bg-white">
    <div class="h-full">
        <div>
            <dialog id="sidebar" class="backdrop:bg-transparent lg:hidden">
                <div
                    class="fixed inset-0 bg-gray-900/80 transition-opacity duration-300 ease-linear data-closed:opacity-0">
                </div>

                <div tabindex="0" class="fixed inset-0 flex focus:outline-none">
                    <div
                        class="group/dialog-panel relative mr-16 flex w-full max-w-xs flex-1 transform transition duration-300 ease-in-out data-closed:-translate-x-full">
                        <div
                            class="absolute top-0 left-full flex w-16 justify-center pt-5 duration-300 ease-in-out group-data-closed/dialog-panel:opacity-0">
                            <button type="button" command="close" commandfor="sidebar" class="-m-2.5 p-2.5">
                                <span class="sr-only">Close sidebar</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6 text-white">
                                    <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>

                        <!-- Sidebar component, swap this element with another sidebar if you like -->
                        <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-indigo-600 px-6 pb-2">
                            <div class="flex h-16 shrink-0 items-center">
                                <div class="relative group cursor-pointer">
                                    <div
                                        class="absolute -inset-1 rounded-br-2xl bg-gradient-to-r from-blue-600 to-indigo-600 opacity-25 blur transition-all group-hover:opacity-100 group-hover:duration-200">
                                    </div>
                                    <div
                                        class="relative flex items-center gap-2 bg-white px-5 py-3 rounded-br-2xl ring-1 ring-slate-200/20">
                                        <div class="flex size-8 items-center justify-center rounded-lg bg-indigo-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="white" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M17.757 14.743l-1.59 1.59M6.166 4.666l1.591 1.591M3.75 10.5H6m2.243 4.743l1.59 1.59" />
                                            </svg>
                                        </div>
                                        <h1 class="text-2xl font-extrabold tracking-tighter text-slate-950">Two<span
                                                class="text-indigo-600">Clicks</span>App</h1>
                                    </div>
                                </div>
                            </div>
                            <nav class="flex flex-1 flex-col">
                                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                    <li>
                                        <ul role="list" class="-mx-2 space-y-1">
                                            <li>
                                                <Link href="/"
                                                    :class="isUrl('/dashboard') || isUrl('/') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700'"
                                                    class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" data-slot="icon" aria-hidden="true"
                                                    class="size-6 shrink-0 text-white">
                                                    <path
                                                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                Dashboard
                                                </Link>
                                            </li>
                                            <li>
                                                <Link href="/rooms"
                                                    :class="isUrl('rooms') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700'"
                                                    class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                                </svg>

                                                Rooms
                                                </Link>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </dialog>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="relative flex grow flex-col gap-y-5 overflow-y-auto bg-indigo-600 px-6">
                <div class="flex h-16 shrink-0 items-center">
                    <div class="relative group cursor-pointer">
                        <div
                            class="absolute -inset-1 rounded-br-2xl bg-gradient-to-r from-blue-600 to-indigo-600 opacity-25 blur transition-all group-hover:opacity-100 group-hover:duration-200">
                        </div>
                        <div
                            class="relative flex items-center gap-2 bg-white px-5 py-3 rounded-br-2xl ring-1 ring-slate-200/20">
                            <div class="flex size-8 items-center justify-center rounded-lg bg-indigo-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="white" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M17.757 14.743l-1.59 1.59M6.166 4.666l1.591 1.591M3.75 10.5H6m2.243 4.743l1.59 1.59" />
                                </svg>
                            </div>
                            <h1 class="text-2xl font-extrabold tracking-tighter text-slate-950">Two<span
                                    class="text-indigo-600">Clicks</span>App</h1>
                        </div>
                    </div>
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <Link href="/"
                                        :class="isUrl('dashboard') || isUrl('') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700'"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true" class="size-6 shrink-0 text-white">
                                        <path
                                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Dashboard
                                    </Link>
                                </li>
                                <li>
                                    <Link href="/rooms"
                                        :class="isUrl('rooms') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700'"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                    </svg>
                                    Rooms
                                    </Link>
                                </li>
                            </ul>
                        </li>
                        <li class="-mx-6 mt-auto">
                            <a href="#"
                                class="flex items-center gap-x-4 px-6 py-3 text-sm/6 font-semibold text-white hover:bg-indigo-700">
                                <img :src="`https://ui-avatars.com/api/?name=${$page.props.auth.user.name}`" alt=""
                                    class="size-8 rounded-full bg-indigo-700 outline -outline-offset-1 outline-white/10" />
                                <span class="sr-only">Your profile</span>
                                <span aria-hidden="true">{{ $page.props.auth.user.name }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="sticky top-0 z-40 flex items-center gap-x-6 bg-indigo-600 px-4 py-4 shadow-xs sm:px-6 lg:hidden">
            <button type="button" command="show-modal" commandfor="sidebar"
                class="-m-2.5 p-2.5 text-indigo-200 hover:text-white lg:hidden">
                <span class="sr-only">Open sidebar</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                    aria-hidden="true" class="size-6">
                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="flex-1 text-sm/6 font-semibold text-white">Dashboard</div>
            <a href="#">
                <span class="sr-only">Your profile</span>
                <img :src="`https://ui-avatars.com/api/?name=${$page.props.auth.user.name}`" alt=""
                    class="size-8 rounded-full bg-indigo-700 outline -outline-offset-1 outline-white/10" />
            </a>
        </div>

        <main class="py-10 lg:pl-72">
            <div class="px-4 sm:px-6 lg:px-8">
                <slot />
            </div>
        </main>
    </div>
    <Modal :show="invitations.show_modal" @close="invitations.show_modal = false">
        <div class="flex justify-end">
            <button @click="invitations.show_modal = false"
                class="w-10 h-10 m-3 rounded-full flex items-center justify-center hover:bg-gray-100 text-gray-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div>
            <div
                class="w-full bg-white border-b border-l border-r border-gray-200/80 rounded-2xl shadow-xl shadow-gray-100/40 overflow-hidden p-6 md:p-8 flex flex-col items-center text-center relative">

                <div
                    class="w-16 h-16 bg-gradient-to-tr from-indigo-50 to-indigo-100 border border-indigo-200 text-indigo-600 rounded-full flex items-center justify-center text-2xl font-bold shadow-inner mb-4 mt-2">
                    {{invited_by.name.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2)}}
                </div>

                <span class="text-xs font-bold uppercase tracking-widest text-indigo-600 mb-1">
                    Workspace Invitation
                </span>

                <h1 class="text-xl font-semibold text-gray-900 tracking-tight px-2">
                    <span class="font-bold text-indigo-600">{{ room.created_by.name }}</span> has invited you to join
                    them
                </h1>

                <div v-if="$page.props.auth.user.id === room.created_by.id" class="w-full my-6 flex flex-col gap-4">
                    <div
                        class="w-full bg-amber-50 border border-amber-200 rounded-xl p-4 text-left flex items-start gap-3">
                        <span class="p-1 bg-amber-100 rounded-lg text-amber-700 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                        </span>
                        <div class="flex flex-col gap-1">
                            <h4 class="text-sm font-semibold text-amber-800">You created this invitation</h4>
                            <p class="text-xs text-amber-700 leading-relaxed">
                                You cannot accept an invitation sent by yourself. You are already the administrator or a
                                member of this room.
                            </p>
                        </div>
                    </div>

                    <Link href="/rooms"
                        class="w-full px-5 py-3 text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200/80 active:scale-[0.98] rounded-xl transition-all text-center">
                    Back to Rooms
                    </Link>
                </div>

                <template v-else>
                    <div
                        class="w-full bg-gray-50 border border-gray-100 rounded-xl p-4 my-6 text-left flex flex-col gap-2 transition-all hover:border-gray-200">
                        <div class="flex items-center gap-2">
                            <span class="p-1.5 bg-white rounded-lg border border-gray-200 text-gray-500 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3-1m1.5-1.5V3m-1.5 1.5H1.5m2 3.5h7M3 17h1m1-3h1" />
                                </svg>
                            </span>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Room Name</span>
                        </div>

                        <h2 class="text-lg font-bold text-gray-800 leading-tight">
                            {{ room.title }}
                        </h2>

                        <p v-if="room.excerpt" class="text-sm text-gray-500 leading-relaxed">
                            {{ room.excerpt }}
                        </p>

                        <div
                            class="flex items-center gap-1.5 text-xs text-gray-400 mt-1 pt-2 border-t border-gray-200/60">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-3.5 h-3.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            <span>Maximum capacity: {{ room.max_clients }} people</span>
                        </div>
                    </div>

                    <div class="w-full flex flex-col sm:flex-row items-center gap-3 mt-2">
                        <button @click="invitationsPrompt('decline')" type="button"
                            class="w-full sm:w-1/2 order-2 sm:order-1 px-5 py-3 text-sm font-semibold text-gray-500 hover:text-gray-700 bg-gray-100 hover:bg-gray-200/80 active:scale-[0.98] rounded-xl transition-all">
                            Decline
                        </button>

                        <button @click="invitationsPrompt('accept')" type="button"
                            class="w-full sm:w-1/2 order-1 sm:order-2 px-5 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-500 shadow-md shadow-indigo-200 active:scale-[0.98] rounded-xl transition-all">
                            Accept Invitation
                        </button>
                    </div>
                </template>

                <p class="text-xs text-gray-400 mt-6">
                    This invitation is intended for your current account.
                </p>
            </div>
        </div>
    </Modal>
</template>

<script>
import Modal from "@/Components/Modal.vue";
import { Link } from "@inertiajs/vue3";
import Echo from "laravel-echo";

export default {

    components: {
        Link, Modal
    },

    data() {
        return {
            invitations: {
                show_modal: false,
            },
            room: {},
        }
    },

    mounted() {
        this.listenForInvitations();
    },

    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1);
            if (urls[0] === "") {
                return currentUrl === "";
            }

            return urls.filter((url) => currentUrl.startsWith(url)).length;
        },

        playNotificationSound() {
            var audio = new Audio('assets/sounds/notifications/invite_notification_sound.mp3');
            audio.play();
        },

        listenForInvitations() {
            window.Echo.private(`receive-invitations.${this.$page.props.auth.user.id}`)
                .listen('.receive-invitations-event', (e) => {

                    this.playNotificationSound();

                    this.invitations.show_modal = true;
                    this.room = e.room;
                    this.invited_by = e.user;
                });
        },

        invitationsPrompt(value) {
            axios.post(`/rooms/invite/${this.room.id}/${value}`)
                .then((response) => {
                    this.invitations.show_modal = false;
                })
                .catch((errors) => {
                    console.error(errors);
                });
        }
    }
}

</script>
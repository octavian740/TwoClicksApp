<template>
    <Head :title="`Invitation from ${invited_by.name}`" />

    <div class="min-h-[89vh] bg-gray-50 flex items-center justify-center p-4 selection:bg-indigo-100">
        <div class="w-full max-w-md bg-white border border-gray-200/80 rounded-2xl shadow-xl shadow-gray-100/40 overflow-hidden p-6 md:p-8 flex flex-col items-center text-center relative">

            <div class="w-16 h-16 bg-gradient-to-tr from-indigo-50 to-indigo-100 border border-indigo-200 text-indigo-600 rounded-full flex items-center justify-center text-2xl font-bold shadow-inner mb-4 mt-2">
                {{ invited_by.name.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2) }}
            </div>

            <span class="text-xs font-bold uppercase tracking-widest text-indigo-600 mb-1">
                Workspace Invitation
            </span>
            
            <h1 class="text-xl font-semibold text-gray-900 tracking-tight px-2">
                <span class="font-bold text-indigo-600">{{ invited_by.name }}</span> has invited you to join them
            </h1>

            <div v-if="$page.props.auth.user.id === invited_by.id" class="w-full my-6 flex flex-col gap-4">
                <div class="w-full bg-amber-50 border border-amber-200 rounded-xl p-4 text-left flex items-start gap-3">
                    <span class="p-1 bg-amber-100 rounded-lg text-amber-700 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                    </span>
                    <div class="flex flex-col gap-1">
                        <h4 class="text-sm font-semibold text-amber-800">You created this invitation</h4>
                        <p class="text-xs text-amber-700 leading-relaxed">
                            You cannot accept an invitation sent by yourself. You are already the administrator or a member of this room.
                        </p>
                    </div>
                </div>

                <Link 
                    href="/rooms" 
                    class="w-full px-5 py-3 text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200/80 active:scale-[0.98] rounded-xl transition-all text-center"
                >
                    Back to Rooms
                </Link>
            </div>

            <template v-else>
                <div class="w-full bg-gray-50 border border-gray-100 rounded-xl p-4 my-6 text-left flex flex-col gap-2 transition-all hover:border-gray-200">
                    <div class="flex items-center gap-2">
                        <span class="p-1.5 bg-white rounded-lg border border-gray-200 text-gray-500 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3-1m1.5-1.5V3m-1.5 1.5H1.5m2 3.5h7M3 17h1m1-3h1" />
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

                    <div class="flex items-center gap-1.5 text-xs text-gray-400 mt-1 pt-2 border-t border-gray-200/60">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <span>Maximum capacity: {{ room.max_clients }} people</span>
                    </div>
                </div>

                <div class="w-full flex flex-col sm:flex-row items-center gap-3 mt-2">
                    <Link 
                        method="post"
                        :href="`/rooms/invite/${room.id}/decline`"
                        as="button"
                        class="w-full sm:w-1/2 order-2 sm:order-1 px-5 py-3 text-sm font-semibold text-gray-500 hover:text-gray-700 bg-gray-100 hover:bg-gray-200/80 active:scale-[0.98] rounded-xl transition-all"
                    >
                        Decline
                    </Link>

                    <Link 
                        method="post"
                        :href="`/rooms/invite/${room.id}/accept`"
                        as="button"
                        class="w-full sm:w-1/2 order-1 sm:order-2 px-5 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-500 shadow-md shadow-indigo-200 active:scale-[0.98] rounded-xl transition-all"
                    >
                        Accept Invitation
                    </Link>
                </div>
            </template>

            <p class="text-xs text-gray-400 mt-6">
                This invitation is intended for your current account.
            </p>
        </div>
    </div>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import { Head, Link } from "@inertiajs/vue3";

export default {
    components: {
        Head, Link
    },

    props: {
        invited_by: {
            type: Object,
            required: true
        },
        room: {
            type: Object,
            required: true
        }
    },

    layout: Layout
}
</script>
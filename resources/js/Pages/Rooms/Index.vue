<template>

    <Head title="Rooms"></Head>
    <div class="container mx-auto px-4">
        <div class="py-5">
            <h1 class="text-5xl font-black text-gray-800">Available Rooms</h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 py-4">
            <div v-for="room in rooms" :key="room.id"
                class="bg-white border border-neutral-200 rounded-xl p-5 flex flex-col gap-3 hover:border-neutral-300 transition-colors">
                <div class="flex items-start justify-between gap-2">
                    <Link :href="`/rooms/${room.id}`"
                        class="text-[15px] font-medium text-neutral-900 leading-snug hover:underline hover:text-blue-500 transition-all">
                    {{ room.title }}
                    </Link>
                    <span :class="room.status
                        ? 'bg-green-50 text-green-700'
                        : 'bg-red-50 text-red-700'"
                        class="flex-shrink-0 text-[11px] font-medium px-2.5 py-1 rounded-full">
                        {{ room.status ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                <p class="text-[13px] text-neutral-500 leading-relaxed flex-1">
                    {{ room.excerpt }}
                </p>

                <div class="flex items-center justify-between pt-3 border-t border-neutral-100">
                    <div class="flex items-center gap-2">
                        <div
                            class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-[10px] font-medium text-blue-700 flex-shrink-0">
                            {{room.created_by.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase()}}
                        </div>
                        <span class="text-xs text-neutral-500">{{ room.created_by.name }}</span>
                    </div>

                    <div class="flex items-center gap-1.5 text-neutral-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <span class="text-xs font-medium text-neutral-600">{{ room.max_clients }}</span>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h1 class="text-xl font-bold">{{ room.name }}</h1>

                            <span v-if="room.created_by.id === $page.props.auth.user.id"
                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-650/20">
                                Owner
                            </span>

                            <span v-else
                                class="inline-flex items-center rounded-md bg-amber-50 px-2 py-1 text-xs font-medium text-amber-700 ring-1 ring-inset ring-amber-600/20">
                                Invited
                            </span>
                        </div>
                    </div>
                </div>
            </div>
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
        rooms: Object
    },

    layout: Layout
}
</script>
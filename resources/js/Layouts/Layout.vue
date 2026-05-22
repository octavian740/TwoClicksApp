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
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {

    components: {
        Link
    },

    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1);
            if (urls[0] === "") {
                return currentUrl === "";
            }

            return urls.filter((url) => currentUrl.startsWith(url)).length;
        },
    }
}

</script>
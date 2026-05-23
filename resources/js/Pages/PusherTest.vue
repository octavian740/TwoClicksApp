<template>
    Pagina de test al pusher<br />
    <button @click.prevent="sendTestMessage"
        :class="loading ? 'bg-gray-400 hover:bg-gray-500 text-gray-800' : 'bg-indigo-500 hover:bg-indigo-400 text-white'"
        class="px-2 py-1 font-semibold rounded text-sm">Trimite mesaj de test</button>
    <br />
    <p v-if="success" class="text-sm text-green-600 font-semibold mt-5">Trimis cu success.</p>

    <p v-for="(message, index) in messages" :key="index">{{ message }}</p>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import Echo from "laravel-echo";


export default {

    data() {
        return {
            loading: false,
            success: false,
            messages: [],
        }
    },

    mounted() {
        this.listenToWh();
    },

    methods: {
        sendTestMessage() {
            this.loading = true;
            axios.get(`/send-webhook`)
                .then((resp) => {
                    this.success = true;
                })
                .catch((errors) => {
                    console.error(errors);
                })
                .finally(() => {
                    this.loading = false;
                    setTimeout(() => {
                        this.success = false;
                    }, 3000);
                })
        },

        listenToWh() {
            window.Echo.channel('my-channel')
                .listen('.test-wh-event', (e) => {
                    console.log("S-a primit cu succes:", e);
                    this.messages.push(e.message);
                });
        }
    },

    layout: Layout
}

</script>
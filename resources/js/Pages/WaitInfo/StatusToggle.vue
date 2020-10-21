<template>
    <div class="py-6 lg:w-1/4">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white shadow sm:rounded-lg border-b">
                <jet-button @click.native="ToggleStatus">
                    {{this.form.status}}
                </jet-button>
            </div>
        </div>
    </div>
</template>

<script>
    import JetButton from './../../Jetstream/Button'

    export default {
        components: {
            JetButton,
        },

        props: ['user'],

        methods: {
            ToggleStatus() {
                this.form.post('/user/changeStatus', {
                    '_method': 'POST',
                    preserveScroll: true
                })
            },
        },

        data() {
            return {
                form: this.$inertia.form({
                    status: this.user.status,
                    id: this.user.id,
                })
            }
        },


    }
</script>

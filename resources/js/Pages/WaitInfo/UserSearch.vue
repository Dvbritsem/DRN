<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-b">
                <jet-form-section @submitted="searchUser">
                    <template #title>
                        Zoek een lid
                    </template>

                    <template #description>
                        Vul hier de naam in van het lid.
                    </template>

                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="name" value="Naam" />
                            <jet-input id="Name" type="text" class="mt-1 block w-full"/>
                        </div>
                    </template>

                    <template #actions>
                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Zoeken
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </div>
</template>

<script>
    import JetActionMessage from './../../Jetstream/ActionMessage'
    import JetButton from './../../Jetstream/Button'
    import JetFormSection from './../../Jetstream/FormSection'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetLabel from './../../Jetstream/Label'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },

        props: ['users'],

        data() {
            return {
                form: this.$inertia.form({
                    name: null,
                })
            }
        },

        methods: {
            searchUser() {
                this.form.post('/user/wachtlijst/search', {
                    preserveScroll: true
                })
            },
        },
    }
</script>

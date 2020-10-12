<template>
    <div class="py-6 lg:w-1/4">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg border-b">
                <jet-form-section2 @submitted="filterUsers">
                    <template #title>
                        Filter
                    </template>

                    <template #description>
                        Laat alle leden van een speltak zien.
                    </template>

                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="speltak">
                                Speltak
                            </jet-label>
                            <div class="relative">
                                <select class="form-input rounded-md shadow-sm" id="speltak" v-model="form.speltak">
                                    <option selected value="">Alle</option>
                                    <option>Bevers</option>
                                    <option>Welpen</option>
                                    <option>Zeeverkenners</option>
                                </select>
                            </div>
                        </div>
                    </template>

                    <template #actions>
                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Filter
                        </jet-button>
                    </template>
                </jet-form-section2>
            </div>
        </div>
    </div>
</template>

<script>
    import JetActionMessage from './../../Jetstream/ActionMessage'
    import JetButton from './../../Jetstream/Button'
    import JetFormSection2 from './../../Jetstream/FormSection2'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetLabel from './../../Jetstream/Label'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection2,
            JetInput,
            JetInputError,
            JetLabel,
        },

        props: ['users'],

        methods: {
            filterUsers() {
                this.form.post('/user/wachtlijst', {
                    preserveScroll: true
                })
            },
        },

        data() {
            return {
                form: this.$inertia.form({
                    speltak: this.speltak,
                })
            }
        },


    }
</script>

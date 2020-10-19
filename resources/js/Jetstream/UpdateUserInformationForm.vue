<template>
    <jet-form-section @submitted="updateUserInformation">
        <template #title>
            Lid gegevens
        </template>

        <template #description>
            Hier kun je gegevens van dit lid aanpassen.
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <jet-input-error :message="form.error('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.error('email')" class="mt-2" />
            </div>

            <!-- Birthday -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="birthday" value="Birthday" />
                <jet-input id="birthday" type="date" class="mt-1 block w-full" v-model="form.birthday" />
                <jet-input-error :message="form.error('birthday')" class="mt-2" />
            </div>

            <!-- Speltak -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="speltak" value="Speltak" />
                <jet-input id="speltak" type="text" class="mt-1 block w-full" v-model="form.speltak" />
                <jet-input-error :message="form.error('speltak')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetButton from './../Jetstream/Button'
    import JetFormSection from './../Jetstream/FormSection'
    import JetInput from './../Jetstream/Input'
    import JetInputError from './../Jetstream/InputError'
    import JetLabel from './../Jetstream/Label'
    import JetActionMessage from './../Jetstream/ActionMessage'
    import JetSecondaryButton from './../Jetstream/SecondaryButton'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        props: ['lid'],

        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'POST',
                    name: this.lid.name,
                    email: this.lid.email,
                    birthday: this.lid.birthday,
                    speltak: this.lid.speltak,
                    id: this.lid.id,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            updateUserInformation() {
                    this.form.post('/user/view/'+this.lid.id, {
                        preserveScroll: true,
                    });
            },
        },
    }
</script>

<template>
    <jet-action-section>
        <template #title>
            Delete user
        </template>

        <template #description>
            Haalt lid van de wachtlijst.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Verwijder alle data van dit lid uit de database.
            </div>

            <div class="mt-5">
                <jet-danger-button @click.native="confirmUserDeletion">
                    Verwijder lid
                </jet-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-dialog-modal :show="confirmingUserDeletion" @close="confirmingUserDeletion = false">
                <template #title>
                    Verwijder lid
                </template>

                <template #content>
                    Are you sure you want to delete this account? Once this account is deleted, all of its resources and data will be permanently deleted.

                </template>

                <template #footer>
                    <jet-secondary-button @click.native="confirmingUserDeletion = false">
                        Nevermind
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click.native="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Verwijder lid
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from './ActionSection'
    import JetButton from './Button'
    import JetDialogModal from './DialogModal'
    import JetDangerButton from './DangerButton'
    import JetInput from './Input'
    import JetInputError from './InputError'
    import JetSecondaryButton from './SecondaryButton'

    export default {
        components: {
            JetActionSection,
            JetButton,
            JetDangerButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        props: ['lid'],

        data() {
            return {
                confirmingUserDeletion: false,
                deleting: false,

                form: this.$inertia.form({
                    '_method': 'DELETE',
                    id: this.lid.id,
                }, {
                    bag: 'deleteUser'
                })
            }
        },

        methods: {
            confirmUserDeletion() {
                this.form.id = this.lid.id;

                this.confirmingUserDeletion = true;
            },

            deleteUser() {
                this.form.post('/user/delete', {
                    preserveScroll: false
                }).then(response => {
                    if (! this.form.hasErrors()) {
                        this.confirmingUserDeletion = false;
                    }
                })
            },
        },
    }
</script>

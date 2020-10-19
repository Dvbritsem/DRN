<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <update-user-information-form
                    :lid="lid"
                />

                <jet-section-border />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '../Layouts/AppLayout'
    import JetSectionBorder from '../Jetstream/SectionBorder'
    import UpdateUserInformationForm from '../Jetstream/UpdateUserInformationForm'

    export default {
        props: ['lid'],

        components: {
            AppLayout,
            JetSectionBorder,
            UpdateUserInformationForm,
        },
    }
</script>

<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Wachtlijst
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <jet-application-logo class="block h-12 w-auto" />
                    </div>

                    <div class="mt-8 text-2xl">
                        Welcome to your Jetstream application!
                    </div>

                    <div class="mt-6 text-gray-500">
                        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                        ecosystem to be a breath of fresh air. We hope you love it.
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-b">
                    <Speltak
                        :speltak="speltak"
                    />
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-b">
                    <WaitTime
                        :waittime="waittime"
                    />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from "../Layouts/AppLayout";
    import JetApplicationLogo from '../Jetstream/ApplicationLogo'
    import Speltak from "./WaitInfo/Speltak";
    import WaitTime from "./WaitInfo/WaitTime";

    export default {
        components: {
            AppLayout,
            JetApplicationLogo,
            Speltak,
            WaitTime,
        },
        props: ['speltak', 'waittime'],
    }
</script>

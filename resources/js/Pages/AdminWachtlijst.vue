<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Wachtlijst
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-b">
                    <UsersList :users="users"/>
                </div>
            </div>
        </div>

        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-b">
                    <UserSearch :users="users"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from "../Layouts/AppLayout";
    import UsersList from "./WaitInfo/UsersList";
    import UserSearch from "./WaitInfo/UserSearch";

    export default {
        components: {
            AppLayout,
            UsersList,
            UserSearch,
        },
        props: ['users'],
    }
</script>

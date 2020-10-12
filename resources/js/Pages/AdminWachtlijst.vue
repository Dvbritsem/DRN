<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Wachtlijst
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-b">
                <div class="bg-gray-200 bg-opacity-25 flex space-x-6 justify-center flex-wrap">
                    <UserSearch :users="users"/>
                    <UserFilter />
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-b">
                <UsersList :users="users"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from "../Layouts/AppLayout";
    import UsersList from "./WaitInfo/UsersList";
    import UserSearch from "./WaitInfo/UserSearch";
    import UserFilter from "./WaitInfo/UserFilter";

    export default {
        components: {
            AppLayout,
            UsersList,
            UserSearch,
            UserFilter,
        },
        props: ['users'],
    }
</script>

<template>
    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
        <div class="p-6">
            <div class="flex items-center">
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Wachttijd</div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-sm text-gray-500">
                    <p>Hier komt de wachttijd te staan.</p>
                    <p v-show="waittime">{{waittime}} dagen</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['waittime'],
    }
</script>

<template>
    <div class="container mx-auto py-10">
        <div v-if="loading">
            Loading data
        </div>
        <div v-else class="px-4">
            <div
                class="border-2 dark:border-white overflow-hidden rounded-lg flex"
            >
                <div>
                    <img :src="characterDetails.image_url" alt="">
                </div>
                <div class="p-3">
                    <h1 class="text-3xl dark:text-white font-bold">{{ characterDetails.name }}</h1>
                    <ul>
                        <li><span class="font-bold">Species:</span> {{ characterDetails.species }}</li>
                        <li><span class="font-bold">Status:</span> {{ characterDetails.status }}</li>
                        <li><span class="font-bold">Gender:</span> {{ characterDetails.gender }}</li>
                        <li><span class="font-bold">Origin:</span> {{ characterDetails.origin }}</li>
                        <li><span class="font-bold">Location:</span> {{ characterDetails.location }}</li>
                    </ul>
                    <p>Showed in {{ characterDetails.episodes }} episodes</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            urlBase: '/api/characters',
            loading: false,
            characterDetails: [],
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios
                .get(this.urlBase + '/' + this.$route.params.id)
                .then((response) => {
                    if (response.status === 200 && response.data) {
                        this.characterDetails = response.data;
                    }

                    this.loading = false;
                });
        },
    },
};
</script>

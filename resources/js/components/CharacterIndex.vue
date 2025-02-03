<template>
    <div class="container mx-auto py-10">
        <div v-if="loading">
            Loading data
        </div>
        <div v-else class="grid md:grid-cols-4 gap-8">
            <div
                v-for="character in charactersList"
                class="pb-2 border-2 dark:border-white hover:border-red-600 overflow-hidden rounded-lg"
            >
                <router-link :to="{ name: 'character.view', params: { id: character.id } }">
                    <img :src="character.image_url" alt="">
                    <p class="mt-2 mx-2">{{ character.name }}</p>
                </router-link>
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
            charactersList: [],
            page: 1,
        };
    },
    created() {
        this.fetchData();
    },
    mounted() {
        this.loading = true;
        this.scroll();
    },
    methods: {
        fetchData() {
            axios
                .get(this.urlBase + '?page=' + this.page)
                .then((response) => {
                    if (response.status === 200 && response.data) {
                        this.charactersList = this.charactersList.concat(response.data);
                    }

                    this.loading = false;
                });
        },
        scroll () {
            window.onscroll = () => {
                let bottomOfWindow = Math.max(window.pageYOffset, document.documentElement.scrollTop, document.body.scrollTop) + window.innerHeight === document.documentElement.offsetHeight

                if (bottomOfWindow) {
                    this.page++;
                    this.fetchData();
                }
            }
        }
    },
};
</script>

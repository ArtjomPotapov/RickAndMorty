import './bootstrap';

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import axios from 'axios'
import VueAxios from 'vue-axios'
import App from './layouts/App.vue'
import CharacterIndex from './components/CharacterIndex.vue'
import CharacterView from './components/CharacterView.vue'

const routes = [
    { 
        path: '/',
        name: 'character.index',
        component: CharacterIndex 
    },
    { 
        path: '/:id',
        name: 'character.view',
        component: CharacterView 
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

createApp(App)
    .use(router, VueAxios, axios)
    .mount('#app')
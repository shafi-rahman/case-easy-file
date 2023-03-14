import './bootstrap';
// import { createApp } from 'vue';
import {createApp} from 'vue/dist/vue.esm-bundler.js';


window.url = 'http://127.0.0.1:8000/api/';


import ProfileHeader from './components/client/profile-header.vue';
import ProfileContent from './components/client/profile-content.vue';

const ProfileHeaderRoot = createApp({
    data() {
        return {
            message: 'Hello root Component 1'
        };
    },
    components: {
        'profile-header': ProfileHeader,
    },
}, );
ProfileHeaderRoot.mount('#root-profile-header');

const ProfileContentRoot = createApp({
    data() {
        return {
            message: 'Hello root Component 2'
        };
    },
    components: {
        'profile-content': ProfileContent,
    },
}, );
ProfileContentRoot.mount('#root-profile-content');
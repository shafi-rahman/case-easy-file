import './bootstrap';
// import { createApp } from 'vue';
import {createApp} from 'vue/dist/vue.esm-bundler.js';


window.url = 'http://127.0.0.1:8000/api/';


import ProfileHeader from './components/client/profile-header.vue';
import ProfileContent from './components/client/profile-content.vue';
import clientStatusupdate from './components/client/client-statusupdate.vue'; 
import sendEmailPopup from './components/client/send-mail-popup.vue';
import addQuote from './components/client/add-quote.vue';

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

const rootClientStatusupdate = createApp({
    data() {
        return {
            message: 'root-client-statusupdate'
        };
    },
    components: {
        'client-statusupdate': clientStatusupdate,
    },
}, );
rootClientStatusupdate.mount('#root-client-statusupdate'); 

const rootSendEmailPopup = createApp({
    data() {
        return {
            message: 'root-client-statusupdate'
        };
    },
    components: {
        'send-email-popup': sendEmailPopup,
    },
}, );
rootSendEmailPopup.mount('#root-send-email-popup');

const rootAddQuote = createApp({
    data() {
        return {
            message: 'root-add-quote'
        };
    },
    components: {
        'add-quote': addQuote,
    },
}, );
rootAddQuote.mount('#root-add-quote');
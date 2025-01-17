import { createApp } from 'vue';
import "preline/preline";

import Homepage from './Components/homepage.vue';



const app = createApp({});
app.component('Homepage', Homepage);
app.mount('#app');
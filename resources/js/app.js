require('./bootstrap');

import { createApp } from 'vue';
import router from './routes';

import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp(ExampleComponent);

app.use(router);

app.mount('#app');

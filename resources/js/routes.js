import { createRouter, createWebHistory } from 'vue-router';

import Signin from './components/auth/Signin';
import Dashboard from './components/dashboard/Dashboard';
import Projects from './components/projects/Projects';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'login',
            path: '/login',
            component: Signin,
        },
        {
            name: 'dashboard',
            path: '/dashboard',
            component: Dashboard,
        },
        {
            name: 'projects',
            path: '/projects',
            component: Projects,
        },
    ],
});

export default router;
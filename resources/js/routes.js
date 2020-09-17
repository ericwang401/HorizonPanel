import Vue  from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/views/Home';
import Clients from '@/js/views/Clients';
import Auth from '@/js/views/Signin';

Vue.use(VueRouter);

const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/admin/',
			name: 'Home',
			component: Home
		},
		{
			path: '/admin/clients',
			name: 'Clients',
			component: Clients
		},
		{
			path: '/admin/signin',
			name: 'Sign In',
			component: Auth
		},
	]
});

export default router;
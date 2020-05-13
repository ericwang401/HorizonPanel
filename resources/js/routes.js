import Vue  from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/views/Home';
import Clients from '@/js/views/Clients'

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
	]
});

export default router;
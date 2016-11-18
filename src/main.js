// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Sass from './sass/front.scss';
import Vue from 'vue'
import App from './App'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


// Pages
import Home from './pages/Home'
import Format from './pages/Format'
import Tag from './pages/Tag'
import About from './pages/About'

const routes = [
	{path: '/', component: Home},
	{path: '/t/:tag', component: Tag},
	{path: '/f/:format', component: Format},
	{path: '/about', component: About},
];

const router = new VueRouter({
	mode: 'history',
	routes
})

new Vue({
  el: '#app',
  router,
  render: h => h(App)
})

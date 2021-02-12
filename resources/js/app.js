require('./bootstrap');


import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import Notifications from 'vue-notification'
Vue.use(Notifications)

InertiaProgress.init({
   delay: 250,
   color: '#29d',
   includeCSS: true,
   showSpinner: false,
})

Vue.use(plugin)

const el = document.getElementById('app')


new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(el)
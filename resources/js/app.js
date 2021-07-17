require('./bootstrap');
window.Vue = require('vue').default;

import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { Link } from '@inertiajs/inertia-vue'
import Vuetify from 'vuetify'

Vue.use(Vuetify)
Vue.mixin({ methods: { route }})

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, app, props }) {
    new Vue({
      vuetify: new Vuetify({
          theme: {grey: true}
      }),
      render: h => h(app, props),
    }).$mount(el)
  },
})
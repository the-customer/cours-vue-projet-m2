import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import BaseLayout from './Layouts/BaseLayout.vue'
import { ZiggyVue } from 'ziggy';
import '../css/app.css';
import { InertiaProgress } from '@inertiajs/progress';


InertiaProgress.init({
  delay:0,
  color: '#DC2627',
  includeCSS: true,
  showSpinner:true,
})


createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    
    const page = pages[`./Pages/${name}.vue`]
    
    page.default.layout =  page.default.layout || BaseLayout

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el)
  },
})
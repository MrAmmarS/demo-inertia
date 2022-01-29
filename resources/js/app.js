import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;

    return page; 
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .mount(el)
  },

  // Set Default Title
  // title: () => "My App"
  title: title => `My App - ${title}`
});



// createInertiaApp({
//   resolve: name => {
//     let page = require(`./Pages/${name}`).default;

//     page.layout == undefined ? null : Layout;

//     return page; 
//   },
//   setup({ el, App, props, plugin }) {
//     createApp({ render: () => h(App, props) })
//       .use(plugin)
//       .component("Link", Link)
//       .component("Head", Head)
//       .mount(el)
//   },

//   title: title => `My App - ${title}`
// });

// InertiaProgress.init({
//   color: '#29d',

// });
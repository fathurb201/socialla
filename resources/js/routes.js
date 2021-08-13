import Home from './views/Home.vue'
// import Product from './views/Product.vue'
import Dashboard from './views/Dashboard.vue'
import Cart from './views/Cart.vue'
import Checkout from './views/Checkout.vue'
import Contact from './views/Contact.vue'
import Blog from './views/Blog.vue'

// layouts
import DashboardHeader from './views/layouts/DashboardHeader.vue'
import Header from './views/layouts/Header.vue'
import Footer from './views/layouts/Footer.vue'
import Product from './views/layouts/Product.vue'
import Slider from './views/layouts/Slider.vue'
import StartMediumBanner from './views/layouts/StartMediumBanner.vue'
import StartSmallBanner from './views/layouts/StartSmallBanner.vue'


// component
import ProductComponent from './components/ProductComponent.vue'

export const routes = [
    // {
    //     name: 'home',
    //     path: '/',
    //     component: AllProduct
    // },
    // {
    //     name: 'create',
    //     path: '/create',
    //     component: CreateProduct
    // },
    // {
    //     name: 'edit',
    //     path: '/edit/:id',
    //     component: EditProduct
    // }

    {
      path: '/blog',
      name: 'Blog',
      components: {default: Blog, Header, Footer}
    },
    {
      path: '/contact',
      name: 'Contact',
      components: {default: Contact, Header, Footer}
    },
    {
      path: '/checkout',
      name: 'Checkout',
      components: {default: Checkout, Header, Footer}
    },
    {
      path: '/cart',
      name: 'Cart',
      components: {default: Cart, Header, Footer}
    },
    {
      path: '/',
      name: 'Dashboard',
      components: {default: Dashboard, DashboardHeader, Footer, Slider, StartSmallBanner}
    },
    {
      path: '/product',
      name: 'Product',
      // component: Product
      component: ProductComponent
    },
    {
      path: '/vue',
      name: 'Home',
      component: Home
    },
    {
      path: '/about',
      name: 'About',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
    }
];


import VueRouter from 'vue-router'; 
const Home = ()=> import('./components/Home.vue');
const Contacto = ()=> import('./components/Contacto.vue');
const Login = ()=> import('./components/App.vue');


const Mostrar = ()=> import('./components/Mostrar.vue');
const Crear = ()=> import('./components/Crear.vue');
const Editar = ()=> import('./components/Editar.vue');

export const routes = [
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'home',
        path: '/home',
        component: Home
    },
    {
        name: 'contacto',
        path: '/contacto',
        component: Contacto
    },
    {
        name: 'mostrar',
        path: '/mostrar',
        component: Mostrar
    },
    {
        name: 'crear',
        path: '/crear',
        component: Crear
    },
    {
        name: 'editar',
        path: '/editar/:id',
        component: Editar
    }
];

const router = new VueRouter({
    mode :'history',
    routes: routes
});

export default router;
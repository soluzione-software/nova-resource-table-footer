import Router from 'vue-router';

import routes from "@nova-path/resources/js/router/routes";

import Index from "./views/Index";


const newRoutes = {
    index: {
        component: Index,
    },
};

let overrideRoutes = router => {
    const options = {
        routes: routes.map(route => {
            return {
                ...route,
                ...newRoutes[route.name] || {},
            };
        })
    };

    const r = new Router(options);
    router.matcher = r.matcher;
}

/**
 * @param {Vue} vue
 * @param {Router} router
 */
let callback = (vue, router) => {
    overrideRoutes(router);

    vue.component('resource-index', Index);
    vue.component('resource-table', require('./components/ResourceTable'));
    vue.component('resource-table-footer', require('./components/ResourceTableFooter'));
}

Nova.booting(callback)

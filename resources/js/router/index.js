import Router from "vue-router";

import routes from "@nova-path/resources/js/router/routes";


import newRoutes from "./routes";


export default router => {
    const options = {
        routes: routes.map(route => {
            return {
                ...route,
                ...newRoutes[route.name] || {},
            };
        }),
    };

    const r = new Router(options);
    router.matcher = r.matcher;
}

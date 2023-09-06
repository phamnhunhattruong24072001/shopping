import "./bootstrap";
import { createApp } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";

const app = createApp({});

const views = import.meta.glob("./views/**/*.vue");

Object.keys(views).forEach((path) => {
    const name = path.match(/\.\/views\/(.*).vue$/)[1];
    const component = views[path];
    app.component(name, component);
});

app.use(VueAxios, axios);

app.mount("#app");

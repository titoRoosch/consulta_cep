import "./bootstrap";
import router from "./router";
import { createApp } from "vue";

import App from "./components/App.vue";

createApp(App).use(router).mount("#app");
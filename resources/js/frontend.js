import Vue from "vue"
import App from "./views/App.vue"

new Vue({
  el: "#app",
  render: (renderComponent) => renderComponent(App)
})
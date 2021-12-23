import Alpine from "alpinejs";
window.Alpine = Alpine;

Alpine.data("adminAuth", () => ({
  onVal: JSON.parse(localStorage.getItem("adminAuthOpen")),
  init() {
    this.$watch("onVal", (val) => {
      localStorage.setItem("adminAuthOpen", val);
    });
  },
}));

Alpine.start();

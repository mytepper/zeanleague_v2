requirejs.config({
    "baseUrl": "js/lib",
    "paths": {
      "app": "../app"
    },
    "shim": {
        "bootstrap": ["jquery"],
    }
});
requirejs(["app/main"]);

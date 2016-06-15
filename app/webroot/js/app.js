requirejs.config({
    "baseUrl": "js/lib",
    "paths": {
      "app": "../app"
    },
    "shim": {
        "bootstrap_public": ["jquery"],
    }
});
requirejs(["app/main"]);

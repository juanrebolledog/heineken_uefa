define(['app/config', 'marionette', 'facebook', 'app/home_view', 'app/fb_connect'], function(config, Marionette, FB, HomeView, FBConnectView) {

    var App = new Marionette.Application();

    App.addRegions({
        content: '#content-region'
    });

    App.addInitializer(function(options) {
        FB.init({
            appId: config.fb_app_id
        });
        FB.getLoginStatus(function(response) {
            console.log(response);
            if (response.authResponse === undefined) {
                console.log('need to login');
            } else if (response.status === 'connected') {
                console.log('all good');
            }
        });
    });

    App.addInitializer(function(options) {
        var homeview = new HomeView();
        App.content.show(homeview);
    });

    App.moveTo = function() {
        var fb_connect = new FBConnectView();
        App.content.show(fb_connect);
    };

    return App;
});
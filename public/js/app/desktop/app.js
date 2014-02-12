define(['app/config', 'marionette', 'facebook', 'app/home_view', 'app/finals_view'], function(config, Marionette, FB, HomeView, FinalsView) {

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
        var finalsview = new FinalsView();
        App.content.show(finalsview);
    };

    return App;
});
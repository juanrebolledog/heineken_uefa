requirejs.config({
    baseUrl: '',
    paths: {
        app: 'js/app/mobile',
        jquery: 'js/lib/jquery',
        underscore: 'js/lib/underscore',
        backbone: 'js/lib/backbone',
        marionette: 'js/lib/marionette',
        hogan: 'js/lib/hogan',
        facebook: '//connect.facebook.net/es_CL/all',
        wreqr: 'js/lib/wreqr'
    },
    shim : {
        jquery : {
            exports : 'jquery'
        },
        underscore : {
            exports : '_'
        },
        backbone : {
            deps : ['jquery', 'underscore'],
            exports : 'Backbone'
        },
        marionette : {
            deps : ['jquery', 'underscore', 'backbone'],
            exports : 'Marionette'
        },
        hogan: {
            exports: 'Hogan'
        },
        facebook : {
            exports: 'FB'
        }
    }
});

require(['jquery', 'app/app', 'app/eventgg'], function($, App, EventGG) {

    var container = $('#app-container');

    App.start();

    EventGG.on('code:valid', function() {
        App.moveTo();
    });

    $(document).on('touchend', function(e) {
        App.moveTo();
    });

    $(document).on('click', function(e) {
        App.moveTo();
    });

});
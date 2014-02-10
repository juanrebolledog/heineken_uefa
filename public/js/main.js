requirejs.config({
    baseUrl: '',
    paths: {
        app: 'js/app',
        jquery: 'js/lib/jquery',
        underscore: 'js/lib/underscore',
        backbone: 'js/lib/backbone',
        marionette: 'js/lib/marionette',
        hogan: 'js/lib/hogan'
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
        }
    }
});

require(['jquery', 'hogan', 'js/templates'], function($, Hogan, templates) {
    var container = $('#app-container');
    container.append(templates.test({ name: 'Juan' }));
    container.append(templates.new({ name: 'José FAA' }));
});
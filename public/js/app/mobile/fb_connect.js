define(['marionette', 'backbone', 'js/templates_mobile', 'app/eventgg'], function(Marionette, Backbone, templates, EventGG) {
    var FinalsView = Backbone.View.extend({
        template: templates.fb_connect,
        className: 'finals hero',
        render: function() {
            return this.$el.html(this.template());
        }
    });
    return FinalsView;
});

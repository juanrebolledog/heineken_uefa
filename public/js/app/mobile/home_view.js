define(['marionette', 'backbone', 'js/templates_mobile'], function(Marionette, Backbone, templates) {
    var HomeView = Backbone.View.extend({
        template: templates.home,
        className: 'hero',
        render: function() {
            return this.$el.html(this.template());
        }
    });
    return HomeView;
});

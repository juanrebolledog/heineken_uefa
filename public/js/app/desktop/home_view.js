define(['marionette', 'backbone', 'js/templates_desktop', 'app/eventgg'], function(Marionette, Backbone, templates, EventGG) {
    var HomeView = Backbone.View.extend({
        template: templates.home,
        className: 'hero',
        events: {
            'submit form': 'triggerCode'
        },
        render: function() {
            return this.$el.html(this.template());
        },
        triggerCode: function(e) {
            e.preventDefault();
            EventGG.trigger('code:valid');
        }
    });
    return HomeView;
});

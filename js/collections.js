App.Collections.Reports = Backbone.Collection.extend({
    model: App.Models.Report,
    url: '/ajax/reports'
});
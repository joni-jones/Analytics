App.Models.Chart = Backbone.Model.extend({
    defaults: {
        data: [], type: 1
    }
});
App.Models.Report = Backbone.Model.extend({
    urlRoot: 'ajax/report'
});
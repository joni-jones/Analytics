App.Views.ReportsMenu = Backbone.View.extend({
    tagName: 'ul',
    template: '#reports-menu',
    className: 'nav nav-pills nav-stacked',
    defaults: {
        currentIndex: 0
    },
    initialize: function(){
        this.$el.empty();
        this.collection.on('reset', this.render, this);
    },
    render: function(){
        this.currentIndex = 0;
        this.collection.each(this.addOne, this);
        return this;
    },
    addOne: function(report){
        var menuItem = new App.Views.ReportItem({model: report});
        this.$el.append(menuItem.render().el);
        if(this.currentIndex == 0){
            menuItem.setActive();
        }
        this.currentIndex ++;
        return this;
    }
});
App.Views.ReportItem = Backbone.View.extend({
    tagName: 'li',
    template: '#reports-menu-item',
    events: {
        'click a': 'changeReport'
    },
    render: function(){
        var template = _.template($(this.template).html());
        this.$el.html(template(this.model.toJSON()));
        return this;
    },
    changeReport: function(){
        console.log('change report');
        this.clearActive();
    },
    clearActive: function(){
        $('.report-menu-item').parent().removeClass('active');
        this.setActive();
    },
    setActive: function(){
        var selector = $('.report-menu-item[data-id="' + this.model.get('id') + '"]');
        selector.parent().addClass('active');
        vent.trigger('render:' + App.Helpers.strReplace(' ', '', selector.text()));
    }
});
App.Views.ShopperRetentionReport = Backbone.View.extend({
    defaults:{
        data: '', rows: [], options: {}
    },
    id: 'shopper-retention-chart',
    initialize: function(){
        vent.on('render:ShopperRetention', this.render, this);
        this.data = new google.visualization.DataTable();
        this.data.addColumn({type: 'number', label: 'Period'});
        this.data.addColumn({type: 'number', label: 'Yesterday\'s outside traffic'});
        this.data.addColumn({type: 'number', label: 'Baseline\'s outside traffic'});
        this.data.addRows([
            [1, 10, 13],
            [2, 15, 18],
            [3, 20, 21],
            [4, 25, 30],
            [5, 27, 25],
            [6, 33, 35],
            [7, 24, 32],
            [8, 15, 20]
        ]);

        // Set chart options
        this.options = {
            title: 'Revenue and Revenue per Transaction',
            height: 400,
            isStacked: true,
            legend: {
                position: 'top',
                alignment: 'start'
            },
            vAxis:{
                gridlines: {
                    count: 0
                },
                minValue: 0,
                maxValue: 40
            },
            hAxis: {
                gridlines: {
                    count: 0
                }
            },
            titleTextStyle:{
                fontSize: 13
            },
            series: {
                0: {
                    type: 'bars',
                    color: '#9dc7e8',
                    enableInteractivity: false
                },
                1: {
                    type: 'line',
                    color: '#ff903b',
                    pointSize: 8,
                    enableInteractivity: false
                }
            }
        };
    },
    render: function(){
        var chart = new google.visualization.ComboChart(document.getElementById(this.id));
        chart.draw(this.data, this.options);
        return this;
    }
});
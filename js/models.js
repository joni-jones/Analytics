App.Models.Chart = Backbone.Model.extend({
    defaults: {
        data: [], type: 1
    }
});
App.Models.Report = Backbone.Model.extend({
    urlRoot: 'ajax/report'
});
App.Models.ShopperRetentionReport = Backbone.Model.extend({
    urlRoot: '',
    defaults: {
        options: {
            title: '',
            height: 400,
            isStacked: true,
            backgroundColor: '#F5F5F5',
            legend: {
                position: 'top',
                alignment: 'end'
            },
            chartArea: {
                left: 50,
                width: 600
            },
            vAxis:{
                gridlines: {
                    count: 10
                },
                minValue: 0,
                maxValue: 1,
                format: '#.##%'
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
                    enableInteractivity: false,
                    visibleInLegend: false
                },
                1: {
                    type: 'line',
                    color: '#ff903b',
                    pointSize: 8
                }
            }
        },
        timestamp: 0, period: '', type: '', store: ''
    },
    initialize: function(){},
    setTitle: function(period){
        this.get('options').title = 'Percent of All shoppers from ' + period + ' who have returned within 6 weeks';
    },
    dateRangeChange: function(timestamp, period){
        this.period = period;
        this.timestamp = timestamp;
        this.setTitle(period);
        console.log('date change: update shopper retention report');
    },
    customerTypeChange: function(type){
        this.type = type;
        console.log('customer type change: update shopper retention report');
    },
    storeChange: function(store){
        this.store = store;
        console.log('store change: update shopper retention report');
    }
});
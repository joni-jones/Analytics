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
        this.data.addColumn({type: 'string', label: 'Period'});
        this.data.addColumn({type: 'number', label: 'Shoppers'});
        this.data.addColumn({type: 'number', label: 'Comparison period'});
        this.data.addRows([
            ['1 week later', 0.14, 0.11],
            ['2 weeks later', 0.22, 0.18],
            ['3 weeks later', 0.28, 0.22],
            ['4 weeks later', 0.35, 0.28],
            ['5 weeks later', 0.40, 0.32],
            ['6 weeks later', 0.44, 0.36]
        ]);
    },
    render: function(){
        this.getReportContainer();
        return this;
    },
    dateRangeChange: function(timestamp, period){
        this.model.dateRangeChange(timestamp, period);
    },
    customerTypeChange: function(type){
        this.model.customerTypeChange(type);
    },
    storeChange: function(store){
        this.model.storeChange(store);
    },
    draw: function(){
        var chart = new google.visualization.ComboChart(document.getElementById(this.id));
        chart.draw(this.data, this.model.get('options'));
    },
    getReportContainer: function(){
        App.Helpers.Progress.show();
        var self = this;
        $.ajax({
            url: '/ajax/shopperretentionview',
            type: 'get',
            dataType: 'html',
            success: function(response){
                $('#report-container').html(response);
                self.model.set('store', $('select[name="store"]').val());
                var $dateRange = $('select[name="date_range"]');
                self.model.set('timestamp', $dateRange.val());
                self.model.setTitle($dateRange.children('option').filter(':selected').text());
                self.model.set('type', parseInt($('input[name="customer_type"]').val()));
                self.draw();
                App.Helpers.Progress.hide();
            }
        });
    }
});
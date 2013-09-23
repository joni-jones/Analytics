google.load('visualization', '1.0', {'packages': ['corechart']});
$(document).ready(function(){
    var reportsCollection = new App.Collections.Reports();
    reportsCollection.fetch({reset: true});
    var reportsMenu = new App.Views.ReportsMenu({collection: reportsCollection});
    $('#reports-menu-container').html(reportsMenu.render().el);
    var shopRetentionModel = new App.Models.ShopperRetentionReport();
    var shopperRetentionReport = new App.Views.ShopperRetentionReport({model: shopRetentionModel});

    var $reportContainer = $('#report-container');
    $reportContainer.on('change', 'select[name="store"]', function(){
        shopperRetentionReport.storeChange($(this).val());
    });
    $reportContainer.on('change', 'select[name="date_range"]', function(){
        shopperRetentionReport.dateRangeChange($(this).val(), $(this).children('option').filter(':selected').text());
    });

    $reportContainer.on('click', 'input[name="customer_type"]', function(){
        $(this).parent().children().removeClass('btn-primary');
        $(this).addClass('btn-primary');
        shopperRetentionReport.customerTypeChange($(this).attr('data-type'));
    });
});
google.load('visualization', '1.0', {'packages': ['corechart']});
$(document).ready(function(){
    var reportsCollection = new App.Collections.Reports();
    reportsCollection.fetch({reset: true});
    var reportsMenu = new App.Views.ReportsMenu({collection: reportsCollection});
    $('#reports-menu-container').html(reportsMenu.render().el);
    var shopperRetentionReport = new App.Views.ShopperRetentionReport();
});
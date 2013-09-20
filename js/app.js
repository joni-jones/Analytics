(function(){
    window.App = {
        Models: {},
        Collections: {},
        Views: {},
        Routers: {},
        Helpers: {}
    };
    window.vent = _.extend({}, Backbone.Events);
    window.App.successStatus = 200;
    App.Helpers.Message = {};
    App.Helpers.Message.info = function(message){
        var opts = {
            title: 'Information',
            text: message,
            type: 'info',
            sticker: false,
            styling: 'bootstrap'
        };
        $.pnotify(opts);
    };
    App.Helpers.Message.error = function(reason){
        var opts = {
            title: 'Error',
            text: reason,
            sticker: false,
            type: 'error',
            styling: 'bootstrap'
        };
        $.pnotify(opts);
    };
    App.Helpers.template = function(id){
        try{
            return _.template($('#' + id).html());
        }
        catch(e){
            alert(e.message);
        }
    };
    App.Helpers.getLocationPosition = function(callback){
        var options = {};
        options.maxWait = 10000;
        options.desiredAccuracy = 20;
        options.timeout = options.maxWait;
        options.maximumAge = 0;
        options.enableHighAccuracy = true;

        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position){
                if(typeof callback === 'function'){
                    callback(position);
                }
            }, App.Helpers.showGeoLocationError, options);
        }
        else{
            alert('Geolocation is not supported by this browser');
        }
    };
    App.Helpers.showGeoLocationError = function(error){
        var msg = '';
        switch(error.code){
            case error.PERMISSION_DENIED:
                msg = 'User denied the request for GeoLocation';
                break;
            case error.POSITION_UNAVAILABLE:
                msg = 'Location information is unavailable';
                break;
            case error.TIMEOUT:
                msg = 'The request to get user location timed out';
                break;
            case error.UNKNOWN_ERROR:
                msg = 'An unknown error occurred';
                break;
        }
        App.Helpers.Message.error(msg);
    };
    App.Helpers.convertToDateFormat = function(timestamp){
        var date = new Date(timestamp * 1000); // convert to milliseconds
        return date.toLocaleString();
    };
    App.Helpers.isEmail = function(email){
        var pattern = /^([a-zA-Z0-9\._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z]{2,4})$/;
        var res = email.search(pattern);
        return (res == -1) ? false : true;
    };
    App.Helpers.Progress = {};
    App.Helpers.Progress.show = function(){
        $('#progress-modal').modal('show');
    };
    App.Helpers.Progress.hide = function(){
        $('#progress-modal').modal('hide');
    };
    App.Helpers.dataTable = function(selector){
        $(selector).dataTable({
            sPaginationType: "full_numbers",
            iDisplayLength: 20,
            bFilter: false,
            bInfo: false,
            bLengthChange: false,
            bSort: false,
            oLanguage: {
                oPaginate: {
                    sFirst: "Первая",
                    sLast: "Последняя",
                    sNext: "Следующая",
                    sPrevious: "Предыдущая"
                },
                sInfo: "С _START_ по _END_ из _TOTAL_",
                sEmptyTable : "Нет данных для отображения",
                sInfoEmpty: "Нет данных для отображения"
            }
        });
    };
    App.Helpers.strReplace = function(search, replace, subject){
        //
        // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        // +   improved by: Gabriel Paderni
        if(!(replace instanceof Array)){
            replace=new Array(replace);
            if(search instanceof Array){//If search	is an array and replace	is a string, then this replacement string is used for every value of search
                while(search.length>replace.length){
                    replace[replace.length]=replace[0];
                }
            }
        }

        if(!(search instanceof Array))search=new Array(search);
        while(search.length>replace.length){//If replace	has fewer values than search , then an empty string is used for the rest of replacement values
            replace[replace.length]='';
        }

        if(subject instanceof Array){//If subject is an array, then the search and replace is performed with every entry of subject , and the return value is an array as well.
            for(k in subject){
                subject[k]=str_replace(search,replace,subject[k]);
            }
            return subject;
        }

        for(var k=0; k<search.length; k++){
            var i = subject.indexOf(search[k]);
            while(i>-1){
                subject = subject.replace(search[k], replace[k]);
                i = subject.indexOf(search[k],i);
            }
        }

        return subject;
    }
}());
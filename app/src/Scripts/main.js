(function() {
    'use strict';

    window.jQuery = window.$ = require('jquery');
    var moment = require('moment');
    require('jquery-ui/ui/widgets/datepicker');
    //datepickerは日本語かする場合にこれが必要
    require('jquery-ui/ui/i18n/datepicker-ja');
    require('select2');
    require('bootstrap');
    require('@fortawesome/fontawesome-free/js/fontawesome');
    require('@fortawesome/fontawesome-free/js/solid');
    require('@fortawesome/fontawesome-free/js/regular');

    var message = 'Hello App';
    console.log(message);

    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });

    $("#myModal").on('shown.bs.modal', function(e) {
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    })

    $("#myModal").on('hidden.bs.modal', function(e) {
        $(this).removeData();
    });

})();
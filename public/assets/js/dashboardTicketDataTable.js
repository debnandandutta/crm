(function($) {
    "use strict";

    $(document).ready(function() {

        let datatableSubmit = $('#data_table').DataTable({
            order: [ [0, 'asc'] ],
            "processing": true,
            "serverSide": true,
            "fixedHeader": {
                "headerOffset": $('.main-header').outerHeight()
            },
            "ajax": {
                url: window.appUrl+"/get-departments-data",

            },
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
                return nRow;
            },
            "columns":[
                { "data": "id" },
                { "data": "title" },
                { "data": "description" },
                { "data": "total_cases" },
                { "data": "total_tickets" },
                { "data": "total_kb" },

            ]
        });

    });

})(jQuery);
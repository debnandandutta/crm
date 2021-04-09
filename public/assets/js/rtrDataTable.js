(function($) {
    "use strict";

    $(document).ready(function() {

        $('#data_table').DataTable({
            order: [ [0, 'asc'] ],
            "processing": true,
            "serverSide": true,
            "fixedHeader": {
                "headerOffset": $('.main-header').outerHeight()
            },
            "ajax": {
                url: window.appUrl+"/getRtr",
            },
            "columns":[
                { "data": "rid" },
                { "data": "name" },
                { "data": "address" },
                { "data": "mobile" },
                { "data": "title" },
                { "data": "areaName" },
                { "data": "territoryName" },
                { "data": "townName" },
                { "data": "created_at" },
                {  data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });

})(jQuery);
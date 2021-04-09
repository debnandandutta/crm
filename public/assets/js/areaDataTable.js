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
                url: window.appUrl+"/getAreas",
            },
            "columns":[
                { "data": "aid" },
                { "data": "areaName" },
                { "data": "title" },
                { "data": "created_at" },
                {  data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });

})(jQuery);
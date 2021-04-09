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
                url: window.appUrl+"/getItemRootCause",
            },
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
                return nRow;
            },
            "columns":[
                { "data": "id" },
                { "data": "name" },
                { "data": "created_at" },
                {  data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });

})(jQuery);
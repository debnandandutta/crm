jQuery(document).ready(function ($) {

    $("#region").change(function(){
        $.ajax({
            url: window.appUrl+"/get_by_area_display?regionId=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $('#area').html(data.html);
            }
        });
    });
    $("#area").change(function(){
        $.ajax({
            url: window.appUrl+"/get_by_territory_display?areaId=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $('#territory').html(data.html);
            }
        });
    });
    $("#territory").change(function(){
        $.ajax({
            url: window.appUrl+"/get_by_town_display?territoryId=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $('#town').html(data.html);
            }
        });
    });
    $("#territory").change(function(){
        $.ajax({
            url: window.appUrl+"/getTmInfo?territoryId=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $('#tm1').html(data.html);
            }
        });
    });

});
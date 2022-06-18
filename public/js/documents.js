$(document).ready(function() {


    function autonum (){
        $("#ty").children('h3:visible').each(function(i){
        $(this).find("span.number").remove().end().prepend("<span class='number'>" + (i + 1) + ".</span>  ");
          if ($(this).nextAll(':not(.metka)')[0] != undefined) {
            if($(this).nextAll(':not(.metka)')[0].tagName == 'H4'){
                $(this).nextAll("h4:visible").each(function(h){
                    $(this).find("span.number").remove().end().prepend("<span class='number'>" +(i + 1)+"."+(h + 1) + ".</span>  ");
                    $(this).nextAll("p:visible").not(".notnum").each(function (k){
                        $(this).find("span.number").remove().end().prepend("<span class='number'>" +(i + 1)+"."+(h + 1) + "."+(k + 1)+".</span>  ");
                    });
                });
            } else if ($(this).nextAll(':not(.metka)')[0].tagName  == 'P' ) {
                $(this).nextAll("p:visible").not(".notnum").each(function(h){
                    $(this).find("span.number").remove().end().prepend("<span class='number'>" +(i + 1)+"."+(h + 1) + ".</span>  ");
                });
            }
          }

        
        });
    }

    function checked_inputs_id () {
        var checked_input_ids = [];
        $(".option").children('input:checked').each(
            function () {
                if ($(this).parent('.option').is(":visible")){
                    var id = $(this).attr('id');
                    checked_input_ids.push(id);
                }
            }

        );

        return checked_input_ids;
    }

    function hidden_input_show(){

        $('.podsvetka').removeClass('podsvetka');

        $(".option").children('input:checked').each(
            function (){
                var id = $(this).attr('id');
                $('.hide.'+id).removeClass('hide').addClass('podsvetka').each(
                    function (){
                        $(this).find('input:checked').each(
                            function (){
                                var id = $(this).attr('id');
                                
                                $('.hide.'+id).removeClass('hide').addClass('podsvetka').each(
                                    function (){
                                        $(this).find('input:checked').each(
                                            function (){
                                                var id = $(this).attr('id');
                                                
                                                $('.hide.'+id).removeClass('hide').addClass('podsvetka');
                                            }
                                        );
                                    }
                                );
                            }
                        );
                    }
                );
            }
        );

    }

    function visible_input_hide() {
        hidden_input_show();
        $(".option").children('input').not(':checked').each(
            function () {
                var id = $(this).attr('id');
                var checked_input_ids = checked_inputs_id ();
                var not_get_this_elements ='.'+checked_input_ids.join(',.');
                $('.'+id).not(not_get_this_elements).addClass('hide').each(
                    function (){
                        $(this).find('input').each(
                            function (i){
                                var id = $(this).attr('id');
                                var checked_input_ids = checked_inputs_id ();
                                var not_get_this_elements ='.'+checked_input_ids.join(',.');
                                $('.'+id).not(not_get_this_elements).addClass('hide').each(
                                    function (i){
                                        $(this).find('input').each(
                                            function (i){
                                                var id = $(this).attr('id');
                                                var checked_input_ids = checked_inputs_id ();
                                                var not_get_this_elements ='.'+checked_input_ids.join(',.');
                                                $('.'+id).not(not_get_this_elements).addClass('hide');
                                            }
                                        );
                                    }
                                );
                            }
                        );
                    }
                );
            }
        );
    }


    visible_input_hide();
    autonum();
    parent_number ();





    function parent_number () {
        $('span[data-parent-number]').each( function (){
           var parent_id = $(this).attr('data-parent-number');
           var text = $('#'+parent_id).find('span[class="number"]').text();
           $(this).text(text);
        });
    }
    

    //срабатывает hide or show and autonum
    $('body').on('change', 'input', function(){
        visible_input_hide();
        autonum();
        parent_number ();
    });




});


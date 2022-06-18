

$(document).ready(function() {
    
    $('#button-search-on-show').click(
        function (){
            var search_text = $('#input-search-on-show').val();

            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '/search-on-show',
                method: 'post',
                data: {text: search_text},
                success: function(data){
                    $('#search-on-show-result').html(data).show();
                }
            });
        }
    );

    $('#npa-izbrannoe').click(
        function (){
            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '/npa-izbrannoe',
                method: 'post',
                success: function(data){
                    $('#search-on-show-result').html(data).show();
                    var scrollTop = $('#search-on-show-result').offset().top;
                    $(document).scrollTop(scrollTop);
                }
            });
        }
    );
    
    $('body').on('click', '.href-on-show',function (){
            var npa_id = $(this).attr('data-id');
            $('#search-on-show-result').hide();
            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '/npa-show',
                method: 'post',
                data: {id: npa_id},
                success: function(data){
                    $('#myTabContentInShow').append('<div class="tab-pane fade"  id="npa-'+data['id']+'" role="tabpanel" aria-labelledby="npa-'+data['id']+'-tab">'+data['content']+'</div>');
                    $('#myTabInShow').append('<li class="nav-item"><a class="nav-link" data-npa-id="'+data['id']+'" id="npa-'+data['id']+'-tab" data-toggle="tab" href="#npa-'+data['id']+'" role="tab" aria-controls="npa-'+data['id']+'" aria-selected="true">'+data['id']+'</a></li>');
                    $('#npa-'+data['id']+'-tab').tab('show')
                }
            });
        }
    );

    $('body').on('click', '#npa-v-izbrannoe',function (){
        var npa_id = $('a[aria-selected="true"]').attr('data-npa-id');
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: '/npa-v-izbrannoe',
            method: 'post',
            data: {id: npa_id},
            success: function(data){
                alert(data);
            }
        });
    });

    $('body').on('click', '#npa-iz-izbrannogo',function (){
        var npa_id = $('a[aria-selected="true"]').attr('data-npa-id');
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: '/npa-iz-izbrannogo',
            method: 'post',
            data: {id: npa_id},
            success: function(data){
                alert(data);
            }
        });
    });

    $('body').on('click', '#document-v-izbrannoe',function (){
        var document_id = $('#ty').attr('data-document-id');
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: '/document-v-izbrannoe',
            method: 'post',
            data: {id: document_id},
            success: function(data){
                alert(data);
            }
        });
    });

    $('body').on('click', '#document-save',function (){
        var document_name = $('#document-name').text();
        var document_content = $('#ty').html();
        var document_radioblock = $('#radioblock').html();

        if (document_name === '') {
            alert('Имя документа не может быть пустым!');
        } else if (document_content === '') {
            alert('Контент документа не может быть пустым!');
        } else if (document_radioblock === '') {
            alert('Опросник документа не может быть пустым!');
        } else  {
            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '/document-save',
                method: 'post',
                data: {name: document_name, content: document_content, radioblock: document_radioblock},
                success: function(data){
                    alert(data);
                }
            });
        }

    });

    $('body').on('click', '#document-resave',function (){
        var document_id = $('#ty').attr('data-document-id');
        var document_name = $('#document-name').text();
        var document_content = $('#ty').html();
        var document_radioblock = $('#radioblock').html();

        if (document_name === '') {
            alert('Имя документа не может быть пустым!');
        } else if (document_content === '') {
            alert('Контент документа не может быть пустым!');
        } else if (document_radioblock === '') {
            alert('Опросник документа не может быть пустым!');
        } else  {
            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '/document-resave',
                method: 'post',
                data: {id: document_id, name: document_name, content: document_content, radioblock: document_radioblock},
                success: function(data){
                    alert(data);
                }
            });
        }

    });

$('body').on('click', '#download-document',function (){
    var original = $('#ty').html();
    $("span[placeholder]").each(function(){
        var placeholder =$(this).attr('placeholder');
        if($(this).html() === ''){
           $(this).prepend(placeholder);
        }
    });
    $('.hide').remove();
    var contentDocument = $('#ty').html();
    var name = $('#document-name').text()
    $('#ty').html(original);
    var styles = 'h3{text-align:center;} p{text-align:justify;} h4{font-weight:normal;} .number{font-weight:bold;}';
    var content = '<!DOCTYPE html><html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style>'+ styles +'</style></head><body>' + contentDocument + '</body></html>';
    var orientation = 'portrait';
    var converted = htmlDocx.asBlob(content, {orientation: orientation, margins: {top: 1000, left:1440, right:700}});

    saveAs(converted, name+'.docx');

}); 



//редактор вкл\выкл
        function redactor () {
            tinymce.init({
                selector: 'div[id="ty"]',
                inline: true,
                verify_html : false,
                plugins: "table",
                menubar: false,
                toolbar:'undo redo | styleselect | bold italic underline | fontsizeselect | superscript | subscript | table | alignleft aligncenter alignright alignjustify',
                fontsize_formats: "8pt 12pt 13.5pt 18pt ",
                style_formats:[
         {
           title: "Заголовки",
           items: [
             {title: "Абзац",format: "p"},
             {title: "Глава",format: "h3"},
             {title: "Подглава",format: "h4"},

           ]
          
        },

             
],

               
                fixed_toolbar_container: '#toolbar'

              });
    
            if ($('#change_id').is(':checked')) {
                tinymce.EditorManager.execCommand('mceAddEditor',true, 'ty');
            } else {
                tinymce.EditorManager.execCommand('mceRemoveEditor',false, 'ty');
    
            }
        }
    
        $('body').on('change', '#change_id', function(){
            redactor ();    
        });

//Админ панель внизу
  $("#open").click(function(){ 
    $("#hidden").toggleClass('hidden');
});
  //конец
//мобильная версия радиоблока
$('.zagolovoc').not('.hide').filter(':first').addClass('block');
$('#toggle').click(function (){
    $('.zagolovoc.block').toggle();
});

$('#next-zagolovoc').click(function (){
    if ($('.block').nextAll('.zagolovoc:not(.hide):first').length) {
        $('.block').nextAll('.zagolovoc:not(.hide):first').addClass('block');
        $('.block:first').removeClass('block');
    }

});

$('#prev-zagolovoc').click(function (){
    if ($('.block').prevAll('.zagolovoc:not(.hide):first').length) {
        $('.block').prevAll('.zagolovoc:not(.hide):first').addClass('block');
        $('.block:last').removeClass('block');
    }
});
 


$('body').on('focus', '[contenteditable]', function() {
    const $this = $(this);
    $this.data('before', $this.html());
}).on('blur keyup paste input', '[contenteditable]', function() {
    const $this = $(this);
    if ($this.data('before') !== $this.html()) {
        $this.data('before', $this.html());
        $this.trigger('change');
    }
});

//уравнивание значение некоторых span
$('span[placeholder]').on('change', function() {
    var data_raven = $(this).attr('data-raven');
    var text = $(this).text();
    $('span[data-raven="'+data_raven+'"]').not(this).text(text);

});

$('div[data-class="v-razrabotke"]').click(function(){
    alert('Данная функция на стадии разработки. Поддержите проект, чтобы было больше удобных инструментов.');
})

$('i[user-delete]').click(function(){
    var type = $(this).attr('data-type');
    var id = $(this).attr('data-id');
    $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        url: '/user-delete',
        method: 'post',
        data: {id: id, type: type},
        success: function(data){
            alert(data);
        }
    });
    $(this).parent().remove();
    
});




//ширина для select
$('option').each(function() {
  var optionText = this.text;
  var newOption = optionText.substring(0, 70);
  $(this).text(newOption + '...');
});
//end

tinymce.init({
    selector: '*[id="editor"]'
});

$('button#create-question').on('click',function () {
    text = tinymce.get("editor").getContent();
    question_id = $('input[name="question_id"]').attr('value');
    $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        url: '/answer',
        method: 'post',
        data: {text: text, question_id: question_id},
        success: function(answer){
            $('h2').after('<div class="card questions mb-3 border-0">'
            +'<div class="card-header border-0 bg-white pl-0" style="text-align: justify;">'
                +'<a href="/user/'+answer['answer']['user_id']+'><h5 class="card-title">'+answer['username']+'</h5></a><span'
                    +' style="font-size: 12px; color:#8C8C8C;">'+answer['answer']['created_at']+'</span></div>'
            +'<div class="card-body pl-0" style="text-align: justify;">'
               +' <p class="card-text">'+answer['answer']['text']+'</p></div></div><hr>');
        }
    });

});
 
});


$(document).ready(function() {


    // Добавляет кликабельные кнопки
    function metka (){

        $('.metka').remove();
        $('i[data-check]').remove();
        $('i[data-delete]').remove();
        $('.button-privyazka').remove();
        var metka = "<div class='metka'></div>";
        var functional_buttons = "<i class='fas fa-check-circle float-right' data-check></i><i class='fas fa-times-circle float-right' data-delete></i>";
        var button_privyazka = '<button class="button-privyazka"><i class="far fa-link"></i></button>'
        $('#radioblock').find('.option:visible,.zagolovoc:visible').prepend(functional_buttons).after(metka);
        $('.span').prepend(functional_buttons);
        $('#ty').find('p:visible,h4:visible,h3:visible,h2:visible,div').not('.metka').prepend(functional_buttons).after(metka);
        $('.option').append(button_privyazka);
        var proverka_metki_radioblock = $('#radioblock').find('*').is('div.metka');
        var proverka_metki_textblock = $('#ty').find('*').is('div.metka');

        if (!proverka_metki_radioblock){
            $('#radioblock').append(metka);
        }
        if (!proverka_metki_textblock){
            $('#ty').append(metka);
        }

        $('#ty > div').not('.metka').append(metka);

        $('#radioblock').find('.zagolovoc').each(function (){
            var proverka_metki_zagolovoc = $(this).find('*').is('div.metka');
            if (!proverka_metki_zagolovoc){
                $(this).append(metka);
            }
        });

    }

    metka();


    // Отмечает метку для дальнейших манипуляций
    $('body').on('click', '.metka', function(){
        $('.otmechen').removeClass('otmechen').addClass('metka');
        $(this).addClass('otmechen').removeClass('metka');
    });


    // Добавляет блок кнопок
    $('body').on('click', '#dobavit-block-v-radioblock', function(){
        var blok_knopok_dlya_dobavleniya = "<div class='zagolovoc'>";
        var radio_name = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 12);
        var inputs='';

        $('.test1').each(function(){
            var data_teg = $(this).attr('data-teg');
            var input_text = $(this).val();
            var input_id = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 12);

            if (data_teg == 'h3'){
                if ($(this).val()!=''){
                    blok_knopok_dlya_dobavleniya += '<h3 class="vopros">'+input_text+'</h3><br>';
                }
            } else if (data_teg == 'radio'){
                if ($(this).val()!=''){
                inputs += '<div class="option"><input type="radio" name="'+radio_name+'" id="'+input_id+'"><label  for="'+input_id+'" ><span></span>'+input_text+'</label><button id="button-privyazka" ><i class="far fa-link"></i></button></div>';
                }
            } else if (data_teg == 'checkbox'){
                if ($(this).val()!=''){
                inputs += '<div class="option"><input type="checkbox" id="'+input_id+'"><label  for="'+input_id+'" ><span></span>'+input_text+'</label><button id="button-privyazka" ><i class="far fa-link"></i></button></div>';
                }
            }

        });
        blok_knopok_dlya_dobavleniya += '<div class="form-item radio-btn nth-2">'+inputs+'</div><br></div>';
        $('.otmechen').replaceWith(blok_knopok_dlya_dobavleniya);
        metka();
    });





    // Добавляет другие теги кроме блоков
    $('body').on('click', '#dobavit-element', function(){
        var elements = '';

        $('.test1').each(function(){
            var data_teg = $(this).attr('data-teg');
            var input_text = $(this).val();

            if (data_teg == 'radio'){
                if ($(this).val()!=''){
                    var input_id = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 12);
                    var radio_name = $('.otmechen').prevAll('.option:first').find('input').attr('name');
                    elements += '<div class="option"><input type="radio" name="'+radio_name+'" id="'+input_id+'"><label  for="'+input_id+'" ><span></span>'+input_text+'</label><button id="button-privyazka" ><i class="far fa-link"></i></button></div>';
                }
            } else if (data_teg == 'checkbox'){
                if ($(this).val()!=''){
                    var input_id = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 12);
                    elements += '<div class="option"><input type="checkbox" id="'+input_id+'"><label  for="'+input_id+'" ><span></span>'+input_text+'</label><button id="button-privyazka" ><i class="far fa-link"></i></button></div>';
                }
            } else if (data_teg == 'h2'){
                    elements += '<'+data_teg+' id="document-name">'+input_text+'<span id="document-number" contenteditable="true" placeholder="№"></span></'+data_teg+'>';
            } else if (data_teg == 'nn'){
                var input_id = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 12);
                elements += '<p class="notnum" id="'+input_id+'">'+input_text+'</p>';
            }else if (data_teg == 'raven'){
                var id = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 12);
                $('span[contenteditable="true"]:exact('+input_text+')').attr('data-raven', id);
            }  else {
                var input_id = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 12);
                elements += '<'+data_teg+' id="'+input_id+'">'+input_text+'</'+data_teg+'>';
            }

        });

        $('.otmechen').replaceWith(elements);
        metka();
    });


 // Добавляет поля ввода для дальнешего заполнения кроме радио и чекбокс
    $('body').on('click', '.bloki-teksta', function(){
        var data_teg = $(this).attr('id');
        var radio_inputs_blok = "<input class='form-control test1' type='text' placeholder='"+data_teg+"' data-teg='"+data_teg+"'><input type='button' class='btn btn-success btn-sm col-6' value='Добавить ещё' id='dobavit-eshe'></input><input type='button' class='btn btn-success btn-sm col-6' value='ОК' id='dobavit-element'></input>";
        $('#forma-zapolneniya').html(radio_inputs_blok);
    });

    // Добавляет поля ввода для дальнешего заполнения чекбокс
    $('body').on('click', '#checkbox', function(){
        var radio_inputs_blok = "<input class='form-control test1' type='text' placeholder='Кнопка чекбокс' data-teg='checkbox'><input type='button' class='btn btn-success btn-sm col-6' value='Добавить ещё' id='dobavit-eshe'></input><input type='button' class='btn btn-success btn-sm col-6' value='ОК' id='dobavit-element'></input>";
        $('#forma-zapolneniya').html(radio_inputs_blok);
    });

    // Добавляет поля ввода для дальнешего заполнения радио
    $('body').on('click', '#radio', function(){
        var radio_inputs_blok = "<input class='form-control test1' type='text' placeholder='Кнопка радио' data-teg='radio'><input type='button' class='btn btn-success btn-sm col-6' value='Добавить ещё' id='dobavit-eshe'></input><input type='button' class='btn btn-success btn-sm col-6' value='ОК' id='dobavit-element'></input>";
        $('#forma-zapolneniya').html(radio_inputs_blok);
    });

    // Добавляет поля ввода для дальнешего заполнения радио
    $('body').on('click', '#radio', function(){
        var radio_inputs_blok = "<input class='form-control test1' type='text' placeholder='Кнопка радио' data-teg='radio'><input type='button' class='btn btn-success col-6 btn-sm' value='Добавить ещё' id='dobavit-eshe'></input><input type='button' class='btn btn-success btn-sm col-6' value='ОК' id='dobavit-element'></input>";
        $('#forma-zapolneniya').html(radio_inputs_blok);
    });
  
      $('body').on('click', '#blok-radio', function(){
        var radio_inputs_blok = "<input class='form-control test1' type='text' placeholder='Заголовок' data-teg='h3'><input class='form-control test1' type='text' placeholder='Кнопка радио' data-teg='radio'><input type='button' class='btn btn-success btn-sm col-6' value='Добавить ещё' id='dobavit-eshe'></input><input type='button' value='ОК' class='btn btn-success btn-sm col-6' id='dobavit-block-v-radioblock'></input>";
        $('#forma-zapolneniya').html(radio_inputs_blok);
    });

    $('body').on('click', '#blok-checkbox', function(){
        var radio_inputs_blok = "<input class='form-control test1' type='text' placeholder='Заголовок' data-teg='h3'><input class='form-control test1' type='text' placeholder='Кнопка чекбокс' data-teg='checkbox'><input type='button' class='btn btn-success btn-sm col-6' value='Добавить ещё' id='dobavit-eshe'></input><input type='button' value='ОК' class='btn btn-success btn-sm col-6' id='dobavit-block-v-radioblock'></input>";
        $('#forma-zapolneniya').html(radio_inputs_blok);
    });

    //span placeholder
    $('body').on('click', '#span-placeholder', function(){
        if (window.getSelection() == '') {
            return false;
          }
          var range = window.getSelection().getRangeAt(0);
          var string = range.toString();
          range.extractContents();
          var span = document.createElement("span");
          span.setAttribute("contenteditable", true);
          span.setAttribute("placeholder", string);
          range.insertNode(span);

    });

    //span 
    $('body').on('click', '#span', function(){
        if (window.getSelection() == '') {
            return false;
          }
          var range = window.getSelection().getRangeAt(0);
          var string = range.toString();
          range.extractContents();
          var span = document.createElement("span");
          span.setAttribute("class", 'span');
          span.innerHTML = string;
          range.insertNode(span);

    });

    //span chudo
    $('body').on('click', '#span-chudo', function(){
        var radio = '<div class="zagolovoc block"><i class="fas fa-check-circle float-right" data-check=""></i><i class="fas fa-times-circle float-right" data-delete=""></i> <h3 class="vopros"> Правообладатель: </h3> <br> <div class="form-item radio-btn nth-2"> <div class="option"><i class="fas fa-check-circle float-right" data-check=""></i><i class="fas fa-times-circle float-right" data-delete=""></i> <input id="PiHlkcOdgoor" name="GDulRFRBEmfS" type="radio"> <label for="PiHlkcOdgoor"> Юридическое лицо <span> </span> </label> <button class="button-privyazka"><i class="far fa-link"></i></button></div><div class="metka"></div> <div class="PiHlkcOdgoor hide"> <div class="form-item radio-btn nth-2"> </div> </div> <div class="option"><i class="fas fa-check-circle float-right" data-check=""></i><i class="fas fa-times-circle float-right" data-delete=""></i> <input id="wAckpoCQHOLw" name="GDulRFRBEmfS" type="radio" checked="checked"> <label for="wAckpoCQHOLw"> Индивидуальный предприниматель <span> </span> </label> <button class="button-privyazka"><i class="far fa-link"></i></button></div><div class="metka"></div> <div class="wAckpoCQHOLw"> <div class="form-item radio-btn nth-2"> </div> </div> <div class="option"><i class="fas fa-check-circle float-right" data-check=""></i><i class="fas fa-times-circle float-right" data-delete=""></i> <input id="oBPCMexStSyi" name="GDulRFRBEmfS" type="radio"> <label for="oBPCMexStSyi"> Физическое лицо <span> </span> </label> <button class="button-privyazka"><i class="far fa-link"></i></button></div><div class="metka"></div> <div class="oBPCMexStSyi hide"> <div class="form-item radio-btn nth-2"> </div> </div> </div> </div><div class="zagolovoc"><i class="fas fa-check-circle float-right" data-check=""></i><i class="fas fa-times-circle float-right" data-delete=""></i> <h3 class="vopros"> Пользователь: </h3> <br> <div class="form-item radio-btn nth-2"> <div class="option"><i class="fas fa-check-circle float-right" data-check=""></i><i class="fas fa-times-circle float-right" data-delete=""></i> <input id="BbMXSGsPxuDR" name="AvYsgQaUbfRd" type="radio"> <label for="BbMXSGsPxuDR"> Юридическое лицо <span> </span> </label> <button class="button-privyazka"><i class="far fa-link"></i></button></div><div class="metka"></div> <div class="BbMXSGsPxuDR hide"> <div class="form-item radio-btn nth-2"> </div> </div> <div class="option"><i class="fas fa-check-circle float-right" data-check=""></i><i class="fas fa-times-circle float-right" data-delete=""></i> <input id="pHwUejzHYaJN" name="AvYsgQaUbfRd" type="radio" checked="checked"> <label for="pHwUejzHYaJN"> Индивидуальный предприниматель <span> </span> </label> <button class="button-privyazka"><i class="far fa-link"></i></button></div><div class="metka"></div> <div class="pHwUejzHYaJN"> <div class="form-item radio-btn nth-2"> </div> </div> <div class="option"><i class="fas fa-check-circle float-right" data-check=""></i><i class="fas fa-times-circle float-right" data-delete=""></i> <input id="aUxlIydsrQQK" name="AvYsgQaUbfRd" type="radio"> <label for="aUxlIydsrQQK"> Физическое лицо <span> </span> </label> <button class="button-privyazka"><i class="far fa-link"></i></button></div><div class="metka"></div> <div class="aUxlIydsrQQK hide"> <div class="form-item radio-btn nth-2"> </div> </div> </div> </div>';
        var table = '<table style="width: 100%"> <tbody><tr style="text-align: left"><td><h3>Одаряемый:</h3></td><td><h3>Даритель:</h3></td></tr> <tr style="text-align: left"> <td style="width: 50%"><span contenteditable="true" placeholder="Наименование юридического лица" class="PiHlkcOdgoor"></span> <span contenteditable="true" placeholder="Наименование ИП" class="wAckpoCQHOLw"></span> <span contenteditable="true" placeholder="ФИО" class="oBPCMexStSyi"></span></td> <td style="width: 50%"><span contenteditable="true" placeholder="Наименование юридического лица" class="BbMXSGsPxuDR"></span> <span contenteditable="true" placeholder="Наименование ИП" class="pHwUejzHYaJN"></span> <span contenteditable="true" placeholder="ФИО" class="aUxlIydsrQQK"></span></td> </tr> <tr style="text-align: left"> <td>адрес: <span contenteditable="true" placeholder="Адрес"></span></td> <td>адрес: <span contenteditable="true" placeholder="Адрес"></span></td> </tr> <tr style="text-align: left"> <td>тел: <span contenteditable="true" placeholder="Телефон"></span></td> <td>тел: <span contenteditable="true" placeholder="Телефон"></span></td> </tr> <tr style="text-align: left"> <td>ИНН <span contenteditable="true" placeholder="ИНН"></span></td> <td>ИНН <span contenteditable="true" placeholder="ИНН"></span></td> </tr> <tr style="text-align: left"> <td> <span class="PiHlkcOdgoor"> ОКПО <span contenteditable="true" placeholder="ОКПО"></span></span> <span class="wAckpoCQHOLw"> ОКПО <span contenteditable="true" placeholder="ОКПО"></span></span> <span class="oBPCMexStSyi"> паспорт: <span contenteditable="true" placeholder="паспортные данные"></span></span></td> <td> <span class="BbMXSGsPxuDR"> ОКПО <span contenteditable="true" placeholder="ОКПО"></span></span> <span class="pHwUejzHYaJN"> ОКПО <span contenteditable="true" placeholder="ОКПО"></span></span> <span class="aUxlIydsrQQK"> паспорт: <span contenteditable="true" placeholder="паспортные данные"></span></span></td> </tr> <tr style="text-align: left"> <td>в <span contenteditable="true" placeholder="Наименование банка"></span></td> <td>в <span contenteditable="true" placeholder="Наименование банка"></span></td> </tr> <tr style="text-align: left"> <td>БИК <span contenteditable="true" placeholder="БИК"></span></td> <td>БИК <span contenteditable="true" placeholder="БИК"></span></td> </tr> <tr style="text-align: left"> <td><span class="PiHlkcOdgoor" contenteditable="true" placeholder="Должность"></span> <span class="wAckpoCQHOLw" contenteditable="true" placeholder="Должность"></span> <span class="oBPCMexStSyi"></span></td> <td><span class="BbMXSGsPxuDR" contenteditable="true" placeholder="Должность"></span> <span class="pHwUejzHYaJN" contenteditable="true" placeholder="Должность"></span> <span class="aUxlIydsrQQK"></span></td> </tr> <tr style="text-align: left"> <td><span contenteditable="true" placeholder="ФИО"></span></td> <td><span contenteditable="true" placeholder="ФИО"></span></td> </tr> <tr style="text-align: left"> <td>____________________________</td> <td>____________________________</td> </tr> <tr style="text-align: left"> <td>(подпись)</td> <td>(подпись)</td> </tr> <tr style="text-align: left"> <td>М.П.</td> <td>М.П.</td> </tr> </tbody></table>';
        var text = '<p class="notnum PiHlkcOdgoor"><span contenteditable="true" placeholder="[Наименование юридического лица]"></span>, в лице <span contenteditable="true" placeholder="[Должность]"></span> <span contenteditable="true" placeholder="[ФИО]"></span>, действующего на основании <span contenteditable="true" placeholder="[Уполномочивающий документ]"></span>, именуемое в дальнейшем «Правообладатель» с одной стороны,</p> <p class="notnum wAckpoCQHOLw">Индивидуальный предприниматель <span contenteditable="true" placeholder="[Наименование ИП]"></span>, в лице <span contenteditable="true" placeholder="[ФИО]"></span>, ИНН <span contenteditable="true" placeholder="[ИНН]"></span>, именуемый в дальнейшем «Правообладатель» с одной стороны,</p><div class="metka"></div> <p class="notnum oBPCMexStSyi"><span contenteditable="true" placeholder="[ФИО]"></span>, ИИН <span contenteditable="true" placeholder="[ИИН]"></span>, именуемый(-ая) в дальнейшем «Правообладатель» с одной стороны,</p> <p class="notnum BbMXSGsPxuDR">и <span contenteditable="true" placeholder="[Наименование юридического лица]"></span>, в лице <span contenteditable="true" placeholder="[Должность]"></span> <span contenteditable="true" placeholder="[ФИО]"></span>, действующего на основании <span contenteditable="true" placeholder="[Уполномочивающий документ]"></span>, именуемое в дальнейшем «Пользователь» с другой стороны, далее совместно именуемые «Стороны», заключили настоящий договор (далее - «Договор») о нижеследующем:</p> <p class="notnum pHwUejzHYaJN">и Индивидуальный предприниматель <span contenteditable="true" placeholder="[Наименование ИП]"></span>, в лице <span contenteditable="true" placeholder="[ФИО]"></span>,&nbsp;<span style="font-size: 1rem;">ИНН <span contenteditable="true" placeholder="[ИНН]"></span>, </span><span style="font-size: 1rem;">именуемый в дальнейшем «Пользователь» с другой стороны, далее совместно именуемые «Стороны», заключили настоящий договор (далее - «Договор») о нижеследующем:</span></p><div class="metka"></div> <p class="notnum aUxlIydsrQQK" >и <span contenteditable="true" placeholder="[ФИО]"></span>, ИИН <span contenteditable="true" placeholder="[ИИН]"></span>, именуемый(-ая) в дальнейшем «Пользователь» с другой стороны, далее совместно именуемые «Стороны», заключили настоящий договор (далее - «Договор») о нижеследующем:</p>';
        $('#radioblock').prepend(radio);
        $('#ty > table').filter(':first').after(text);
        $('#ty').append(table);
    });
    
    //span уравнять значение спан
	$.expr[":"].exact = $.expr.createPseudo(function(arg) {
		return function(element) {
			return $(element).text() === arg.trim();
		};
	});
    $('body').on('click', '#span-number', function(){
        if (window.getSelection() == '') {
            return false;
          }
          var range = window.getSelection().getRangeAt(0);
          var string = range.toString();
          var id = $('span[class="number"]:exact('+string+')').parent().attr('id');
          if (!$('span[class="number"]:exact('+string+')').length) {
            return alert('Расплатись за ошибку, гад!');
          }
          if (id === undefined) {
            var id = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 12);
            $('span[class="number"]:exact('+string+')').parent().attr('id', id);
          }
          var selectionContents = range.extractContents();
          var span = document.createElement("span");
          span.appendChild(selectionContents);
          span.setAttribute("data-parent-number", id);
          range.insertNode(span);

    });

    //span auto placeholder
    $('#auto-ph').click(function (){
        $('#ty').children('h3:first').nextAll('p').not('.metka').each(function(){
            if ($(this).html() != undefined) {
                let html = $(this).html();
          
                html = html.replace(/(\[.*?\])/g, (full, a1) => {
                  return `<span contenteditable='true' placeholder='${a1}'></span>`
                });
              
                $(this).html(html);
            }

          });
        
       
    });

    // Добавляет блок ввода для дальнешего заполнения
    $('body').on('click', '#dobavit-eshe', function(){
        $('.test1:last').clone().insertBefore('#dobavit-eshe');
    });

    // Выбрать инпут для привязки
    $('body').on('click', '.button-privyazka', function () {
        if (!$(this).parent('.option').hasClass('priyazka-input-with-block')) {
            $('.priyazka-input-with-block').removeClass('priyazka-input-with-block').removeAttr("data-input-dlya-privyazki"); //Чистим атрибуты ранее выбранных элементов
            var input_id = $(this).parent('.option').children('input').attr('id'); //Получаем id инпута
            $(this).parent('.option').addClass('priyazka-input-with-block').attr('data-input-dlya-privyazki',input_id); //Отмечаем инпута
            $('.'+input_id).addClass('priyazka-input-with-block'); //Отмечаем связанные элементы
        } else {
            $('.priyazka-input-with-block').removeClass('priyazka-input-with-block').removeAttr("data-input-dlya-privyazki"); //Чистим атрибуты ранее выбранных элементов
        }

    });

    // привязка элемента
    $('body').on('click', 'i[data-check]', function(){
        if ($('.option').is('*[data-input-dlya-privyazki]')) {
            var input_id = $('*[data-input-dlya-privyazki]').attr('data-input-dlya-privyazki');
            if (!$(this).parent('.option').find('#'+input_id).length) {
                if (!$(this).parent().hasClass(input_id)) {
                    $(this).parent().addClass('priyazka-input-with-block').addClass(input_id);
                    }  else {
                        $(this).parent().removeClass('priyazka-input-with-block').removeClass(input_id);
                    }
            }
        }
    });

    // удаление элемента
    $('body').on('click', 'i[data-delete]', function(){
        $(this).parent().remove();
        metka();
    });

    //добавление атрибута чекед к инпут
        function set_atribute_checked_to_inputs() {
            $('input:checked').each(
                function (i){
                    if ($(this).attr('type') === 'radio'){
                        var name = $(this).attr('name');
                        $('input[name='+name+']').removeAttr('checked');
                        $(this).attr('checked','checked');
                    } else {
                        $(this).attr('checked','checked');
                    }
                }
            );
        }

    //сохранение документа в админ панели
    $('body').on('click', '#admin-document-save',function (){

        $('.metka').remove();
        $('i[data-check]').remove();
        $('i[data-delete]').remove();
        $('.button-privyazka').remove();
        set_atribute_checked_to_inputs();
        var document_id = $('#ty').attr('data-document-id');
        var document_content = $('#ty').html();
        var document_radioblock = $('#radioblock').html();
        metka ();
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: '/admin/save-document',
            method: 'post',
            data: {id: document_id, content: document_content, radioblock:document_radioblock },
            success: function(data){
                alert(data['success']);
            }
        });
    }
    );

    //
    $('body').on('change', 'input', function(){
        metka();
    });

    $('#save-npa').click(function(){
        var npa_id = $('a[aria-selected="true"]').attr('data-npa-id');
        var content = $('#npa-'+npa_id).html();
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: '/admin/save-npa',
            method: 'post',
            data: {id: npa_id, content: content},
            success: function(data){
                alert(data['success']);
            }
        });
    })





    























});

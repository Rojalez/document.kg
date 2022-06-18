@extends('forum.forum')
@section('header')
<title>Правила форума</title>
@endsection
@section('content')
<div class="container mx-auto sm:px-4">
    <nav aria-label="breadcrumb">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-200 rounded">
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/forum">Форум</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 active" aria-current="page">Правила форума</li>
        </ol>
    </nav>
</div> 
<div class="container mx-auto sm:px-4">
<div class="mt-3 border rounded p-6" style="text-align: justify;">
	

	<h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Правила форума</font></font></h2>


	<div class="panel bg1" id="faqlinks">
		<div class="inner"><span class="corners-top"><span></span></span>
			<div class="column1">


				<dl class="faq">
					<dt><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Раздел 1. Форум</font></font></strong></dt>

					<dd><a href="#f0r0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1.1. </font><font style="vertical-align: inherit;">Общие предметы</font></font></a></dd>

					<dd><a href="#f0r1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1.2. </font><font style="vertical-align: inherit;">Основные правила</font></font></a></dd>

				</dl>


				<dl class="faq">
					<dt><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Раздел 2. Регистрация и настройка профиля пользователя</font></font></strong></dt>

					<dd><a href="#f1r0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2.1. </font><font style="vertical-align: inherit;">Регистрация</font></font></a></dd>

					<dd><a href="#f1r1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2.2. </font><font style="vertical-align: inherit;">Имя пользователя</font></font></a></dd>

					<dd><a href="#f1r2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2.3. </font><font style="vertical-align: inherit;">Аватар</font></font></a></dd>

				</dl>


				<dl class="faq">
					<dt><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Раздел 3. Темы и сообщения</font></font></strong></dt>

					<dd><a href="#f2r0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3.1. </font><font style="vertical-align: inherit;">Тема</font></font></a></dd>

					<dd><a href="#f2r1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3.2. </font><font style="vertical-align: inherit;">Содержание темы</font></font></a></dd>

					<dd><a href="#f2r2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3.3. </font><font style="vertical-align: inherit;">Сообщения</font></font></a></dd>

					<dd><a href="#f2r3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3.4. </font><font style="vertical-align: inherit;">Обсуждения</font></font></a></dd>

				</dl>

			</div>
			<span class="corners-bottom"><span></span></span></div>
		</div>



		<div class="clear"></div>


		<div class="panel bg2">
			<div class="inner"><span class="corners-top"><span></span></span>

				<div class="content">
					<h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Раздел 1. Форум</font></font></h2>

					<dl class="faq">
						<dt id="f0r0"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1.1. </font><font style="vertical-align: inherit;">Общие предметы</font></font></strong></dt>
						<dd><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Эти правила действуют для всего форума, если другие пункты не оговорены отдельно. </font><font style="vertical-align: inherit;">Незнание этих и других правил форума не освобождает вас от ответственности за их нарушение, но считается нарушением и отягчающим обстоятельством. </font><font style="vertical-align: inherit;">Эти правила могут быть изменены или дополнены в связи с обстоятельствами, не подпадающими под действие этих правил. </font><font style="vertical-align: inherit;">Если пользователь нарушает правила, могут применяться некоторые штрафы.</font></font></dd>
					</dl>
					<hr class="dashed">
					<dl class="faq">
						<dt id="f0r1"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1.2. </font><font style="vertical-align: inherit;">Основные правила</font></font></strong></dt>
						<dd><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Не публикуйте информацию, содержащую: </font></font><ol><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">чрезмерное количество сленговых слов, грубых и нецензурных слов или фраз;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">реклама;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">порнография;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">чужая личная информация;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">оскорбления, угрозы, клевета;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">объекты расизма и разжигания межнациональной розни;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">политическая, религиозная и другие виды пропаганды;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">подстрекательство к насилию или нарушение действующего законодательства.</font></font></li></ol><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Наказание: редактирование или удаление информации, а также уведомление или блокировка пользователя.</font></font></dd>
					</dl>

				</div>

				<span class="corners-bottom"><span></span></span></div>
			</div>

			<div class="panel bg1">
				<div class="inner"><span class="corners-top"><span></span></span>

					<div class="content">
						<h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Раздел 2. Регистрация и настройка профиля пользователя</font></font></h2>

						<dl class="faq">
							<dt id="f1r0"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2.1. </font><font style="vertical-align: inherit;">Регистрация</font></font></strong></dt>
							<dd><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Запрещается:</font></font><ol><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">указывать несуществующий адрес электронной почты;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">создавать несколько учетных записей;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">создавать ложные профили других пользователей;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">попытка взлома других аккаунтов с помощью грубой силы.</font></font></li></ol><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Наказание: бан или удаление учетной записи пользователя.</font></font></dd>
						</dl>
						<hr class="dashed">
						<dl class="faq">
							<dt id="f1r1"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2.2. </font><font style="vertical-align: inherit;">Имя пользователя</font></font></strong></dt>
							<dd><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Запрещается:</font></font><ol><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать имена пользователей, которые могут быть похожи на имена пользователей других членов форума;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использать в имени пользователя специальные символы (кроме букв и цифр);</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать имена пользователей, почти полностью состоящие из цифр;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать адреса веб-сайтов в качестве имени пользователя.</font></font></li></ol><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Наказание: принудительное изменение имени пользователя. </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Рекомендуется: используйте короткие и легко запоминающиеся комбинации символов, которые так или иначе связаны с вами.</font></font></dd>
						</dl>
						<hr class="dashed">
						<dl class="faq">
							<dt id="f1r2"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2.3. </font><font style="vertical-align: inherit;">Аватар</font></font></strong></dt>
							<dd><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Запрещается:</font></font><ol><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать чужой аватар;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">часто менять аватар (чаще, чем раз в месяц).</font></font></li></ol><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Наказание: удаление аватара, в случае повторного нарушения - блокировка возможности выбора аватара. </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Рекомендуется: используйте свою фотографию или другое запоминающееся изображение в качестве аватара.</font></font></dd>
						</dl>

					</div>

					<span class="corners-bottom"><span></span></span></div>
				</div>

				<div class="panel bg2">
					<div class="inner"><span class="corners-top"><span></span></span>

						<div class="content">
							<h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Раздел 3. Темы и сообщения</font></font></h2>

							<dl class="faq">
								<dt id="f2r0"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3.1. </font><font style="vertical-align: inherit;">Тема</font></font></strong></dt>
								<dd><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Запрещается:</font></font><ol><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">создавать темы, адресованные конкретным пользователям форума;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">создавать банальные темы, которые намеренно направлены на флуд, не по теме и флейм;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">дублировать существующие темы;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">создавать темы, не соответствующие тематике форума.</font></font></li></ol><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Наказание: удаление темы или перенос ее в соответствующий форум, уведомление на имя автора.</font></font></dd>
							</dl>
							<hr class="dashed">
							<dl class="faq">
								<dt id="f2r1"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3.2. </font><font style="vertical-align: inherit;">Содержание темы</font></font></strong></dt>
								<dd><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Правило: тема должна максимально четко отражать ее суть. </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Запрещается:</font></font><ol><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать в качестве темы бессмысленные выражения типа «Помогите!», «Срочно!» и т. д .;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">писать всю тему или ее часть заглавными буквами, например: «ЧТО СЛЕДУЕТ СДЕЛАТЬ ???»;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать большое количество сгруппированных знаков препинания, например: «ПОМОГИТЕ!!! Что делать ???»;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать символы украшения, например: «.. :: Topic :: ..»;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать название темы, логически не связанной с вашим сообщением.</font></font></li></ol><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Наказание: принудительное изменение названия, уведомление на имя автора. </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Рекомендуется: максимально кратко изложить суть темы; </font><font style="vertical-align: inherit;">используйте тему, которая может заинтересовать посетителя: «Вышла новая редакция закона «О государственых закупках». Какие отрасли она охватывает?». </font><br><font style="vertical-align: inherit;">Помните: каждый посетитель должен идентифицировать тему по названию темы.</font></font></dd>
							</dl>
							<hr class="dashed">
							<dl class="faq">
								<dt id="f2r2"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3.3. </font><font style="vertical-align: inherit;">Сообщения</font></font></strong></dt>
								<dd><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Запрещается:</font></font><ol><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">писать сообщение заглавными буквами;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">злоупотребление BBCode, например, применение ко всему сообщению;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать письменные приемы, которые могут сделать смысл сообщения неясным для посетителей, например: «1ый 1с  В4ера»;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">злоупотребление смайлами (не более одного смайла на 100 символов);</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать смайлы с других сайтов через [img] BBCode;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">вставлять изображения размером более 250 килобайт с [img] BBCode (можно дать ссылку на изображение и написать какое-нибудь описание);</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">размещать сообщения, состоящие из одной ссылки без описания (каждый пользователь должен заранее знать, что он увидит, перейдя по вашей ссылке).</font></font></li></ol><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Наказание: изменение или удаление сообщения, уведомление на имя автора, в случае повторного нарушения - может быть дан бан. </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Не рекомендуется: использовать современные сетевые "диалекты" или профессиональные термины и т.п., если этого не требует тема обсуждения. </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Рекомендуется: писать правильно, без грамматических ошибок.</font></font></dd>
							</dl>
							<hr class="dashed">
							<dl class="faq">
								<dt id="f2r3"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3.4. </font><font style="vertical-align: inherit;">Обсуждения</font></font></strong></dt>
								<dd><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Запрещается:</font></font><ol><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">обсуждать действия модераторов вне форума администрации;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">флейм - игнорирование границ вежливости во время обсуждения;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">флуд - информация, лишенная смысла или здравого смысла, т.е. короткие сообщения типа «Круто», «Это интересно» и т.д .;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">не по теме - сообщения, не соответствующие теме, т.е. если обсуждаются марки автомобилей, но в сообщении написано, что завтра вы идете в кино;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">обмениваться личными сообщениями;</font></font></li><li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">использовать нечестные методы ведения дискуссий путем «искажения» высказываний собеседников, редактирования или удаления собственных сообщений с целью искажения или сокрытия их первоначального смысла.</font></font></li></ol><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Наказание: за «искажение» - ограничение прав нарушителей на редактирование собственных сообщений; </font><font style="vertical-align: inherit;">в остальных случаях - удаление сообщений с нарушениями, уведомления авторов.</font></font></dd>
							</dl>

						</div>

						<span class="corners-bottom"><span></span></span></div>
					</div>


				</div>
</div>
				@endsection
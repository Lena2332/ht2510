<!DOCTYPE html>
<html lang="ru-RU">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="format-detection" content="telephone=no">
	<title>{{ $metaTitle }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset(env('THEME')) }}/images/favicon.png">
	<link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/bootstrap.min.css" />
	<link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/jquery.fancybox.css" />
	<link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/style.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
<!-- header -->
<header id="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="header_left">
					<div class="logo_block">
						<a href="/"><img src="{{ asset(env('THEME')) }}/images/logoht.svg" alt="#"></a>
					</div>	
					<!-- menu -->
					     @yield('menu')
					<!-- end menu -->
				</div>
				<div class="header_right">
					<div class="rt-search">
						<form action="/search/" class="search" style="width: 0px; padding-right: 0px;">
							<input name="q" type="text" value="" placeholder="Поиск">
							<input style="display: none;" type="submit" value="">
							<button type="button" class="icon-search js-open-search" data-type="button"></button>
							<button type="button" class="js-close-search icon-cancel"></button>
						</form>
					</div>
					&nbsp;&nbsp;
					
					<!--<a href="tel:+74957929312" class="_header_phone">+7 495 792 93 12</a>-->
					<a href="" id="login-btn" class="j1 j3">Авторизация</a>
					<!--<a href="/cart/" id="header-basket" class="j2  ">КОРЗИНА (0)</a>-->
				</div>
			</div>
		</div>
	</div>
</header>


               <!-- mainblock -->
		     @yield('ArticalsSection')
		<!-- end mainblock --> 

		<!-- mainblock -->
		     @yield('mainBlock')
		<!-- end mainblock -->
		
               <!-- lastItems -->
	             @yield('lastItemsMetodology')
	       <!-- end lastItems -->
	

               <!-- lastItems -->
	             @yield('lastItemsInstruction')
	       <!-- end lastItems -->


<!-- footer -->
<footer id="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 pad_no">
				<div class="footer_left">
					<div class="ll1 hidden-xs hidden-sm">© 2008–2018 hT2510</div>
					<ul class="footer_menu">
						<li><a href="">Приобрести</a></li>
						<li><a href="/catalog.php">Методология</a></li>
						<li><a href="/catalog.php">Инструкция</a></li>
						<!--<li><a href="">Оферта</a></li>-->
					</ul>
				</div>
				<div class="footer_right">
					<div class="footer_link">
						<a href="#" target="_blank" class="icon-instagram">INSTAGRAM</a>
						<a href="#" class="js-subscribe icon-mail" data-toggle="modal" data-target="#modal_subscr">Подписка</a>
					</div>
					<!-- <div class="site_design">
                        Дизайн сайта: <a href="#" target="_blank">ITW</a>
                    </div> -->
				</div>
				<div class="ll1 visible-xs visible-sm">© 2008–2018</div>
			</div>
		</div>
	</div>
</footer>

<div class="pp-mod1 m1">
    <button class="close2 icon-cancel"></button>
	<div class="ct1">
		<div class="t1">Зарегистрируйтесь на hT2510</div>
		<p class="p1"></p>
		<div class="ff-h1" id="auth-form">
			<form class="form1" name="form_auth" method="post" target="_top" action="/?login=yes">
				<input type="email" placeholder="Email">
				<input type="password" placeholder="Пароль">
				<input type="password" placeholder="Повторите пароль">
				<select class="selectpicker" style="width: 100%" data-style="form_style">
					<option>Украина</option>
					<option>Австралия</option>
				</select>
				<div class="drop_search_city">
					<input type="text" class="form-control" placeholder="Введите город ...">
				</div>
				<p class="additional_text_registration">Нажимая на кнопку, вы даете согласие на обработку своих <a href="№">персональных данных</a>.</p>
				<input name="Login" type="submit" value="Зарегистрироваться">
			</form>
			<div class="ds-l1"><span>Вы наш клиент?</span><a href="" class="j1">Войдите в личный кабинет</a></div>
        </div>
        <div class="t-social1">Быстрая регистрация через профиль социальной сети</div>
		<div class="social1">
			<a href="#" class="icon-facebook"></a>
			<a href="#" class="icon-vkontakte"></a>
			<a href="#" class="icon-twitter"></a>
		</div>
	</div>
</div>

<div class="pp-mod1 m2">
    <button class="close2 icon-cancel"></button>
	<div class="ct1">
		<div class="t1">Войдите в личный кабинет</div>
		<p class="p1">Для доступа к последним обновлениям</p>
		
		<div class="ff-h1" id="auth-form">
			<form class="form1" name="form_auth" method="post" target="_top" action="/?login=yes">
				<input type="text" name="USER_LOGIN" maxlength="255" value="" placeholder="Эл. почта" data-place="">
				<input type="password" placeholder="Пароль" name="USER_PASSWORD" maxlength="255" autocomplete="off">
				<div class="lost-pass"><a href="forgot_password.php">Забыли пароль?</a></div>
				<input name="Login" type="submit" value="Войти">
			</form>
			<div class="ds-l1"><span>у вас еще нет аккаунта?</span><a href="" class="j2">Зарегистрируйтесь</a><br><br><a href="#" id="forgot_mobile">Восстановить пароль</a></div>
        </div>
        <div class="t-social1">Быстрая регистрация через профиль социальной сети</div>
		<div class="social1">
			<a href="#" class="icon-facebook"></a>
			<a href="#" class="icon-vkontakte"></a>
			<a href="#" class="icon-twitter"></a>
		</div>
	</div>
</div>

<div class="pp-mod1 m8">
    <button class="close2 icon-cancel"></button>
	<div class="ct1">
		<div class="t1">ОСТАВЬТЕ ВАШ КОММЕНТАРИЙ</div>
		<div class="ff-h1" id="auth-form">
			<form class="form1" name="modal-feedback" action="#">
				<input maxlength="255" placeholder="Имя *" data-place="" type="text" name="user_name" id="user_name" class="sp  req" value="">
				<input placeholder="Тема" name="theme" maxlength="255" autocomplete="off" value="" type="text" data-place="" class="">
				<select class="selectpicker" style="width: 100%" title="Выберите..." data-style="form_style">
					<option>Предложение</option>
					<option>Вопрос</option>
				</select>
				<input name="user_phone" id="user_phone" maxlength="255" value="" placeholder="Телефон " data-place="" type="text" class="">
				<input placeholder="Эл. почта *" type="text" maxlength="255" autocomplete="off" name="user_email" id="user_email" value="" class="sp  req" data-place="">
				<textarea name="MESSAGE" placeholder="Комментарий" ></textarea>
				<input name="Login" type="submit" value="Отправить">
			</form>
        </div>
	</div>
</div>





<!-- modal_subscr -->
<div class="modal fade" id="modal_subscr" tabindex="-1" role="dialog" aria-labelledby="modal_subscr" aria-hidden="true">
	<div class="modal-dialog">
		<button class="btn_close" data-dismiss="modal" aria-label="Close"></button>
		<div class="t1">Подпишитесь на новости I AM Studio<br>и получите -5% на следующую покупку</div>
		<form action="">
			<input type="email" name="email" required="" placeholder="Ваш e-mail">
			<p class="additional_text_registration">Подписываясь на новости, вы даете согласие на обработку своих <a href="/about/policy/">персональных данных</a>.</p>
			<p><input type="submit" class="btn btn-primary" value="Подписаться"></p>
		</form>
	</div>
</div>

<!-- modal_buy_click -->
<div class="modal fade" id="modal_buy_click" tabindex="-1" role="dialog" aria-labelledby="modal_buy_click" aria-hidden="true">
	<div class="modal-dialog">
		<button class="btn_close" data-dismiss="modal" aria-label="Close"></button>
		<div class="t1">Пожалуйста, введите ваши данные,<br>менеджер перезвонит вам в ближайшее время</div>
		<form action="#">
			<div class="form-group">
				<input type="text" name="name" required="" placeholder="Имя">
			</div>
			<div class="form-group">
				<input type="text" name="phone" required="" placeholder="Номер телефона">
			</div>
			<p class="additional_text_registration">Подписываясь на новости, вы даете согласие на обработку своих <a href="/about/policy/">персональных данных</a>.</p>
			<p><input type="submit" class="btn btn-primary" value="Отправить"></p>
		</form>
	</div>
</div>






<div class="mobile_menu__box" style="left: -200%;">
    <div class="first_lvl">
		<ul>
			<li>
				<a href="#">Главная</a>
			</li>
			<li>
				<a class="is_parent" href="#" data-type="catalog">Конструктор персональных калькуляторов</a>
			</li>
			
			<li>
				<a href="#">Приобрести</a>
			</li>
			<li>
				<a href="#">Контакты</a>
			</li>		
		</ul>
		<div class="mobile_menu-bottom_text">
			<!--<div class="_lang">
				<a href="/" class="active">RUSSIAN</a>
				<a href="#" class="">ENGLISH</a>
			</div>-->
			<div class="_phone"><a href="tel:74957929312">7 495 792 93 12</a></div>
		</div>
	</div>
    <div class="two_lvl" style="display: none; left: 200%;">
        <div class="_under_header">
            <span class="_back_arrow"></span><span></span>
        </div>
        <div class="_under" data-type="catalog">
			<ul>
				<li><a href="/catalog.php">Методология</a></li>
				<li><a href="/catalog.php">Инструкция</a></li>
				
			</ul>
		</div>
	</div>
</div>
<button class="scroll_up icon-angle-up btn-primary"></button>
<div id="page"></div>			
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{ asset(env('THEME')) }}/js/bootstrap.min.js"></script>
<script type='text/javascript' src="{{ asset(env('THEME')) }}/js/slick.min.js"></script>
<script type='text/javascript' src="{{ asset(env('THEME')) }}/js/bootstrap-select.min.js"></script>
<script type='text/javascript' src="{{ asset(env('THEME')) }}/js/sticky-kit.min.js"></script>
<script type='text/javascript' src="{{ asset(env('THEME')) }}/js/jquery.fancybox.js"></script>
<script type='text/javascript' src="{{ asset(env('THEME')) }}/js/script.js"></script>
</body>
</html>
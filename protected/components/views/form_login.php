<div class="navs">
	<?php if (Yii::app()->user->isGuest): ?>
	<ul>
		<li id="login">
		<a id="login-trigger" href="#"> Вход <span>&#9660;</span></a>
			<div id="login-content">
				<form method="post" action="<?php echo Yii::app()->createUrl('/login')?>" name="login_form" id="login_form">
					<fieldset id="inputs">
						<input id="email" name="LoginForm[username]" type="text" placeholder="Имя пользователя..." required /> 
						<input id="pass" name="LoginForm[password]" type="password" placeholder="Пароль..." required />
					</fieldset>
					<fieldset id="actions">
						<input type="submit" id="submit" value="Войти" /> 
						<input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="yes"> Запомнить меня <br />
						<br /> 
						<a href="<?php echo Yii::app()->createUrl('/forgot')?>" class="forgot">Забыли пароль?</a>
					</fieldset>
				</form>
			</div></li>
		<li id="signup"><a href="<?php echo Yii::app()->createUrl('/registration')?>">Регистрация</a></li>
	</ul>
	<?php else:?>
	<ul>
		<li id="logout">
			<a id="user-trigger" href="#"> Здравствуйте, <?php echo Yii::app()->user->name;?> <span>&#9660;</span></a>
			<div id="user-content">
				<a href="<?php echo Yii::app()->createUrl('/profile');?>">Личный кабинет</a>
				<br>
				<?php echo CHtml::link('Выход', Yii::app()->createUrl('/site/logout'));?>
			</div>
		</li>
	</ul>
	<?php endif; ?>
</div>
<!-- Выпадающая форма логина -->

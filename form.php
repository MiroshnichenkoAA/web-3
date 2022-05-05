 <body>
   <div id="form">
	<h1>Форма контракта</h1>

	<form action="index.php" method="POST">

	  <label>
		Имя:<br />
		<input type="text" name="name"
		  />
	  </label><br />

	  <label>
		Еmail:<br />
		<input name="email"
		  placeholder="test@example.com"
		  type="email" />
	  </label><br />

	  <label>
		Год рождения:<br />
		<select name="year">
	  <option value="Выбрать">Выбрать</option>
	<?php
		for($i=1900;$i<=2022;$i++){
		  printf("<option value=%d>%d год</option>",$i,$i);
		}
	?>
	</select> <br>
	  </label><br />
	  
	  Пол:<br />
	  <label><input type="radio" 
		name="pol" value="M" />
		Мужской</label>
	  <label><input type="radio"
		name="pol" value="W" />
		Женский</label><br />
		
	  Количество конечностей:<br />
	  <label><input type="radio"
		name="limb" value="0" />
		0</label>
	  <label><input type="radio"
		name="limb" value="1" />
		1</label>
	  <label><input type="radio"
		name="limb" value="2" />
		2</label>
	  <label><input type="radio"
		name="limb" value="3" />
		3</label>
	  <label><input type="radio" 
		name="limb" value="4" />
		4</label><br />
		
	  <label>
		Сверхспособности:
		<br />
		<select name="super[]"
		  multiple="multiple">
		  <option value="immortal">Бессмертие</option>
		  <option value="megabrain" >Мегамозг</option>
		  <option value="teleport">Телепортация</option>
		</select>
	  </label><br />
	  
	  <label>
		Биография:<br />
		<textarea name="bio">Write something</textarea>
	  </label><br />

	  Чекбокс:<br />
	  <label><input type="checkbox" name="checkbox"/>
		Я Не болею за Red Bull Racing</label><br />

	  Если уверенны в своем ответе нажимайте:
	  <input type="submit" value="Send" />
	</form>
	   
   
	   
  </body>

 <body>
   <div id="form">
    <h1>����� ���������</h1>

    <form action="index.php" method="POST">

      <label>
        ���:<br />
        <input type="text" name="name"
          />
      </label><br />

      <label>
        �mail:<br />
        <input name="email"
          placeholder="test@example.com"
          type="email" />
      </label><br />

      <label>
        ��� ��������:<br />
        <select name="year">
      <option value="�������">�������</option>
    <?php
        for($i=1900;$i<=2022;$i++){
          printf("<option value=%d>%d ���</option>",$i,$i);
        }
    ?>
    </select> <br>
      </label><br />
	  
	  ���:<br />
      <label><input type="radio" 
        name="pol" value="M" />
        �������</label>
      <label><input type="radio"
        name="pol" value="W" />
        �������</label><br />
		
	  ���������� �����������:<br />
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
        ����������������:
        <br />
        <select name="super[]"
          multiple="multiple">
          <option value="immortal">����������</option>
          <option value="megabrain" >��������</option>
	      <option value="teleport">������������</option>
        </select>
      </label><br />
	  
      <label>
        ���������:<br />
        <textarea name="bio">Write something</textarea>
      </label><br />

      �������:<br />
      <label><input type="checkbox" name="checkbox"/>
        � �� ����� �� Red Bull Racing</label><br />

      ���� �������� � ����� ������ ���������:
      <input type="submit" value="Send" />
    </form>
	   
   
	   
  </body>
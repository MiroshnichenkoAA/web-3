<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }
  // Включаем содержимое файла form.php.
  include('form.php');
  // Завершаем работу скрипта.
  exit();
} 

else 

{  
    $name= $_POST['name'];
    $email = $_POST['email'];
    $year = $_POST['year'];
    $pol = $_POST['pol'];
    $limb = $_POST['limb'];
    $bio = $_POST['bio'];
    $super= $_POST['super'];
    $errors = FALSE;
if (empty($name)) {
  print('Заполните имя.<br/>');
  $errors = TRUE;
}
  if (empty($email)) {
  print('Введите почту.<br/>');
  $errors = TRUE;
}
  if (empty($year)) {
  print('ВОЗРАСТ ВВЕДИТЕ!!!.<br/>');
  $errors = TRUE;
}
  if (!isset($pol)) {
  print('Так ты М или Ж?.<br/>');
  $errors = TRUE;
}
  if (!isset($limb)) {
  print('Назовите количество конечностей.<br/>');
  $errors = TRUE;
}
   if (empty($bio)) {
  print('Расскажите о себе.<br/>');
  $errors = TRUE;
}
  if (!isset($super)) {
  print('Правда нет способностей?.<br/>');
  $errors = TRUE;
}


// *************
// Тут необходимо проверить правильность заполнения всех остальных полей.
// *************

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}

// Сохранение в базу данных.

$user = 'u47591';
$pass = '1697006';
$db = new PDO('mysql:host=localhost;dbname=u47591', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

// Подготовленный запрос. Не именованные метки.
try {
  $stmt = $db->prepare("INSERT INTO form SET name = ?, email = ?, year = ?, sex = ?, limbs = ? , bio = ? ");
  $stmt -> execute(array($name,$email,$year,$pol,$limb,$bio));
  $id = $db->lastInsertId();
  $st = $db->prepare("INSERT INTO power SET p_name = ?, p_id = ?");
  foreach($super as $power)
  {
       $st -> execute(array($power,$id));
  } 
 

 

}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

//  stmt - это "дескриптор состояния".
 
//  Именованные метки.
//$stmt = $db->prepare("INSERT INTO test (label,color) VALUES (:label,:color)");
//$stmt -> execute(array('label'=>'perfect', 'color'=>'green'));
 
//Еще вариант
/*$stmt = $db->prepare("INSERT INTO users (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$firstname = "John";
$lastname = "Smith";
$email = "john@test.com";
$stmt->execute();
*/

// Делаем перенаправление.
// Если запись не сохраняется, но ошибок не видно, то можно закомментировать эту строку чтобы увидеть ошибку.
// Если ошибок при этом не видно, то необходимо настроить параметр display_errors для PHP.
header('Location: ?save=1');



}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.

// Проверяем ошибки.

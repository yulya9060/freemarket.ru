

<?php
$a1 = 5;
$a2 = 0.5;
echo $a1+$a2;

$str = 'Hello';
$surname = 'Tugalov';
echo "test:$a2";
echo $str .' ' .$surname; //конкатенация
echo 5 + 10;

$weather = 'снег' ;

if ($weather  =='снег') {
    echo 'Погода плохая';
}


//строка, в которой нужно что-то найти
$str = "Мой телефонный номер: ".
"33-22-44. Номер моего редактора: ".
"222-44-55 и 323-22-33";
//шаблон, по которому искать.
//Задает поиск семизначных номеров.
$pattern = "/\d{3}-\d{2}-\d{2}/m";
//функция, осуществляющая поиск
$num_match = preg_match_all ($pattern,
$str, $result);
//вывод результатов поиска
for ($i=0;$i<$num_match;$i++)
echo "Совпадение $i: ".
$result[0][$i]."<br>";



$age = 20;

if ( $age <24 ) {
	echo 'Вы еще слишком малы для клуба';
}

else {
	echo 'Входите';
}


//циклы for while foreach


for ($i = 0; $i < 10; $i++) {
	echo 'Hello'.$i.'</br>';
}


$i=0;
while ($i<10) {
  echo '</br>Hi'.$i;
  $i++;
}

function get_bigger($a,$b) {
	
	return max($a,$b);
}

$bigger = get_bigger(2000,56);

echo $bigger;


class Parent1 {
  function parent_funct() { echo "<h1>Это родительская функция</h1>"; }
  function test () { echo "<h1>Это родительский класс</h1>"; }
}

class Child extends Parent1 {
  function child_funct() { echo "<h2>Это дочерняя функция</h2>"; }
  function test () { echo "<h2>Это дочерний класс</h2>"; }
}

$object = new Parent1;
$object = new Child;

$object->parent_funct(); // Выводит 'Это родительская функция'
$object->child_funct(); // Выводит 'Это дочерняя функция'
$object->test(); // Выводит 'Это дочерний класс'

class f_gamer {
	var $name;
	var $sname;
	var $captain;
	var $date;

	function __f_gamer ($name, $sname, $captain=false) {
		$this -> name = $name;
		$this -> sname = $sname;
		$this -> captain = $captain;
	}

	function Setdate ($date) {
		$this ->date = $date;
	}

	function GetDate () {
		echo 'name ='.$this -> name;
	}

 }

 $gamer = new f_gamer;
 $gamer ->__f_gamer('Vasiliy','Ivanov');
 $gamer->GetDate();



 $pizza  = "кусок1 кусок2 кусок3 кусок4 кусок5 кусок6";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // кусок1
echo $pieces[1]; // кусок2

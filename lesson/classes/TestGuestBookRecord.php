<?php
/*//родительский класс
class User { }

//наследуемый класс от SomeClass
class Admin extends User { }

//обьект родительского класса
$user = new User();
//обьект дочернего класса
$admin = new Admin();*/

//-------------------------------

//gettype()- возвращает строку-название типа (возвращает "object")

//echo gettype($user);

//-------------------------------

//Класс так же имеет тип
//instanceof- проверяет является ли обьект, обьектом заданного класса, и предков, но не потомков!!!

/*
Наследование от пользователя (user), пользователь-администратор (admin) и пользователь-модератор (moderator)

Каждый администратор и модератор является пользователем, но не каждый пользователь, является администратором или модератором. Пожтому instanceof действует только по направлению в верх,

--USER
----ADMIN
----MODERATOR
 */


/*//$user это обьект User? -bool(true) ДА
var_dump($user instanceof User);
echo "<br>";
//$user это обьект Admin? -bool(false) НЕТ
var_dump($user instanceof Admin);
echo "<br>";
//$admin это обьект User? -bool(true) ДА
var_dump($admin instanceof User);*/



//-------------type hinting------------------
/*
конструкция- указание ожидаемого типа аргумента
если это сумма то она является числом,
если это стол, то он обьект
сумма не может быть столом
 */

//родительский класс
/*class User { }

//наследуемый класс от SomeClass
class Admin extends User { }*/

//функция с двумя аргументами, можно просто вызвать функцию и задать любые аргументы и она отработает, но велика вероятность ошибок, на выручку приходит type hinting (контроль типа), указанин класа перед перечислением аргументов

/*
//НЕ верно
function sendMail($user, $message){
    echo 'Sending...';
}

sendMail(123, 'Hello');
*/

//------------------------------

/*function sendMail(User $user, $message){
    echo 'Sending...';
}

$user = new User();

sendMail($user, 'Hello');

$obj = new Admin();*/

//------------------------------

//Наследование и instanceof применимо и к контролю типов


/*function sendMail(User $user, $message){
    echo 'Sending...';
}

$user = new Admin();//<-!!!!!!!

sendMail($user, 'Hello');

$obj = new Admin();*/


//===================Модель Данных и ORM====================

//модель-обьект который является отрожением рельного обьекта
//есть пользователь и модель пользователя (класс), метод (отправить письмо пользователю, войти/выйти на/с сайта), ORM- принцип объект реальный представлен обьектом php, шаблон проектирования


/*//принцип разделение кода
class GuestBookRecord
{
    protected $message;

    //d конструкторе передаем сообщение (меняться оно не будет)
    public function __construct($message)
    {
        $this->message = $message;
    }
}

//функция возвращает массив строк, а нужно массив обьектов нужного класса
//function getAllGBRecording()
//{return file(__DIR__. '/db.txt', FILE_IGNORE_NEW_LINES );}
//var_dump(getAllGBRecording());

function getAllGBRecording()
{
    //получили данные из файла (прочитали)
    $data = file(__DIR__. '/db.txt', FILE_IGNORE_NEW_LINES );
    //массив который будет на выходе из функции
    $ret = [];

    //для каждой строки файла, создаем новый обьект класса
    foreach ($data as $line){
        //задаем массив для каждого нового обьекта (построчно)
        $ret[] = new GuestBookRecord($line);
    }
    return $ret;
}

var_dump(getAllGBRecording());*/

//-----------------------------------------

function debuge($data){
    echo '<pre>'.print_r($data, 1).'<pre>';
}

class GuestBookRecord
{
    protected $message;

    //d конструкторе передаем сообщение (меняться оно не будет)
    public function __construct($message)
    {
        $this->message = $message;
    }
}

class GuestBook
{
    protected $file;
    public function __construct($file)
    {
        $this->file = $file;
    }
    public function getAll()
    {
        $data = file($this->file);
        $ret = [];

        foreach ($data as $line){
            $ret[] = new GuestBookRecord($line);
        }
        return $ret;

    }
}


$gb = new GuestBook(__DIR__ . '/db.txt', FILE_IGNORE_NEW_LINES);
debuge($gb->getAll());
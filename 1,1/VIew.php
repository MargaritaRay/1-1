<?php
function debuge($data){
    echo '<pre>'.print_r($data, 1).'<pre>';
}

class View
{
    //защищенное свойство - массив для хранения этих данных
    protected $data = [];

    public function __construct()
    {
        #не имеет аргументов
    }

    public function assign($name, $value)
    {
        # сохраняет данные, передаваемые в шаблон по заданному имени |(используйте защищенное свойство - массив для хранения этих данных)
        $this->data[$name] = $value;

    }

    public function display($template)
    {
        # отображает указанный шаблон с заранее сохраненными данными

        $temp = file_get_contents( __DIR__ ."/$template" );
        return $temp;
    }

    public function render($template)
    {
        # аналогичен методу display(), но не выводит шаблон с данными в браузер, а возвращает его
        ob_start();
        extract($this->data);
        require __DIR__ . "/$template";
        return ob_get_clean ();
    }
}

$view = new View();
//$view->assign('Name', 'Val');
//$view->render( 'db.txt');

//debuge($view);

include __DIR__ . '/temp/testIndex.php';

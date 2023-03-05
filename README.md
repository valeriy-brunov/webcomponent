## Webcomponent плагин для CakePHP.

### Что может этот плагин?

Плагин позволяет использовать в виде веб-компоненты, создавать каркас веб-компонентов из командной
строки, а также производить тестирование веб-компонентов.

### Установка

Вы можете установить этот плагин в свое приложение CakePHP с помощью [composer](https://getcomposer.org).

Рекомендуемый способ установки пакетов composer - это:

```
composer require valeriy-brunov/webcomponent
composer dumpautoload
bin/cake plugin load Webcomponent
```

Для удаления плагина используйте команду:

```
composer remove valeriy-brunov/webcomponent --update-with-dependencies
```

### Настройка

После установки плагина необходимо подключить помошник плагина. Для этого необходимо добавить строку:

```php
// ./src/Controller/AppController.php
public function initialize(): void
{
    // Добавить строку:
    $this->viewBuilder()->addHelper('Webcomponent.Webcomp');
}
```

### Основные команды в терминале.

Создать файлы для нового веб-компонента:

```
$ sudo bin/cake webcomp <name>
```

где *name* - имя веб-компонента. Может состоять из несколько слов, указанных через дефис. Первая буква имени
может быть как в верхнем, так и нижнем регистре.

### Начало работы с созданным веб-компонентом.

После создания веб-компонента через терминал его необходимо настроить. Для этого необходимо указать 
его опции `[options]` в виде массива.

```php
echo $this->Webcomp->имяВебКомпонента([options]);
```

Если название веб-компонента состоит из нескольких слов через дефис, то необходимо использовать горбатую
(верблюжью) запись: первое слово в названии с маленькой буквы, следующие слова с большой буквы без дефиса.
Пример:

```php
// Вызвать веб-компонент 'my-field-color':
echo $this->Webcomp->myFieldColor();
```

Далее необходимо указать откуда будет браться внутреннее содержимое веб-компонента: из элемента
или ячейки `(cell)`, а может быть веб-компонент должен быть без внутреннего содержимого - т.е. пустым.

Для этого необходимо указать параметр `'select'`:

```php
<?php echo
    $this->Webcomp->имяВебКомпонента([
        'select' => 'element',// Берём содержимое с элемента (по умолчанию).
        'select' => 'cell',// Берём содержимое с ячейки.
        'select' => 'clear',// Внутреннее содержимое оставить пустым.
    ]);
?>
```

Один и тот же веб-компонент может использоваться для загрузки содержимого из элемента или ячейки, а
может не содержать внутреннего содержимого.

При указании загрузки из ячейки, её можно дополнительно настроить:

```php
<?php echo
    $this->Webcomp->имяВебКомпонента([
        'select' => 'cell',
        'cell' => [
            'settings' => [настройки],
            'cashe' => true,// Включаем кеширование.
            'view' => 'имя_вида_ячейки',// По умолчанию это стандартный вид 'display'.
        ],
    ]);
?>
```

Будет вызвана ячейка и вставлено её содержимое внутрь веб-компонента со следующими настройками:

```php
$cell = $this->cell('имяВебКомпонента', [ $cell['settings'] ], [ 'cache' => $cell['cashe'] ])->render( $cell['view'] );;
```

Также можно настроить и при загрузке содержимого через элемент:

```php
<?php echo
    $this->Webcomp->имяВебКомпонента([
        'element' => [
            'settings' => [настройки],
            'cashe' => true,// Включаем кеширование.
        ],
    ]);
?>
```

Будет вызван элемент и вставлено внутрь веб-компонента его содержимое:

```php
$elem = $this->element('имяВебКомпонента', [ $element['settings'] ], [ 'cache' => $element['cashe'] ]);
```

Все остальные элементы массива преобразуется в атрибуты со значениями.

```php
echo $this->Webcomp->myField([
    'view' => 'on',// Преобразуется в атрибут 'view'='on'
    'color' => 'red',// Преобразуется в атрибут 'color'='red'
]);
```

Указанный код преобразуется:

```html
<brunov-my-field "view"="on" "color"="red">
    ...
</brunov-my-field>
```

Если содержимое элемента будет разное в зависимости от ситуации, то необходимо внутри элемента использовать конструкцию `$this->fetch()`:

```html
<template class="...">
    <?= $this->fetch('mycomp') ?>
</template>
```

### Подключение js к веб-компоненту.

Js-код подключается к веб-компоненту автоматически. Никаких действий со стороны пользователя не требуется.
Подключать вложенные веб-компоненты через `import ...`, как это рекомендуют, не нужно.

### Тестирование js-кода.

При создание веб-компонента через терминал, помимо основных файлов "js" будет создан файл "test.js".
Он будет содержать различные тесты. Для запуска тестов необходимо в адресной строке браузера набрать:

```text
.../webcomp/имя_веб_компонента (или имя_директории_веб_компонента)
```

Плагин найдёт файл "test.js" в указанной директории и запустит его на выполнение. Результаты тестирования
отобразяться в браузере.







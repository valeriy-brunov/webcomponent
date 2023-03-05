<?php
declare(strict_types=1);

namespace Webcomponent\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Webcomp helper
 */
class WebcompHelper extends Helper
{
   /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [
        'select' => 'element',
    ];

    /**
     * Настройка помошника.
     */
    public function initialize( array $config ): void
    {}

    /**
     * Метод "__call".
     *
     * Метод срабатывает при вызове не существующего метода.
     *
     * @params {string} Имя веб-компонента.
     * @params {array}  Массив значений, переданных в веб-компонент.
     * @return string
     */
    public function __call( $name, array $arr ): string
    {
        // Настройки по умолчанию.
        if ( isset($arr[0]['select']) ) {
            $select = $arr[0]['select'];
        }
        else {
            $select = $this->getConfig('select');
        }
        unset( $arr[0]['select'] );

        if ( isset($arr[0]['cell'] ) and !empty($arr[0]['cell']) ) {
            $cell['settings'] = $arr[0]['cell']['settings'] ?? [];
            $cell['cashe']    = $arr[0]['cell']['cashe'] ?? [];
            $cell['view']     = $arr[0]['cell']['display'] ?? [];
        }
        unset( $arr[0]['cell'] );

        return $this->getView()->element('Webcomponent.webcomp', [
            'attr'        => $arr,
            'select'      => $select,
            'cell'        => $cell ?? [],
            'name'        => strtolower( preg_replace('/([A-Z]{1})/', '-$1', $name) ),
            'namewebcomp' => $name,
        ]);
    }

    /**
     * Метод "addattr".
     * 
     * Создает из массива строку Html с атрибутуми и их значениями.
     *
     * @param {array} $arr Массив для создания атрибутов со значениями.
     * @return ''|string
     */
    public function addattr( array $arr ): string
    {
        // Если массив не пуст.
        if ( !empty($arr) ) {
            foreach ( $arr as $key => $val ) {
                $str[] = $key . '="' . $val . '"';
            }
            if ( count($str) == 1 ) {
                return ' ' . $str[0];
            }
            else {
                return ' ' . implode( ' ', $str );
            }
        }
        else return '';
    }
}

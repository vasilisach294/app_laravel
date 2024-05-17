<?php

namespace App\Dictionaries;

class OrderStatus
{
    protected static $statuses = [
        'Создан',
        'Оплачен',
        'Отправлен',
        'Получен',
    ];

    static public function status($id)
    {
        return self::$statuses[$id];
    }

    static public function statuses()
    {
        return self::$statuses;
    }
}
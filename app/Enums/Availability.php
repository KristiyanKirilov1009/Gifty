<?php

namespace App\Enums;

enum Availability: string
{
    case InStock = 'in stock';
    case OutOfStock = 'out of stock';
}

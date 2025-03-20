<?php

namespace App\Enums;

enum OrderStatus: string
{
    // e.g., pending, processing, completed, failed
    case Pending = 'pending';
    case Processing = 'processing';
    case Completed = 'completed';
    case Failed = 'failed';
    case Canceled = 'canceled';
}

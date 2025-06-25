<?php

declare(strict_types=1);

namespace SumsubApi\Enums;

enum CheckType: string
{
    case PAYMENT_METHOD = 'PAYMENT_METHOD';
    case FACE_LIVELINESS = 'FACE_LIVELINESS';
    case FACE_MATCH = 'FACE_MATCH';
}

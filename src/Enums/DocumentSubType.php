<?php

declare(strict_types=1);

namespace SumsubApi\Enums;

enum DocumentSubType: string
{
    case FRONT_SIDE = 'FRONT_SIDE';
    case BACK_SIDE = 'BACK_SIDE';
}

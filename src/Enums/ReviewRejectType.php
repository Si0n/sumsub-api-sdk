<?php

declare(strict_types=1);

namespace SumsubApi\Enums;

enum ReviewRejectType: string
{
    case FINAL = 'FINAL';
    case RETRY = 'RETRY';
}

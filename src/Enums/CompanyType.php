<?php

declare(strict_types=1);

namespace SumsubApi\Enums;

enum CompanyType: string
{
    case INDIVIDUAL = 'individual';
    case COMPANY = 'company';
}

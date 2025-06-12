<?php

declare(strict_types=1);

namespace SumsubApi\Enums;

enum ApplicantStatus: string
{
    case INIT = 'init';
    case PENDING = 'pending';
    case PRE_CHECKED = 'prechecked';
    case QUEUED = 'queued';
    case COMPLETED = 'completed';
    case ON_HOLD = 'onHold';
    case REJECTED = 'rejected';
}

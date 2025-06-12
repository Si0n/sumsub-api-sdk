<?php

namespace SumsubApi\Enums;

enum ReviewStatus: string
{
    /**
     * The applicant is created and the verification process is launched. At this moment, the initial registration has started but not all required documents are uploaded.
     */
    case INIT = 'init';
    /**
     * The applicant is ready to be processed. It means that required documents are uploaded, the applicant profile contains necessary information and is now in a queue, waiting to be checked.
     */
    case PENDING = 'pending';

    /**
     * The check is half-way finished. At this step, the applicant profile is created and the uploaded documents have passed the initial quick check.
     */
    case PRE_CHECKED = 'prechecked';

    /**
     * The checks are in progress.
     */
    case QUEUED = 'queued';

    /**
     * The check has been completed, and the review answer is given whether the applicant is approved or declined.
     */
    case COMPLETED = 'completed';

    /**
     * Assistance from a compliance expert is required, and/or the applicant profile has been delegated to an administrator for manual check based on the criteria set by you.
     */
    case ON_HOLD = 'onHold';
}

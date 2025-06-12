<?php

namespace SumsubApi\Enums;

enum DocumentType: string
{
    /**
     * Agreement, e.g. for processing personal information.
     */
    case AGREEMENT = 'AGREEMENT';
    /**
     * Any document that contains information valuable for you. For example, an employment contract, lease agreement, non-disclosure agreement (NDA), service agreement, construction contract, and so on.
     */
    case ARBITRARY_DOC = 'ARBITRARY_DOC';

    /**
     * Bank card, like Visa or Maestro.
     */
    case BANK_CARD = 'BANK_CARD';

    /**
     * A contract.
     */
    case CONTRACT = 'CONTRACT';

    /**
     * COVID vaccination document (may contain the QR code).
     */
    case COVID_VACCINATION_FORM = 'COVID_VACCINATION_FORM';

    /**
     * Driving license.
     */
    case DRIVERS = 'DRIVERS';

    /**
     * Translation of the driving license required in the target country.
     */
    case DRIVERS_TRANSLATION = 'DRIVERS_TRANSLATION';

    /**
     * ID card.
     */
    case ID_CARD = 'ID_CARD';

    /**
     * Photo from an ID document like a photo from the passport (In this case, no additional metadata should be sent).
     */
    case ID_DOC_PHOTO = 'ID_DOC_PHOTO';

    /**
     * Proof of income.
     */
    case INCOME_SOURCE = 'INCOME_SOURCE';

    /**
     * Document from an investor, e.g. documents which disclose assets of the investor.
     */
    case INVESTOR_DOC = 'INVESTOR_DOC';

    /**
     * Passport.
     */
    case PASSPORT = 'PASSPORT';

    /**
     * Entity confirming payment (like bank card, crypto wallet, etc).
     */
    case PAYMENT_SOURCE = 'PAYMENT_SOURCE';

    /**
     * Profile image, i.e. avatar (in this case, no additional metadata should be sent).
     */
    case PROFILE_IMAGE = 'PROFILE_IMAGE';

    /**
     * Residence permit or registration document in the foreign city/country.
     */
    case RESIDENCE_PERMIT = 'RESIDENCE_PERMIT';

    /**
     * Selfie with a document / Selfie.
     */
    case SELFIE = 'SELFIE';

    /**
     * Proof of address document.
     */
    case UTILITY_BILL = 'UTILITY_BILL';

    /**
     * Second proof of address document.
     */
    case UTILITY_BILL2 = 'UTILITY_BILL2';

    /**
     * Certificate of vehicle registration.
     */
    case VEHICLE_REGISTRATION_CERTIFICATE = 'VEHICLE_REGISTRATION_CERTIFICATE';

    /**
     * Selfie video (can be used in WebSDK and MobileSDK).
     */
    case VIDEO_SELFIE = 'VIDEO_SELFIE';

    /**
     * Should be used only when nothing else applies.
     */
    case OTHER = 'OTHER';
}

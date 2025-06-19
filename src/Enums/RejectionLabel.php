<?php

namespace SumsubApi\Enums;

enum RejectionLabel: string
{
    case TEMPORARY_APPLICANT_INTERRUPTED_INTERVIEW = 'APPLICANT_INTERRUPTED_INTERVIEW';
    case TEMPORARY_ADDITIONAL_DOCUMENT_REQUIRED = 'ADDITIONAL_DOCUMENT_REQUIRED';
    case TEMPORARY_BACK_SIDE_MISSING = 'BACK_SIDE_MISSING';
    case TEMPORARY_BAD_AVATAR = 'BAD_AVATAR';
    case TEMPORARY_BAD_FACE_MATCHING = 'BAD_FACE_MATCHING';
    case TEMPORARY_BAD_PROOF_OF_ADDRESS = 'BAD_PROOF_OF_ADDRESS';
    case TEMPORARY_BAD_PROOF_OF_IDENTITY = 'BAD_PROOF_OF_IDENTITY';
    case TEMPORARY_BAD_PROOF_OF_PAYMENT = 'BAD_PROOF_OF_PAYMENT';
    case TEMPORARY_BAD_SELFIE = 'BAD_SELFIE';
    case TEMPORARY_BAD_VIDEO_SELFIE = 'BAD_VIDEO_SELFIE';
    case TEMPORARY_BLACK_AND_WHITE = 'BLACK_AND_WHITE';
    case TEMPORARY_COMPANY_NOT_DEFINED_BENEFICIARIES = 'COMPANY_NOT_DEFINED_BENEFICIARIES';
    case TEMPORARY_COMPANY_NOT_DEFINED_REPRESENTATIVES = 'COMPANY_NOT_DEFINED_REPRESENTATIVES';
    case TEMPORARY_COMPANY_NOT_DEFINED_STRUCTURE = 'COMPANY_NOT_DEFINED_STRUCTURE';
    case TEMPORARY_COMPANY_NOT_VALIDATED_BENEFICIARIES = 'COMPANY_NOT_VALIDATED_BENEFICIARIES';
    case TEMPORARY_COMPANY_NOT_VALIDATED_REPRESENTATIVES = 'COMPANY_NOT_VALIDATED_REPRESENTATIVES';
    case TEMPORARY_CONNECTION_INTERRUPTED = 'CONNECTION_INTERRUPTED';
    case TEMPORARY_DIGITAL_DOCUMENT = 'DIGITAL_DOCUMENT';
    case TEMPORARY_DOCUMENT_DEPRIVED = 'DOCUMENT_DEPRIVED';
    case TEMPORARY_DOCUMENT_DAMAGED = 'DOCUMENT_DAMAGED';
    case TEMPORARY_DOCUMENT_MISSING = 'DOCUMENT_MISSING';
    case TEMPORARY_DOCUMENT_PAGE_MISSING = 'DOCUMENT_PAGE_MISSING';
    case TEMPORARY_EXPIRATION_DATE = 'EXPIRATION_DATE';
    case TEMPORARY_FRONT_SIDE_MISSING = 'FRONT_SIDE_MISSING';
    case TEMPORARY_GRAPHIC_EDITOR = 'GRAPHIC_EDITOR';
    case TEMPORARY_ID_INVALID = 'ID_INVALID';
    case TEMPORARY_INCOMPATIBLE_LANGUAGE = 'INCOMPATIBLE_LANGUAGE';
    case TEMPORARY_INCOMPLETE_DOCUMENT = 'INCOMPLETE_DOCUMENT';
    case TEMPORARY_INCORRECT_SOCIAL_NUMBER = 'INCORRECT_SOCIAL_NUMBER';
    case TEMPORARY_PROBLEMATIC_APPLICANT_DATA = 'PROBLEMATIC_APPLICANT_DATA';
    case TEMPORARY_REQUESTED_DATA_MISMATCH = 'REQUESTED_DATA_MISMATCH';
    case TEMPORARY_SELFIE_WITH_PAPER = 'SELFIE_WITH_PAPER';
    case TEMPORARY_LOW_QUALITY = 'LOW_QUALITY';
    case TEMPORARY_NOT_ALL_CHECKS_COMPLETED = 'NOT_ALL_CHECKS_COMPLETED';
    case TEMPORARY_SCREENSHOTS = 'SCREENSHOTS';
    case TEMPORARY_UNFILLED_ID = 'UNFILLED_ID';
    case TEMPORARY_UNSATISFACTORY_PHOTOS = 'UNSATISFACTORY_PHOTOS';
    case TEMPORARY_UNSUITABLE_ENV = 'UNSUITABLE_ENV';
    case TEMPORARY_WRONG_ADDRESS = 'WRONG_ADDRESS';

    case FINAL_ADVERSE_MEDIA = 'ADVERSE_MEDIA';
    case FINAL_AGE_REQUIREMENT_MISMATCH = 'AGE_REQUIREMENT_MISMATCH';
    case FINAL_BLOCKLIST = 'BLOCKLIST';
    case FINAL_CHECK_UNAVAILABLE = 'CHECK_UNAVAILABLE';
    case FINAL_COMPROMISED_PERSONS = 'COMPROMISED_PERSONS';
    case FINAL_CRIMINAL = 'CRIMINAL';
    case FINAL_DB_DATA_MISMATCH = 'DB_DATA_MISMATCH';
    case FINAL_DB_DATA_NOT_FOUND = 'DB_DATA_NOT_FOUND';
    case FINAL_DOCUMENT_TEMPLATE = 'DOCUMENT_TEMPLATE';
    case FINAL_DUPLICATE = 'DUPLICATE';
    case FINAL_EXPERIENCE_REQUIREMENT_MISMATCH = 'EXPERIENCE_REQUIREMENT_MISMATCH';
    case FINAL_FORGERY = 'FORGERY';
    case FINAL_FRAUDULENT_LIVENESS = 'FRAUDULENT_LIVENESS';
    case FINAL_FRAUDULENT_PATTERNS = 'FRAUDULENT_PATTERNS';
    case FINAL_INCONSISTENT_PROFILE = 'INCONSISTENT_PROFILE';
    case FINAL_PEP = 'PEP';
    case FINAL_REGULATIONS_VIOLATIONS = 'REGULATIONS_VIOLATIONS';
    case FINAL_SANCTIONS = 'SANCTIONS';
    case FINAL_SELFIE_MISMATCH = 'SELFIE_MISMATCH';
    case FINAL_SPAM = 'SPAM';
    case FINAL_NOT_DOCUMENT = 'NOT_DOCUMENT';
    case FINAL_THIRD_PARTY_INVOLVED = 'THIRD_PARTY_INVOLVED';
    case FINAL_UNSUPPORTED_LANGUAGE = 'UNSUPPORTED_LANGUAGE';
    case FINAL_WRONG_USER_REGION = 'WRONG_USER_REGION';
    case FINAL_SUSPICIOUS_PATTERNS = 'SUSPICIOUS_PATTERNS';

    private const string TEXT_FINAL_ADVERSE_MEDIA = 'Applicant was found in the adverse media.';
    private const string TEXT_FINAL_AGE_REQUIREMENT_MISMATCH = 'Age requirement is not met (for example, cannot rent a car to a person below 25yo).';
    private const string TEXT_FINAL_BLOCKLIST = 'Applicant is blocklisted by your side.';
    private const string TEXT_FINAL_CHECK_UNAVAILABLE = 'Database is not available.';
    private const string TEXT_FINAL_COMPROMISED_PERSONS = 'Applicant does not correspond to Compromised Person Politics.';
    private const string TEXT_FINAL_CRIMINAL = 'Applicant is involved in illegal actions.';
    private const string TEXT_FINAL_DB_DATA_MISMATCH = 'Data mismatch; the profile could not be verified.';
    private const string TEXT_FINAL_DB_DATA_NOT_FOUND = 'No data was found; the profile could not be verified.';
    private const string TEXT_FINAL_DOCUMENT_TEMPLATE = 'Documents supplied are templates downloaded from the internet.';
    private const string TEXT_FINAL_DUPLICATE = 'This applicant was already created for this client, and duplicates are not allowed by the regulations.';
    private const string TEXT_FINAL_EXPERIENCE_REQUIREMENT_MISMATCH = 'Not enough experience (for example, driving experience is not enough).';
    private const string TEXT_FINAL_FORGERY = 'Forgery attempt has been made.';
    private const string TEXT_FINAL_FRAUDULENT_LIVENESS = 'There was an attempt to bypass the liveness check.';
    private const string TEXT_FINAL_FRAUDULENT_PATTERNS = 'Fraudulent behaviour was detected.';
    private const string TEXT_FINAL_INCONSISTENT_PROFILE = 'Data or documents of different persons were uploaded to one applicant.';
    private const string TEXT_FINAL_PEP = 'Applicant belongs to the PEP category.';
    private const string TEXT_FINAL_REGULATIONS_VIOLATIONS = 'Regulations violations.';
    private const string TEXT_FINAL_SANCTIONS = 'Applicant was found on sanction lists.';
    private const string TEXT_FINAL_SELFIE_MISMATCH = 'Applicant photo (profile image) does not match a photo on the provided documents.';
    private const string TEXT_FINAL_SPAM = 'Applicant has been created by mistake or is just a spam user (irrelevant images were supplied).';
    private const string TEXT_FINAL_NOT_DOCUMENT = 'Documents supplied are not relevant for the verification procedure.';
    private const string TEXT_FINAL_THIRD_PARTY_INVOLVED = 'Applicant is doing verification from a third party for a fee.';
    private const string TEXT_FINAL_UNSUPPORTED_LANGUAGE = 'Unsupported language for video identification.';
    private const string TEXT_FINAL_WRONG_USER_REGION = 'When applicants from certain regions/countries are not allowed to be registered.';
    private const string TEXT_FINAL_SUSPICIOUS_PATTERNS = 'An obsolete label. The applicant may have previously received a “Rejected” status in the dashboard due to patterns potentially implying a non-genuine verification attempt (e.g., signs of artificially altered data, third-party involvement, etc).';
    private const string TEXT_TEMPORARY_APPLICANT_INTERRUPTED_INTERVIEW = 'On the Video identification call, the applicant refused to finish the interview.';
    private const string TEXT_TEMPORARY_ADDITIONAL_DOCUMENT_REQUIRED = 'Additional documents are required to pass the check.';
    private const string TEXT_TEMPORARY_BACK_SIDE_MISSING = 'Back side of the document is missing.';
    private const string TEXT_TEMPORARY_BAD_AVATAR = 'Avatar does not meet the client\'s requirements.';
    private const string TEXT_TEMPORARY_BAD_FACE_MATCHING = 'Face check between document and selfie failed.';
    private const string TEXT_TEMPORARY_BAD_PROOF_OF_ADDRESS = 'Applicant uploaded a bad proof of address.';
    private const string TEXT_TEMPORARY_BAD_PROOF_OF_IDENTITY = 'Applicant uploaded a bad ID document.';
    private const string TEXT_TEMPORARY_BAD_PROOF_OF_PAYMENT = 'Applicant uploaded a bad proof of payment.';
    private const string TEXT_TEMPORARY_BAD_SELFIE = 'Applicant uploaded a bad selfie.';
    private const string TEXT_TEMPORARY_BAD_VIDEO_SELFIE = 'Applicant uploaded a bad video selfie.';
    private const string TEXT_TEMPORARY_BLACK_AND_WHITE = 'Applicant uploaded black and white photos of the documents.';
    private const string TEXT_TEMPORARY_COMPANY_NOT_DEFINED_BENEFICIARIES = 'Could not identify and duly verify the entity\'s beneficial owners.';
    private const string TEXT_TEMPORARY_COMPANY_NOT_DEFINED_REPRESENTATIVES = 'Representatives are not defined.';
    private const string TEXT_TEMPORARY_COMPANY_NOT_DEFINED_STRUCTURE = 'Could not establish the entity control structure.';
    private const string TEXT_TEMPORARY_COMPANY_NOT_VALIDATED_BENEFICIARIES = 'Beneficiaries are not validated.';
    private const string TEXT_TEMPORARY_COMPANY_NOT_VALIDATED_REPRESENTATIVES = 'Representatives are not validated.';
    private const string TEXT_TEMPORARY_CONNECTION_INTERRUPTED = 'Video Ident call connection was interrupted.';
    private const string TEXT_TEMPORARY_DIGITAL_DOCUMENT = 'Applicant uploaded a digital version of the document.';
    private const string TEXT_TEMPORARY_DOCUMENT_DEPRIVED = 'Applicant has been deprived of the document.';
    private const string TEXT_TEMPORARY_DOCUMENT_DAMAGED = 'Document is damaged.';
    private const string TEXT_TEMPORARY_DOCUMENT_MISSING = 'On the Video Ident call, the applicant refused to show or did not have the required documents.';
    private const string TEXT_TEMPORARY_DOCUMENT_PAGE_MISSING = 'Some pages of a document are missing.';
    private const string TEXT_TEMPORARY_EXPIRATION_DATE = 'Applicant uploaded an expired document.';
    private const string TEXT_TEMPORARY_FRONT_SIDE_MISSING = 'Front side of the document is missing.';
    private const string TEXT_TEMPORARY_GRAPHIC_EDITOR = 'Document or its data has been changed in the context of brightness, contrast, contents, or other editor traces.';
    private const string TEXT_TEMPORARY_ID_INVALID = 'Document that identifies a person (like a passport or an ID card) is not valid.';
    private const string TEXT_TEMPORARY_INCOMPATIBLE_LANGUAGE = 'Applicant should upload a translation of his document.';
    private const string TEXT_TEMPORARY_INCOMPLETE_DOCUMENT = 'Some information is missing from the document, or it\'s partially visible.';
    private const string TEXT_TEMPORARY_INCORRECT_SOCIAL_NUMBER = 'Applicant provided an incorrect social number (SSN, for example).';
    private const string TEXT_TEMPORARY_PROBLEMATIC_APPLICANT_DATA = 'Applicant data does not match the data in the documents.';
    private const string TEXT_TEMPORARY_REQUESTED_DATA_MISMATCH = 'Provided information does not match the recognized one taken from the document.';
    private const string TEXT_TEMPORARY_SELFIE_WITH_PAPER = 'Applicant should upload a special selfie (for example, a selfie with the paper and date on it).';
    private const string TEXT_TEMPORARY_LOW_QUALITY = 'Documents have low-quality that does not allow definitive conclusions to be made.';
    private const string TEXT_TEMPORARY_NOT_ALL_CHECKS_COMPLETED = 'All checks have not been completed.';
    private const string TEXT_TEMPORARY_SCREENSHOTS = 'Applicant uploaded screenshots.';
    private const string TEXT_TEMPORARY_UNFILLED_ID = 'Applicant uploaded the document without signatures and stamps.';
    private const string TEXT_TEMPORARY_UNSATISFACTORY_PHOTOS = 'There were problems with the photos, like poor quality or masked information.';
    private const string TEXT_TEMPORARY_UNSUITABLE_ENV = 'On Video Ident call, the applicant is either not alone or not visible.';
    private const string TEXT_TEMPORARY_WRONG_ADDRESS = 'Address from the documents does not match the address that the applicant entered.';

    public function isFinal(): bool
    {
        return str_starts_with($this->value, 'FINAL_');
    }

    public function isRetry(): bool
    {
        return str_starts_with($this->value, 'TEMPORARY_');
    }
}

<?php

declare(strict_types=1);

namespace SumsubApi\Enums;

enum PaymentSourceType: string
{
    case BANK_CARD = 'bankCard';
    case BANK_STATEMENT = 'bankStatement';
    case E_WALLET = 'eWallet';
    case CRYPTO_WALLET = 'cryptoWallet';
}

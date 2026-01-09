<?php
namespace App\Entities\Enums;

enum MoyenPaiement: string {
    case CARTE = 'carte';
    case PAYPAL = 'paypal';
}

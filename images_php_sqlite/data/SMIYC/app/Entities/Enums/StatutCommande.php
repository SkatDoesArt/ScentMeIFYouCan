<?php
namespace App\Entities\Enums;

enum StatutCommande: string {
    case BROUILLON = 'brouillon';
    case EN_COURS = 'en_cours';
    case PAYEE = 'payee';
    case EXPEDIEE = 'expediee';
    case ANNULEE = 'annulee';
}

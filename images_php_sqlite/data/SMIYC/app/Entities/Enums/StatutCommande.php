<?php

enum StatutCommande: string {
    case EN_COURS = 'en_cours';
    case PAYEE = 'payee';
    case EXPEDIEE = 'expediee';
    case ANNULEE = 'annulee';
}

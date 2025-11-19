<?php

namespace App\Enums\User;

enum UserStatus:String
{
   case ADMIN    = 'admin';     // Disponible
    case EMPRUNTEUR = 'emprunteur';      // Emprunté


    // Optionnel : libellé lisible pour l’affichage
    public function label(): string
    {
        return match ($this) {
            self::ADMIN   => 'admin',
            self::EMPRUNTEUR    => 'emprunteur',

        };
    }
}

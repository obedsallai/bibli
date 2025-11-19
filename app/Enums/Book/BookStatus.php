<?php

namespace App\Enums;

enum BookStatus: string
{
    case DISPONIBLE    = 'disponible';     // Disponible
    case NON_DISPONIBLE     = 'non_disponible';      // Emprunté


    // Optionnel : libellé lisible pour l’affichage
    public function label(): string
    {
        return match ($this) {
            self::DISPONIBLE   => 'Disponible',
            self::NON_DISPONIBLE    => 'non_disponible',

        };
    }

}
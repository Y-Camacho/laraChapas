<?php

namespace App\Enums;

enum BottleCapState: string {
    case Bad = 'Mal estado';
    case Acceptable = 'Estado aceptable';
    case Good = 'Buen estado';
    case VeryGood = 'Muy buen estado';
}

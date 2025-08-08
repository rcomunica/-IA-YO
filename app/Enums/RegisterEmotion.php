<?php

namespace App\Enums;

enum RegisterEmotion: string
{
    case Joy = 'alegria';
    case Sadness = 'tristeza';
    case Fear = 'miedo';
    case Anger = 'enojo';
    case Anxiety = 'ansiedad';
    case Shame = 'verguenza';
    case Guilt = 'culpa';
    case Love = 'amor';
    case Envy = 'envidia';
    case Irritation = 'irritacion';
}

/*
+----------------+-------------+
|   Español      |   Inglés    |
+----------------+-------------+
| Alegría        | Joy         |
| Tristeza       | Sadness     |
| Miedo          | Fear        |
| Ira (enojo)    | Anger       |
| Ansiedad       | Anxiety     |
| Vergüenza      | Shame       |
| Culpa          | Guilt       |
| Amor           | Love        |
| Envidia        | Envy        |
| Irritación     | Irritation  |
+----------------+-------------+
*/

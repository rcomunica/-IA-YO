<?php

namespace App\Enums;

enum RegisterEmotion: string
{
    case Joy = 'joy';
    case Sadness = 'sadness';
    case Fear = 'fear';
    case Anger = 'anger';
    case Anxiety = 'anxiety';
    case Shame = 'shame';
    case Guilt = 'guilt';
    case Love = 'love';
    case Envy = 'envy';
    case Irritation = 'irritation';
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

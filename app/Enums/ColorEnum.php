<?php

namespace App\Enums;

enum ColorEnum: int
{
    case BERRY_RED = 1;
    case RED = 2;
    case ORANGE = 3;
    case YELLOW = 4;
    case OLIVE = 5;
    case LIME = 6;
    case GREEN = 7;
    case MINT_GREEN = 8;
    case TEAL_BLUE = 9;
    case SKY_BLUE = 10;
    case LIGHT_BLUE = 11;
    case BLUE = 12;
    case GRAPE = 13;
    case PURPLE = 14;
    case LAVENDER = 15;
    case BRIGHT_PINK = 16;
    case PINK = 17;
    case SLATE_GRAY = 18;
    case GRAY = 19;
    case TAUPE = 20;
    case WHITE = 21;

    public function hex(): string
    {
        return match ($this) {
            self::BERRY_RED => '#C23B7A',
            self::RED => '#E74C3C',
            self::ORANGE => '#E67E22',
            self::YELLOW => '#F1C40F',
            self::OLIVE => '#B3B741',
            self::LIME => '#8BC34A',
            self::GREEN => '#2ECC71',
            self::MINT_GREEN => '#48C9B0',
            self::TEAL_BLUE => '#3CBAC6',
            self::SKY_BLUE => '#5DADE2',
            self::LIGHT_BLUE => '#85C1E9',
            self::BLUE => '#3498DB',
            self::GRAPE => '#8E44AD',
            self::PURPLE => '#9B59B6',
            self::LAVENDER => '#BCA9F5',
            self::BRIGHT_PINK => '#FF69B4',
            self::PINK => '#F5B7B1',
            self::SLATE_GRAY => '#708090',
            self::GRAY => '#95A5A6',
            self::TAUPE => '#8B8589',
            self::WHITE => '#FFFFFF',
        };
    }

    public function nameKey(): string
    {
        return match ($this) {
            self::BERRY_RED => 'berry_red',
            self::RED => 'red',
            self::ORANGE => 'orange',
            self::YELLOW => 'yellow',
            self::OLIVE => 'olive',
            self::LIME => 'lime',
            self::GREEN => 'green',
            self::MINT_GREEN => 'mint_green',
            self::TEAL_BLUE => 'teal_blue',
            self::SKY_BLUE => 'sky_blue',
            self::LIGHT_BLUE => 'light_blue',
            self::BLUE => 'blue',
            self::GRAPE => 'grape',
            self::PURPLE => 'purple',
            self::LAVENDER => 'lavender',
            self::BRIGHT_PINK => 'bright_pink',
            self::PINK => 'pink',
            self::SLATE_GRAY => 'slate_gray',
            self::GRAY => 'gray',
            self::TAUPE => 'taupe',
            self::WHITE => 'white',
        };
    }
}

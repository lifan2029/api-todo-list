<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            ['name' => 'berry_red', 'hex' => '#C23B7A'],
            ['name' => 'red', 'hex' => '#E74C3C'],
            ['name' => 'orange', 'hex' => '#E67E22'],
            ['name' => 'yellow', 'hex' => '#F1C40F'],
            ['name' => 'olive', 'hex' => '#B3B741'],
            ['name' => 'lime', 'hex' => '#8BC34A'],
            ['name' => 'green', 'hex' => '#2ECC71'],
            ['name' => 'mint_green', 'hex' => '#48C9B0'],
            ['name' => 'teal_blue', 'hex' => '#3CBAC6'],
            ['name' => 'sky_blue', 'hex' => '#5DADE2'],
            ['name' => 'light_blue', 'hex' => '#85C1E9'],
            ['name' => 'blue', 'hex' => '#3498DB'],
            ['name' => 'grape', 'hex' => '#8E44AD'],
            ['name' => 'purple', 'hex' => '#9B59B6'],
            ['name' => 'lavender', 'hex' => '#BCA9F5'],
            ['name' => 'bright_pink', 'hex' => '#FF69B4'],
            ['name' => 'pink', 'hex' => '#F5B7B1'],
            ['name' => 'slate_gray', 'hex' => '#708090'],
            ['name' => 'gray', 'hex' => '#95A5A6'],
            ['name' => 'taupe', 'hex' => '#8B8589'],
            ['name' => 'white', 'hex' => '#FFFFFF'],
        ];

        foreach ($colors as $color) {
            Color::firstOrCreate(['name' => $color['name']], ['hex' => $color['hex']]);
        }
    }
}

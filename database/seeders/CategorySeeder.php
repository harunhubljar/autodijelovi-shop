<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Motor',
                'description' => 'Dijelovi motora - klipovi, osovine, zupčanici, ventili i ostali dijelovi motora'
            ],
            [
                'name' => 'Kočnice',
                'description' => 'Kočioni sistem - pločice, diskovi, bubnjevi, cilindri i hidraulični sistemi'
            ],
            [
                'name' => 'Elektrika',
                'description' => 'Električni dijelovi - starteri, alternatoru, akumulatori, žice i senzori'
            ],
            [
                'name' => 'Ovjesa',
                'description' => 'Sistem ovjesa - amortizeri, opruge, stabilizatori i zglobovi'
            ],
            [
                'name' => 'Transmisija',
                'description' => 'Dijelovi transmisije - mjenjači, kvačilo, kardanske osovine i diferencijali'
            ],
            [
                'name' => 'Karoserija',
                'description' => 'Vanjski dijelovi - branici, farovi, retrovizori, stakla i ostali karoserijski dijelovi'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\AutoPart;
use Illuminate\Database\Seeder;

class AutoPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autoParts = [
            // Motor
            [
                'category_id' => 1,
                'name' => 'Komplet Klipova 4 Cilindra',
                'description' => 'Visokokvalitetni komplet klipova za 4-cilindarski motor. Dimenzije: Ø82mm. Uključuje klipne prstenove i osovine. Kompatibilno sa većinom evropskih vozila.',
                'price' => 350.00,
                'stock' => 15,
                'image' => null,
            ],
            [
                'category_id' => 1,
                'name' => 'Bregasta Osovina',
                'description' => 'Originalna bregasta osovina za benzinske motore 1.6-2.0L. Poboljšane performanse i dugotrajnost. Garancija 2 godine.',
                'price' => 420.00,
                'stock' => 8,
                'image' => null,
            ],
            [
                'category_id' => 1,
                'name' => 'Set Ventila (Usisni + Izduvni)',
                'description' => 'Kompletni set ventila za 4-cilindarske motore. 8 ventila usisnih + 8 izduvnih. Visoka otpornost na temperaturu.',
                'price' => 280.00,
                'stock' => 12,
                'image' => null,
            ],

            // Kočnice
            [
                'category_id' => 2,
                'name' => 'Kočione Pločice Prednje',
                'description' => 'Originalne prednje kočione pločice za VW, Audi, Škoda. Low-dust tehnologija za manje prašine. Uključuje senzore habanja.',
                'price' => 85.00,
                'stock' => 25,
                'image' => null,
            ],
            [
                'category_id' => 2,
                'name' => 'Kočioni Diskovi Par (2kom)',
                'description' => 'Par kočionih diskova - ventilirani. Ø280mm. Premium kvalitet sa antikorozivnom zaštitom. Za prednje točkove.',
                'price' => 145.00,
                'stock' => 18,
                'image' => null,
            ],
            [
                'category_id' => 2,
                'name' => 'Glavni Kočioni Cilindar',
                'description' => 'Glavni kočioni cilindar sa rezervoarom za kočionu tečnost. Kompatibilno sa hidrauličkim ABS sistemima.',
                'price' => 195.00,
                'stock' => 7,
                'image' => null,
            ],

            // Elektrika
            [
                'category_id' => 3,
                'name' => 'Starter Motor',
                'description' => 'Starter motor 12V, 1.4kW. Kompatibilan sa dizel i benzinskim motorima do 2.0L. Ugrađen Bosch tehnologija.',
                'price' => 320.00,
                'stock' => 10,
                'image' => null,
            ],
            [
                'category_id' => 3,
                'name' => 'Alternator 90A',
                'description' => 'Alternator 90A, 14V. Regenerisan i testiran. Uključuje vakuum pumpu. Garancija 12 mjeseci.',
                'price' => 280.00,
                'stock' => 6,
                'image' => null,
            ],
            [
                'category_id' => 3,
                'name' => 'Akumulator 74Ah',
                'description' => 'Akumulator 74Ah, 680A. Calcium tehnologija. Bez potrebe za održavanjem. 3 godine garancije.',
                'price' => 185.00,
                'stock' => 20,
                'image' => null,
            ],
            [
                'category_id' => 3,
                'name' => 'Komplet Svećica (4kom)',
                'description' => 'Set svećica NGK/Bosch za benzinske motore. Dugi vijek trajanja. Iridijumski vrh za bolje paljenje.',
                'price' => 65.00,
                'stock' => 30,
                'image' => null,
            ],

            // Ovjesa
            [
                'category_id' => 4,
                'name' => 'Amortizer Prednji Gas',
                'description' => 'Prednji gasni amortizer. Poboljšana stabilnost i komfor vožnje. Premium Bilstein kvalitet. Za VW Golf 5/6.',
                'price' => 155.00,
                'stock' => 14,
                'image' => null,
            ],
            [
                'category_id' => 4,
                'name' => 'Opruge Prednje Par',
                'description' => 'Par prednjih opruga. Standardna visina. Čelična konstrukcija sa antikorozivnom zaštitom.',
                'price' => 125.00,
                'stock' => 10,
                'image' => null,
            ],
            [
                'category_id' => 4,
                'name' => 'Stabilizator Prednji',
                'description' => 'Prednja stabilizaciona šipka. Povećava stabilnost u zavojima. Ø22mm. Uključuje gumice.',
                'price' => 95.00,
                'stock' => 12,
                'image' => null,
            ],

            // Transmisija
            [
                'category_id' => 5,
                'name' => 'Kvačilo Komplet (3 dijela)',
                'description' => 'Komplet kvačila - ploča, disk i ležaj. Za dizel motore 1.9-2.0 TDI. LUK original kvalitet.',
                'price' => 385.00,
                'stock' => 9,
                'image' => null,
            ],
            [
                'category_id' => 5,
                'name' => 'Kardanska Osovina',
                'description' => 'Prednja lijeva kardanska osovina. Sa ABS senzorom. Originalni OEM kvalitet. Za Golf 5/6, Audi A3.',
                'price' => 165.00,
                'stock' => 11,
                'image' => null,
            ],
            [
                'category_id' => 5,
                'name' => 'Ulje za Mjenjač 75W-90 (1L)',
                'description' => 'Sintetičko ulje za manuelne mjenjače. 75W-90 GL-4/GL-5. Motul Premium kvalitet.',
                'price' => 28.00,
                'stock' => 50,
                'image' => null,
            ],

            // Karoserija
            [
                'category_id' => 6,
                'name' => 'Far Prednji Lijevi',
                'description' => 'Prednji lijevi far za VW Golf 6. Halogeni sa pozicijskim svjetlom. Originalna Hella proizvodnja.',
                'price' => 245.00,
                'stock' => 5,
                'image' => null,
            ],
            [
                'category_id' => 6,
                'name' => 'Branik Prednji Crni',
                'description' => 'Prednji branik - crni, neofarban. Spremno za farbanje. Sa otvorima za maglenke. Za VW Passat B6.',
                'price' => 175.00,
                'stock' => 3,
                'image' => null,
            ],
            [
                'category_id' => 6,
                'name' => 'Retrovizor Desni Električni',
                'description' => 'Desni retrovizor sa električim podešavanjem i grijanjem. Crna boja kućišta. Za Golf 5/6.',
                'price' => 125.00,
                'stock' => 8,
                'image' => null,
            ],
            [
                'category_id' => 6,
                'name' => 'Vjetrobransko Staklo',
                'description' => 'Prednje vjetrobransko staklo. Zeleno, laminisano sa senzorom kiše. Za VW Golf 6.',
                'price' => 295.00,
                'stock' => 4,
                'image' => null,
            ],
        ];

        foreach ($autoParts as $part) {
            AutoPart::create($part);
        }
    }
}

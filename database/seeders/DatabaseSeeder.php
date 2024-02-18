<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('brands')->insertOrIgnore([
            [
                'name' => 'Ocean Nutrition',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Applaws',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Vita Bone',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'MyFamily',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Acana',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Farmina',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('product_categories')->insertOrIgnore([
            [
                'name' => 'Foods',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Beds',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Vest',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Booties',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Sweaters',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Toys',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bags',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Storage',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Nail trimmers',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cameras',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Brushes',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tags',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Clothes',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Collars/leashes',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        $data = [];
        foreach ([1, 2] as $petId) {
            foreach (Brand::all() as $brand) {
                foreach (ProductCategory::all() as $i => $category) {
                    $petName = $petId == 1 ? 'Dog' : 'Cat';
                    $originalPrice = rand(5, 15);
                    $discountedPrice = $originalPrice - rand(1, 4);
                    $data[] = [
                        'name' => $brand->name . ' ' . $petName . ' ' . $category->name . ' x 1 Each',
                        'part_no' => 'A' . $petId . $brand->id . $category->id . rand(100, 9999),
                        'barcode' => '01' . $petId . $brand->id . $category->id . rand(100, 99999),
                        'description' => $brand->name . ' ' . $petName . ' ' . $category->name . ' description',
                        'quantity_available' => '100',
                        'original_price' => $originalPrice,
                        'discounted_price' => $discountedPrice,
                        'brand_id' => $brand->id,
                        'pet_id' => $petId,
                        'category_id' => $category->id,
                        'item_on_sale' => rand(0, 1),
                        'new_arrival' => rand(0, 1),
                        'unit' => 'Each',
                        'is_active' => '1',
                        'created_at' => now()->format('Y-m-d H:i:s'),
                        'updated_at' => now()->format('Y-m-d H:i:s'),
                    ];

                }
            }
        }

        DB::table('products')->insertOrIgnore($data);

        $data = [];
        foreach ([1, 2] as $petId) {
            $data[] = [
                'name' => 'Full Grooming',
                'pet_id' => $petId,
                'min_price' => '10',
                'rating' => '4.2',
                'service_type' => '1,2',
                'features' => 'Door Service,Pick-up and Drop,Free Supplements,Pet-friendly crew,Pet safety measures',
                'details' => 'Bathing, Shampooing, Conditioning, Blow drying, Dematting, Haircut and trim, Hair Brushing, Nail trim, Paw trimming, Ear Cleaning, Eye cleaning, Anal glad expansion, Back shaving',
                'best_value' => 'Foods',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ];
            $data[] = [
                'name' => 'Basic Grooming',
                'pet_id' => $petId,
                'min_price' => '5',
                'rating' => '4.3',
                'service_type' => '1,2',
                'features' => 'Door Service,Pick-up and Drop,Free Supplements,Pet-friendly crew,Pet safety measures',
                'details' => 'Bathing, Shampooing, Conditioning, Blow drying, Dematting, Haircut and trim, Hair Brushing, Nail trim, Paw trimming, Ear Cleaning, Eye cleaning, Anal glad expansion, Back shaving',
                'best_value' => '0',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ];
            $data[] = [
                'name' => 'Haircut & Nail trim only',
                'pet_id' => $petId,
                'min_price' => '5',
                'rating' => '4.4',
                'service_type' => '1,2',
                'features' => 'Door Service,Pick-up and Drop,Free Supplements,Pet-friendly crew,Pet safety measures',
                'details' => 'Bathing, Shampooing, Conditioning, Blow drying, Dematting, Haircut and trim, Hair Brushing, Nail trim, Paw trimming, Ear Cleaning, Eye cleaning, Anal glad expansion, Back shaving',
                'best_value' => '0',
                'is_active' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ];
        }
        DB::table('packages')->insertOrIgnore($data);
    }
}

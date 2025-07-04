<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Premium Wireless Headphones',
                'description' => 'Noise-cancelling wireless headphones with 30-hour battery life.',
                'price' => 299.99,
                'stock_quantity' => 50,
                'sku' => 'HP-001',
                'image_url' => 'https://example.com/images/headphones.jpg',
                'is_active' => true,
                'weight' => 0.45,
                'dimensions' => json_encode(['length' => 18, 'width' => 15, 'height' => 8]),
                'category' => 'Electronics',
                'tags' => json_encode(['wireless', 'audio', 'noise-cancelling']),
            ],
            [
                'name' => 'Organic Cotton T-Shirt',
                'description' => '100% organic cotton t-shirt, available in multiple colors.',
                'price' => 29.99,
                'stock_quantity' => 100,
                'sku' => 'TS-001',
                'image_url' => 'https://example.com/images/tshirt.jpg',
                'is_active' => true,
                'weight' => 0.2,
                'dimensions' => null,
                'category' => 'Clothing',
                'tags' => json_encode(['organic', 'cotton', 'sustainable']),
            ],
            // Add more sample products as needed
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
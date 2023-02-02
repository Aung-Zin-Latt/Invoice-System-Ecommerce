<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($product_name); //URL friendly string
        $category_id = $this->faker->numberBetween(1,5);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(1000,50000),
            'sale_price' => $this->faker->numberBetween(1000, 50000),
            'SKU' =>'DIGI'.$this->faker->unique()->numberBetween(100,500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(10,20),
            'image' => 'digital_' .$this->faker->unique()->numberBetween(1,20).'.jpg',
            'category_id' => $category_id,
            'buying_price' => $this->faker->numberBetween(1000, 50000),
        ];
    }
}

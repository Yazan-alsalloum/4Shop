<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Type;
use App\Models\Size;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = "Admin User";
        $user->email = "winkelbeheer@example.com";
        $user->password = '$2y$10$MlAE0UDpKEi.WIsyNu43s.jxmQ9PzXEyDcMKfSfNOHwOTZxGEJ16m';
        $user->save();

        /////////////////////////////////

        $category_kleding = new Category();
        $category_kleding->name = "Kleding";
        $category_kleding->save();

        $category_overige = new Category();
        $category_overige->name = "Overige";
        $category_overige->save();

        /////////////////////////////////

        $product = new Product();
        $product->title = 'Vest';
        $product->description = 'Hoody met rits, voor stafleden en explorers. Logo voor en handjes achter op de rug.';
        $product->price = 29.00;
        $product->leiding = true;
        $product->image = 'img/hoody.png';
        $product->category_id = $category_kleding->id;
        $product->save();
        $product->refresh();
        if(array_key_exists('discount', $product->getAttributes()))
        {
            $product->discount = 12.50;
            $product->save();
        }

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Unisex";
        $type->description = "Basic Hoody full zip (grijs, logo voor en achter)";
        $type->save();

        $sizes = ["XS", "S", "M", "L", "XL", "XXL", "3XL"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Dames";
        $type->description = "Basic Hoody full zip Ladies (grijs, logo voor en achter)";
        $type->save();

        $sizes = ["XS", "S", "M", "L", "XL"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }

        /////////////////////////////////

        $product = new Product();
        $product->title = 'Polo';
        $product->description = 'Polo voor stafleden. Logo voor op de borst, handjes op de rug.';
        $product->price = 22.00;
        $product->leiding = true;
        $product->image = 'img/polo.png';
        $product->category_id = $category_kleding->id;
        $product->save();

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Unisex";
        $type->description = "Heren polo Classic Lincoln (groen, logo voor en achter)";
        $type->save();

        $sizes = ["XS", "S", "M", "L", "XL", "XXL", "3XL"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Dames";
        $type->description = "Dames polo Classic Marion (groen, logo voor en achter)";
        $type->save();

        $sizes = ["XS", "S", "M", "L", "XL", "XXL"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }

        /////////////////////////////////

        $product = new Product();
        $product->title = 'T-shirt jeugdleden';
        $product->description = 'T-shirt van goede kwaliteit. Alleen een logo voor op de borst. Aanvulling op het uniform, niet bedoeld als vervanger van de blouse.';
        $product->price = 7.50;
        $product->leiding = false;
        $product->image = 'img/jeugd.jpg';
        $product->category_id = $category_kleding->id;
        $product->save();

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Kindermaten";
        $type->description = "Classic T-shirt Kids (groen, alleen logo voor!)";
        $type->save();

        $sizes = ["90/100", "110/120", "130/140", "150/160"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Volwassenenmaten";
        $type->description = "Clique basic tee (groen, alleen logo voor!)";
        $type->save();

        $sizes = ["XS", "S", "M", "L", "XL", "XXL"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }

        /////////////////////////////////

        $product = new Product();
        $product->title = 'T-shirt stafleden';
        $product->description = 'T-shirt van hoge kwaliteit. Logo voor op de borst en handjes op de rug.';
        $product->price = 16.00;
        $product->leiding = true;
        $product->image = 'img/staf.jpg';
        $product->category_id = $category_kleding->id;
        $product->save();

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Unisex t/m xxl";
        $type->description = "New Classic Heren (groen, logo voor en achter)";
        $type->save();

        $sizes = ["XS", "S", "M", "L", "XL", "XXL"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Unisex grote maten";
        $type->description = "Clique basic tee (groen, logo voor en achter!)";
        $type->save();

        $sizes = ["3XL", "4XL"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Dames";
        $type->description = "New Classic Dames (groen, logo voor en achter)";
        $type->save();

        $sizes = ["XS", "S", "M", "L", "XL", "XXL"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }

        /////////////////////////////////

        $product = new Product();
        $product->title = 'Keycord';
        $product->description = 'Keycord met logo\'s van Scouting Raamsdonksveer';
        $product->price = 1.00;
        $product->leiding = false;
        $product->image = 'img/keycords.jpg';
        $product->category_id = $category_overige->id;
        $product->save();

        $type = new Type();
        $type->product_id = $product->id;
        $type->title = "Standaard";
        $type->description = "";
        $type->save();

        $sizes = ["Standaard"];
        foreach ($sizes as $item)
        {
            $size = new Size();
            $size->type_id = $type->id;
            $size->title = $item;
            $size->save();
        }


    }
}

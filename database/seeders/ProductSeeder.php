<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 10;$i++){
            $product = new Product;
            $product->productName = "ผลิตภัณฑ์ทดสอบ ".$i;
            $product->productDesc = "ทดสอบคำอธิบายผลิตภัณฑ์ ที่มีความยาว ที่ยาวมาก อาจทำให้ผู้ใช้อ่านได้ช้าและทำความเข้าใจได้เร็ว";
            $product->price = rand(200,4000);
            $product->save();
            sleep(1);
        }

    }
}

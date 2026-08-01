<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $N = 'https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=800';
        $NL = 'https://images.unsplash.com/photo-1585937421612-70a008356fbe?w=800';
        $R = 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=800';
        $B = 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=800';
        $D = 'https://images.unsplash.com/photo-1544787219-7f47ccb76574?w=800';

        $data = [
            'nihari' => [
                ['name' => 'سنگل نہاری (Single Nihari)', 'description' => 'Our classic Nihari, slow-cooked overnight and finished with desi ghee ka tarka.', 'price' => 600, 'is_featured' => true, 'image' => '/nihari/single_nihari.jpg'],
                ['name' => 'سنگل نہاری فرائی (Single Nihari Fry)', 'description' => 'Single Nihari served with crispy fried pieces on top.', 'price' => 800, 'is_featured' => false, 'image' => '/nihari/nihari_fry.jpg'],
                ['name' => 'ڈبل نہاری (Double Nihari)', 'description' => 'Double serving of our signature Nihari — plenty for a hearty meal.', 'price' => 1200, 'is_featured' => true, 'image' => '/nihari/double_nihari.jpg'],
                ['name' => 'نلی نہاری (Nalli Nihari)', 'description' => 'Signature Nihari topped with tender bone marrow (nalli) and fresh ginger.', 'price' => 1000, 'is_featured' => true, 'image' => '/nihari/nalli_nihari.jpg'],
                ['name' => 'مغز نہاری (Maghaz Nihari)', 'description' => 'Rich Nihari served with brain masala (maghaz) — a Liaquatabad specialty.', 'price' => 1000, 'is_featured' => false, 'image' => '/nihari/maghaz_nihari.jpg'],
                ['name' => 'دیسی گھی تڑکہ (Desi Ghee Tarka)', 'description' => 'Extra splash of hot desi ghee ka tarka over your Nihari.', 'price' => 200, 'is_featured' => false, 'image' => '/nihari/nihari_fry.jpg'],
                ['name' => 'سنگل اسپیشل نہاری (Single Special Nihari)', 'description' => 'Our most indulgent single serving with an extra-rich tarka.', 'price' => 1800, 'is_featured' => true, 'image' => '/nihari/single_nihari.jpg'],
                ['name' => 'اسپیشل نہاری تشلہ (Special Nihari Tashla)', 'description' => 'A grand family-sized tashla (tray) of Special Nihari — made for sharing.', 'price' => 2400, 'is_featured' => true, 'image' => '/nihari/double_nihari.jpg'],
            ],
            'nihari-extras' => [
                ['name' => 'ایکسٹرا بونٹی (Extra Bounty)', 'description' => 'Extra helping of boneless Nihari meat.', 'price' => 300, 'is_featured' => false, 'image' => '/nihari/extra_bounty.jpg'],
                ['name' => 'ایکسٹرا نلی (Extra Nalli)', 'description' => 'Additional piece of tender bone marrow (nalli).', 'price' => 400, 'is_featured' => false, 'image' => '/nihari/extra_nalli.jpg'],
                ['name' => 'ایکسٹرا مغز (Extra Maghaz)', 'description' => 'Additional serving of brain masala (maghaz).', 'price' => 400, 'is_featured' => false, 'image' => '/nihari/extra_maghaz.jpg'],
            ],
            'chicken-pulao' => [
                ['name' => 'چکن پلاؤ پلیٹ (Plate)', 'description' => 'Fragrant chicken pulao with tender chicken, served hot.', 'price' => 250, 'is_featured' => false, 'image' => '/rice/chicken_pulao.jpg'],
                ['name' => 'چکن پلاؤ آدھا کلو (Half kg)', 'description' => 'Half kilogram of flavourful chicken pulao — ideal for two.', 'price' => 350, 'is_featured' => false, 'image' => '/rice/chicken_pulao.jpg'],
                ['name' => 'چکن پلاؤ 1 کلو (1 kg)', 'description' => 'A full kilogram of chicken pulao for the whole family.', 'price' => 700, 'is_featured' => false, 'image' => '/rice/chicken_pulao.jpg'],
            ],
            'sada-biryani' => [
                ['name' => 'سادہ بریانی / پلاؤ پلیٹ (Plate)', 'description' => 'Simple, fragrant biryani / pulao plate — pure comfort. Made without chicken.', 'price' => 150, 'is_featured' => false, 'image' => '/rice/chicken_pulao.jpg'],
                ['name' => 'سادہ بریانی / پلاؤ آدھا کلو (Half kg)', 'description' => 'Half kilogram of sada biryani / pulao. Made without chicken.', 'price' => 280, 'is_featured' => false, 'image' => '/rice/chicken_biryani.jpg'],
                ['name' => 'سادہ بریانی / پلاؤ 1 کلو (1 kg)', 'description' => 'Full kilogram of sada biryani / pulao for sharing. Made without chicken.', 'price' => 560, 'is_featured' => false, 'image' => '/rice/chicken_pulao.jpg'],
            ],
            'chicken-biryani' => [
                ['name' => 'چکن بریانی پلیٹ (Plate)', 'description' => 'Classic chicken biryani, layered with saffron rice and masala.', 'price' => 250, 'is_featured' => true, 'image' => '/rice/chicken_biryani.jpg'],
                ['name' => 'چکن بریانی آدھا کلو (Half kg)', 'description' => 'Half kilogram of our signature chicken biryani.', 'price' => 350, 'is_featured' => false, 'image' => '/rice/chicken_biryani.jpg'],
                ['name' => 'چکن بریانی 1 کلو (1 kg)', 'description' => 'A full kilogram of chicken biryani — made for gatherings.', 'price' => 700, 'is_featured' => false, 'image' => '/rice/chicken_biryani.jpg'],
            ],
            'sides' => [
                ['name' => 'گجر اسپیشل لسی (Gujjar Special Lassi)', 'description' => 'Our house-special chilled lassi, thick and creamy.', 'price' => 150, 'is_featured' => false, 'image' => '/sides/lassi.jpg'],
                ['name' => 'دودھ کی ٹھنڈی بوتل (Cold Milk Bottle)', 'description' => 'Chilled bottle of milk to cool things down.', 'price' => 150, 'is_featured' => false, 'image' => '/sides/cold_milk.jpg'],
                ['name' => 'رائتہ (Raita)', 'description' => 'Cool, creamy yoghurt side — the perfect pair with biryani.', 'price' => 80, 'is_featured' => false, 'image' => '/sides/raita.jpg'],
                ['name' => 'کھیر (Kheer)', 'description' => 'Traditional slow-cooked rice pudding with cardamom, garnished with dry fruits.', 'price' => 200, 'is_featured' => false, 'image' => '/nihari/kheer.jpg'],
            ],
            'tin-pack' => [
                ['name' => 'ٹن پیک 450 گرام (450gm)', 'description' => 'Ready-made Nihari in a 450gm tin pack — take the taste home.', 'price' => 800, 'is_featured' => false, 'image' => '/tin/tin_450.jpg'],
                ['name' => 'ٹن پیک 900 گرام (900gm)', 'description' => 'Generous 900gm tin pack of our signature Nihari.', 'price' => 1600, 'is_featured' => false, 'image' => '/tin/tin_900.jpg'],
            ],
            'bread' => [
                ['name' => 'روٹی (Roti)', 'description' => 'Soft, fresh whole-wheat roti.', 'price' => 30, 'is_featured' => false, 'image' => '/bread/naan.jpg'],
                ['name' => 'چپاتی (Chapati)', 'description' => 'Thin, light chapati baked fresh.', 'price' => 15, 'is_featured' => false, 'image' => '/bread/chapati.jpg'],
                ['name' => 'شیرمال (Sheermal)', 'description' => 'Slightly sweet, saffron-infused traditional bread.', 'price' => 90, 'is_featured' => false, 'image' => '/bread/sheermal.jpg'],
                ['name' => 'تافتان (Taftan)', 'description' => 'Soft, leavened Persian-style bread, lightly sweet.', 'price' => 90, 'is_featured' => false, 'image' => '/bread/taftaan.jpg'],
            ],
        ];

        foreach ($data as $slug => $items) {
            $category = Category::where('slug', $slug)->first();

            foreach ($items as $item) {
                MenuItem::create(array_merge($item, ['category_id' => $category->id]));
            }
        }
    }
}

<?php

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
    	DB::table('products')->delete();

        DB::table('products')->insert(array(
			array('quantity' => 92, 'productName' => 'Amazon Kindle'),
			array('quantity' => 85, 'productName' => 'Apple iPod'),
			array('quantity' => 32, 'productName' => 'Audio Highway Listen Up'),
			array('quantity' => 43, 'productName' => 'Bose Noise-Canceling Headphones'),
			array('quantity' => 63, 'productName' => 'Diamond Rio PMP300'),
			array('quantity' => 57, 'productName' => 'Genica GN803 Tavarua'),
			array('quantity' => 95, 'productName' => 'Logitech Harmony'),
			array('quantity' => 82, 'productName' => 'Mattel Electronics Football'),
			array('quantity' => 11, 'productName' => 'MusicGremlin Wi-Fi MP3 Player'),
			array('quantity' => 23, 'productName' => 'Nintendo Game Boy'),
			array('quantity' => 54, 'productName' => 'Optical Media'),
			array('quantity' => 43, 'productName' => 'Panasonic DVD-L10'),
			array('quantity' => 37, 'productName' => 'Regency TR-1'),
			array('quantity' => 23, 'productName' => 'Sony Discman D-50'),
			array('quantity' => 67, 'productName' => 'Sony Walkman TPS-L2'),
			array('quantity' => 87, 'productName' => 'Sony Watchman'),
			array('quantity' => 23, 'productName' => 'TiVo'),
			array('quantity' => 12, 'productName' => 'Apple AirPort'),
			array('quantity' => 76, 'productName' => 'Apple iPad'),
			array('quantity' => 47, 'productName' => 'Apple PowerBook 100'),
			array('quantity' => 67, 'productName' => 'Asus Eee PC 700'),
			array('quantity' => 23, 'productName' => 'Commodore 64'),
			array('quantity' => 87, 'productName' => 'Connectix QuickCam'),
			array('quantity' => 47, 'productName' => 'DiskOnKey'),
			array('quantity' => 24, 'productName' => 'Engelbart Mouse'),
			array('quantity' => 33, 'productName' => 'Epson HX-20'),
			array('quantity' => 76, 'productName' => 'GRiD Compass 1101'),
			array('quantity' => 24, 'productName' => 'Hewlett-Packard HP-65'),
			array('quantity' => 12, 'productName' => 'Iomega Zip Drive'),
			array('quantity' => 24, 'productName' => 'LED'),
			array('quantity' => 64, 'productName' => 'Lego Mindstorms 1.0'),
			array('quantity' => 98, 'productName' => 'MicroSD'),
			array('quantity' => 45, 'productName' => 'MITS Altair 8800'),
			array('quantity' => 36, 'productName' => 'Radio Shack TRS-80 Model 100'),
			array('quantity' => 24, 'productName' => 'Texas Instruments SR-10'),
			array('quantity' => 24, 'productName' => 'Apple iPhone'),
			array('quantity' => 57, 'productName' => 'Ballpoint Pen'),
			array('quantity' => 86, 'productName' => 'Bell 103'),
			array('quantity' => 79, 'productName' => 'Bellsouth IBM Simon'),
			array('quantity' => 31, 'productName' => 'BlackBerry 6210'),
			array('quantity' => 97, 'productName' => 'Bluetooth Headset'),
			array('quantity' => 42, 'productName' => 'Danger Hiptop, a.k.a. Sidekick'),
			array('quantity' => 64, 'productName' => 'Fisher AG7 Space Pen'),
			array('quantity' => 97, 'productName' => 'Motorola DynaTAC 8000x'),
			array('quantity' => 42, 'productName' => 'Motorola Handie-Talkie HT 220 Slimline'),
			array('quantity' => 12, 'productName' => 'Motorola PageWriter 2000'),
			array('quantity' => 41, 'productName' => 'Motorola Razr V3'),
			array('quantity' => 23, 'productName' => 'Motorola StarTac'),
			array('quantity' => 46, 'productName' => 'Novatel Wireless MiFi'),
			array('quantity' => 24, 'productName' => 'Olympus Zuiko Pearlcorder'),
			array('quantity' => 24, 'productName' => 'Pager'),
			array('quantity' => 53, 'productName' => 'Palm Pilot 1000'),
			array('quantity' => 24, 'productName' => 'PhoneMate Model 400'),
			array('quantity' => 75, 'productName' => 'Samsung Uproar'),
			array('quantity' => 43, 'productName' => 'Sharp J-SH04'),
			array('quantity' => 57, 'productName' => 'Speak & Spell'),
		));
    }
}

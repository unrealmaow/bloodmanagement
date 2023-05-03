<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('cities')->insert([
            ['name' => 'Karachi'],
            ['name' => 'Lahore'],
            ['name' => 'Faisalabad'],
            ['name' => 'Rawalpindi'],
            ['name' => 'Multan'],
            ['name' => 'Gujranwala'],
            ['name' => 'Hyderabad'],
            ['name' => 'Peshawar'],
            ['name' => 'Abbottabad'],
            ['name' => 'Islamabad'],
            ['name' => 'Quetta'],
            ['name' => 'Sargodha'],
            ['name' => 'Bahawalpur'],
            ['name' => 'Sialkot'],
            ['name' => 'Sukkur'],
            ['name' => 'Larkana'],
            ['name' => 'Sheikhupura'],
            ['name' => 'Jhang'],
            ['name' => 'Rahim Yar Khan'],
            ['name' => 'Gujrat'],
            ['name' => 'Mardan'],
            ['name' => 'Kasur'],
            ['name' => 'Dera Ghazi Khan'],
            ['name' => 'Sahiwal'],
            ['name' => 'Nawabshah'],
            ['name' => 'Mirpur Khas'],
            ['name' => 'Okara'],
            ['name' => 'Chiniot'],
            ['name' => 'Shahkot'],
            ['name' => 'Khuzdar'],
            ['name' => 'Jacobabad'],
            ['name' => 'Kandhkot'],
            ['name' => 'Muzaffargarh'],
            ['name' => 'Khanewal'],
            ['name' => 'Hafizabad'],
            ['name' => 'Kohat'],
            ['name' => 'Daska'],
            ['name' => 'Gojra'],
            ['name' => 'Bahawalnagar'],
            ['name' => 'Muridke'],
            ['name' => 'Pakpattan'],
            ['name' => 'Tando Allahyar'],
            ['name' => 'Vehari'],
            ['name' => 'Nowshera'],
            ['name' => 'Chaman'],
            ['name' => 'Charsadda'],
            ['name' => 'Jalalpur Jattan'],
            ['name' => 'Mianwali'],
            ['name' => 'Chakwal'],
            ['name' => 'Kharian'],
            ['name' => 'Mandi Bahauddin'],
            ['name' => 'Wazirabad'],
            ['name' => 'Kamoke'],
            ['name' => 'Attock'],
            ['name' => 'Mian Channu'],
            ['name' => 'Muzaffarabad'],
            ['name' => 'Mailsi'],
            ['name' => 'Tando Adam'],
            ['name' => 'Jhelum'],
            ['name' => 'Nankana Sahib'],
            ['name' => 'Burewala'],
            ['name' => 'Timargara'],
            ['name' => 'Tank'],
            ['name' => 'Karak'],
            ['name' => 'Haripur'],
            ['name' => 'Shakargarh'],
            ['name' => 'Rajanpur'],
            ['name' => 'Layyah'],
            ['name' => 'Hangu'],
            ['name' => 'Jampur'],
            ['name' => 'Dadu'],
            ['name' => 'Badin'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};

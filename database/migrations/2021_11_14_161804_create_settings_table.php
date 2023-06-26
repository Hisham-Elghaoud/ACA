<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('website_logo')->nullable();
            $table->string('website_wide_logo')->nullable();
            $table->string('website_icon')->nullable();
            $table->string('website_cover')->nullable();
            $table->text('address')->nullable();
            $table->text('vision')->nullable();
            

            //contact
            $table->text('contact_email')->nullable();
            $table->string('phone')->nullable();


            //social
            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('linkedin_link')->nullable();


            //pages 
            $table->longText('privacy_page')->nullable();
            $table->longText('terms_page')->nullable();
            $table->longText('about_page')->nullable();
            $table->longText('contact_page')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVedioNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vedio_news', function (Blueprint $table) {
            $table->string('id')->primary()->default(DB::raw('(UUID())'));
            $table->string('title');
            $table->string('link')->nullable();
            $table->string('state')->default('active');
            $table->string('category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vedio_news');
    }
}

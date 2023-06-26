<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->string('id')->primary()->default(DB::raw('(UUID())'));
            $table->string('title');
            $table->string('content')->nullable();
            $table->string('state')->default('active');
            $table->string('category_id');
            $table->integer('views')->default(0);
            $table->string('path')->nullable();
            $table->boolean('fav')->default(false);
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
        Schema::dropIfExists('news');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string("name");
            $table->string("logo");
            $table->string("global_certificate");
            $table->string("city");
            $table->string("address");
            $table->string("phone");
            $table->text("map");
            $table->string("facebook");
            $table->string("twitter");
            $table->string("instagram");
            $table->string("github");
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
};

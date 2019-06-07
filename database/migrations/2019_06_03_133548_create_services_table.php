<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_service')->nullable();
            $table->string('tagline')->nullable();
            $table->bigInteger('range_1')->nullable();
            $table->bigInteger('range_2')->nullable();
            $table->string('fitur_1')->nullable();
            $table->string('fitur_2')->nullable();
            $table->string('fitur_3')->nullable();
            $table->string('fitur_4')->nullable();
            $table->string('fitur_5')->nullable();
            $table->integer('persentase')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('logo_name')->nullable()->default('money');
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
        Schema::dropIfExists('services');
    }
}

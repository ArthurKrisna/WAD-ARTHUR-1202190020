<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vaccine_id')->unsigned()->index()->nullable();
            $table->foreign('vaccine_id')->references('id')->on('vaccines')->onDelete('cascade');
            $table->string('name');
            $table->string('nik');
            $table->string('alamat');
            $table->string('image_ktp');
            $table->string('no_hp');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}

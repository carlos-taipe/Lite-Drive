<?php

use App\Models\Carpeta;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpeta', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('carpeta_id')->nullable();

            $table->foreign('carpeta_id')->references('id')->on('carpeta');
            $table->timestamps();
        });

        //Crearemos una carpeta global que contendra todo nuestra información

        $carpeta_master = new Carpeta;
        $carpeta_master->nombre = 'Carpeta Master';
        $carpeta_master->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpeta');
    }
}

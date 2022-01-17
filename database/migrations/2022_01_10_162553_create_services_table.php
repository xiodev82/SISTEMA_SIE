<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('detalle',255);
            $table->string('falla_segun_cliente',255)->nullable();
            $table->string('diagnostico',255);
            $table->string('solucion',255);
            $table->decimal('costo',10,2)->default(0);
            $table->date('fecha_estimada_entrega');
            
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unsignedBigInteger('cat_prod_service_id');
            $table->foreign('cat_prod_service_id')->references('id')->on('cat_prod_services');

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

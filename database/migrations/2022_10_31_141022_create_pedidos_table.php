<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('direccion');
            $table->foreignId('productos_id')->constrained('productos');
            $table->integer('cantidad');
            $table->foreignId('productos2_id')->constrained('productos');
            $table->integer('cantidad2');
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
        Schema::dropIfExists('pedidos');
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('pedidos_productos_id_foreign');
        });
    }
}

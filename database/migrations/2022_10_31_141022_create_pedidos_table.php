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
            $table->foreignId('user_id')->constrained('users');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('tipoIdentificacion');
            $table->string('numIdentificacion');
            $table->string('telefono');
            $table->string('direccion');
            $table->foreignId('productos_id')->constrained('productos');
            $table->integer('cantidad');
            $table->foreignId('productos2_id')->constrained('productos')->nullable();
            $table->integer('cantidad2')->nullable();
            $table->integer('precioUni1')->nullable();
            $table->integer('precioUni2')->nullable();
            $table->integer('precioTotal')->nullable();
            $table->string('estado');
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
        Schema::dropIfExists('pedidos');
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('pedidos_productos_id_foreign');
        });
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('pedidos_user_id_foreign');
        });
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('pedidos_estado_id_foreign');
        });
    }
}

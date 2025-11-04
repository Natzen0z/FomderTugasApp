<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('products', function (Blueprint $t) {
        $t->id();
        $t->string('name');
        $t->text('description')->nullable();
        $t->integer('stock')->default(0);
        $t->integer('price'); // atau bigInteger kalau butuh besar
        $t->timestamps();
    });
}
public function down(): void
{
    Schema::dropIfExists('products');
}
};

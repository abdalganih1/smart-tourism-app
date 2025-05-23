<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// ... uses statements ...
public function up(): void
{
    Schema::create('hotel_room_types', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100)->unique();
        $table->text('description')->nullable();
        // No timestamps based on schema
    });
}
// ... down() ...

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_room_types');
    }
};

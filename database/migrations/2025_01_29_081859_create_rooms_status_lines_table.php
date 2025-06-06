<?php

use App\Models\Categorie;
use App\Models\Room;
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
        Schema::create('rooms_status_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Room::class);
            $table->enum("status", ["Чистый", "Грязный", "Занят", "Назначен к уборке"]);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms_status_lines');
    }
};

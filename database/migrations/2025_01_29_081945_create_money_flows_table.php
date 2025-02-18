<?php

use App\Models\Booking;
use App\Models\User;
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
        Schema::create('money_flows', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Booking::class);
            $table->decimal("money", 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('user_id')->constrained();
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_flows');
    }
};

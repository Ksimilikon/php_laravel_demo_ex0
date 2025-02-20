<?php

use App\Models\Role;
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
        Role::create(['role'=>"user"]);
        Role::create(['role'=>'admin']);

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('set default');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete("restrict");
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('categorie_id')->references('id')->on('categories')->onUpdate('cascade');
        });
        Schema::table('rooms_status_lines', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('money_flows', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Role::find(1)->delete();
        Role::find(2)->delete();
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['room_id']);
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['categorie_id']);
        });
        Schema::table('rooms_status_lines', function (Blueprint $table) {
            $table->dropForeign(['room_id']);
        });
        Schema::table('money_flows', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['booking_id']);
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};

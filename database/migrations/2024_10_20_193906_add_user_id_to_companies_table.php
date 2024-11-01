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
        Schema::table('companies', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->after('id'); // Add user_id column after the id column

        // Optionally, add the foreign key constraint
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {

        $table->dropForeign(['user_id']);

        // Then drop the user_id column
        $table->dropColumn('user_id');    
        });
    }
};

<?php

use Illuminate\Database\Console\Migrations\StatusCommand;
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
        Schema::table('students', function (Blueprint $table) {
            $table->date('enrolled_at')->nullable()->after('address');
            $table->enum('status',['active','inactive','graduated'])->nullable()->after('enrolled_at')->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['enrolled_at','status']);
        });
    }
};

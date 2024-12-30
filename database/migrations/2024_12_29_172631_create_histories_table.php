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
        if (!Schema::hasTable('history')) {
    Schema::create('history', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('member_id')->nullable()->constrained('members'); // Make member_id nullable
        $table->bigInteger('book_id')->constrained('books'); // Reference to books table
        $table->string('status')->nullable(); // Status of the history, optional
        $table->date('tgl_pinjam')->nullable(); // Date borrowed, optional
        $table->date('tgl_kembali')->nullable(); // Date returned, optional
        $table->timestamps(); // Timestamps for created_at and updated_at
    });
}

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};

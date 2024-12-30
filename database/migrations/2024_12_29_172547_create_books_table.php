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
        Schema::create('book', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('title')->nullable();  // Title of the book
            $table->string('author')->nullable();  // Author's name
            $table->integer('publication_year')->nullable();  // Year of publication
            $table->text('description')->nullable();  // Description of the book
            $table->string('picture')->nullable();  // Image or picture of the book
            $table->integer('stock')->default(1); // Stock/quantity of books available
            $table->timestamps();  // Created at and updated at timestamps
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

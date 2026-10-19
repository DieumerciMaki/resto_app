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
        Schema::create('details_commandes', function (Blueprint $table) {
            $table->id();
             $table->foreignId('command_id')
            ->nullable()
            ->constrained('commandes')
            ->nullOnDelete();
             $table->foreignId('article_id')
            ->nullable()
            ->constrained('articles')
            ->nullOnDelete();
            $table->decimal('quantity', 8, 2);
            $table->decimal('price', 8, 2);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_commandes');
    }
};

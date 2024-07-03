<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $fillable = [
        'name',
        'posted_at',
        'level',
        'preparation_minutes',
        'ingredients',
        'author',
        'instructions',
        'picture'
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->date('posted_at');
            $table->enum('level', array('bajo', 'medio', 'alto'));
            $table->smallInteger('preparation_minutes');
            $table->string('ingredients');
            $table->string('author');
            $table->longText('instructions');
            $table->string('picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};

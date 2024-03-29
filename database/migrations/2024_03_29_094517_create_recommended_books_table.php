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
        Schema::create('recommended_books2', function (Blueprint $table) {
            $table->id();
            $table->string('book_name',50)->nullable();
            $table->string('book_author',10)->nullable();
            $table->string('book_publisher',50)->nullable();
            $table->integer('book_price');
            $table->string('book_url',200);
            $table->string('comment',200);
            $table->string('publishing_settings',255)->nullable();
            $table->date('post_date')->nullable();
            $table->time('post_time')->nullable();
            $table->integer('contributor_id')->nullable();
            $table->string('classification',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommended_books2');
    }
};

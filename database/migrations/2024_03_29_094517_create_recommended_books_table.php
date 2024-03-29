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
        Schema::create('recommended_books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name',50);
            $table->string('book_author',10);
            $table->string('book_publisher',50);
            $table->integer('book_price')->nullable();
            $table->string('book_url',200)->nullable();
            $table->string('comment',200)->nullable();
            $table->string('publishing_settings',255);
            $table->date('post_date');
            $table->time('post_time');
            $table->integer('contributor_id');
            $table->string('classification',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommended_books');
    }
};

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText(column: 'body')->nullable();
            $table->foreignId(column: 'user_id')->constrained(table: 'users');
            $table->foreignId(column: 'group_id')->nullable()->constrained(table: 'groups');
            $table->foreignId(column: 'deleted_by')->nullable()->constrained(table: 'users');
            $table->timestamp(column: 'deleted_at')->nullable();
            $table->string(column: 'created_by', length:255)->constrained(table: 'users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

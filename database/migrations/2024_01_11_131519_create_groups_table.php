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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string( column: 'name', length: 255);
            $table->string( column: 'cover_path', length: 1024)->nullable();
            $table->string( column: 'thumbnail_path', length: 1024)->nullable();
            $table->string(column:'slug', length: 255);
            $table->boolean(column:'auto_approval')->default(value:true);
            $table->string(column:'about')->nullable();
            $table->forignId(column: 'user_id')->constrained(table: 'user');
            $table->forignId(column: 'deleted_by')->nullable()->constrained(table: 'user');
            $table->timestamp(column: 'deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};

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
        Schema::create('bladeinfos', function (Blueprint $table) {
            $table->bigIncrements('blades_id');
            $table->string('page_name')->nullable();
            $table->string('page_unique_name')->unique();
            $table->string('slug',50)->nullable();
            $table->string('creator',50)->nullable();
            $table->string('editor',50)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('bladeinfos', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};

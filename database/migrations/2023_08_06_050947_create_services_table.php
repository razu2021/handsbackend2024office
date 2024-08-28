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
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('Service_id');
            $table->string('user_id',20)->nullable();
            $table->string('service_title')->nullable();
            $table->string('service_subtitle',50)->nullable();
            $table->text('service_info')->nullable();
            $table->string('service_image',50)->nullable();
            $table->text('button')->nullable();
            $table->text('button_url')->nullable();
            $table->string('slug',50)->nullable();
            $table->integer('status')->default(1);
            $table->integer('post_status')->default(2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('services', function (Blueprint $table)  {
            //
            $table->dropSoftDeletes();
        });
    }
};

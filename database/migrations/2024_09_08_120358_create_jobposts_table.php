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
        Schema::create('jobposts', function (Blueprint $table) {
            $table->bigIncrements('jobpost_id');
            $table->string('name',255)->nullable();
            $table->string('title',255)->nullable();
            $table->string('location',255)->nullable();
            $table->string('type',255)->nullable();
            $table->string('salary',255)->nullable();
            $table->string('app_instruction',255)->nullable();
            $table->string('app_mail',255)->nullable();
            $table->string('app_deadline',255)->nullable();
            $table->string('note',255)->nullable();
            $table->text('caption')->nullable();
            $table->text('service_image')->nullable();
            $table->string('slug',50)->nullable();
            $table->string('creator',50)->nullable();
            $table->string('editor',50)->nullable();
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
        Schema::create('jobposts', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};

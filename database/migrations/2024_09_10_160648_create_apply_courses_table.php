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
        Schema::create('apply_courses', function (Blueprint $table) {
            $table->bigIncrements('apply_course_id');
            $table->string('name',255)->nullable();
            $table->string('occupation',255)->nullable();
            $table->string('email',55)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('age',50)->nullable();
            $table->string('gender',50)->nullable();
            $table->string('education',255)->nullable();
            $table->string('address',255)->nullable();
            $table->text('caption')->nullable();
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
        Schema::create('apply_courses', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};

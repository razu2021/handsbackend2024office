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
        Schema::create('member_donners', function (Blueprint $table) {
            $table->bigIncrements('member_donner_id');
            $table->string('or_name',255)->nullable();
            $table->string('name',255)->nullable();
            $table->string('email',55)->nullable();
            $table->string('phone',50)->nullable();
            $table->integer('amount')->nullable();
            $table->text('purpose')->nullable();
            $table->text('address')->nullable();
            $table->text('caption')->nullable();
            $table->string('or_logo',50)->nullable();
            $table->string('service_image',50)->nullable();
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
        Schema::create('member_donners', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};

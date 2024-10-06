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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('branch_name',255)->nullable();
            $table->string('name',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('nid',255)->nullable();
            $table->string('address',255)->nullable();
            $table->text('caption')->nullable();
            $table->string('service_image')->nullable();
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
        Schema::create('allstaffs', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};

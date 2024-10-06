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
        Schema::create('applyloans', function (Blueprint $table) {
            $table->bigIncrements('applyloan_id');
            $table->string('fname',50)->nullable();
            $table->string('lname',50)->nullable();
            $table->string('name',100)->nullable();
            $table->string('email',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('nid',255)->nullable();
            $table->string('birth_date',255)->nullable();
            $table->string('occupation',50)->nullable();
            $table->integer('monthly_income')->nullable();
            $table->integer('target_amount')->nullable();
            $table->string('loan_category',255)->nullable();
            $table->string('branch_name',255)->nullable();
            $table->text('address')->nullable();
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
        Schema::create('applyloans', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};

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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->bigIncrements('subcategory_id');
            $table->string('subcategory_title',255)->nullable();
            $table->string('subcategory_name',50)->nullable();
            $table->text('subcategory_url')->unique();
            $table->integer('category_menu_id');
            $table->string('slug',50)->nullable();
            $table->string('creator',50)->nullable();
            $table->string('editor',50)->nullable();
            $table->integer('status')->default(1);
            $table->integer('post_status')->default(2);
            $table->integer('order_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('subcategories', function (Blueprint $table)  {
            //
            $table->dropSoftDeletes();
        });
    }
};

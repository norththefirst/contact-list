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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('owner');
            $table->timestamps();
            $table->softDeletes();
        });

        /**
         * If contact table encryption is needed,
         * comment out the Schema above and uncomment
         * this one.
         * 
         * Schema::create('contact', function (Blueprint $table) {
         *      $table->id();
         *      $table->longtext('name');
         *      $table->longtext('contact');
         *      $table->longtext('email')->unique();
         *      $table->longtext('owner');
         *      $table->timestamps();
         *      $table->softDeletes();
         * });
         *
         **/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};

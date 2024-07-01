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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->json('position_array'); 
            $table->text('description')->nullable();
            $table->date('experience_year')->nullable();
            $table->integer('completed_projects')->nullable();
            $table->text('about_description')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('messenger_link')->nullable();
            $table->string('cv_pdf')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable(); 
            $table->string('github_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

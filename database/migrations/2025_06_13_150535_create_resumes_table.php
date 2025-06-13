<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();

            // Foreign key to candidates
            $table->unsignedBigInteger('candidate_id')->index();

            // Personal Info
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('profile_picture')->nullable();            
            $table->string('profile_title')->nullable();
            $table->text('about')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Social Links
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('twitter')->nullable();

            $table->string('website')->nullable();
            // Experience Type (fresher / experienced)
            $table->string('experience_type')->nullable();

            // Structured JSON fields
            $table->longText('education')->nullable();  // JSON: [ {from, to, location, reward, information} ]
            $table->longText('experience')->nullable(); // JSON: [ {from, to, location, position, information} ]
            $table->longText('skills')->nullable();     // JSON: [ {name, level} ]
            $table->longText('projects')->nullable();   // JSON: [ {title, description} ]
            $table->longText('languages')->nullable();  // JSON: [ {language} ]
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();


            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}

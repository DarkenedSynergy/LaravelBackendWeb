<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relatie met categorie
            $table->string('question');
            $table->text('answer');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('faqs');
    }

};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermEngChasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_eng_chas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('term_context_id')->nullable();
            $table->bigInteger('term_no')->nullable();
            $table->text('eterms')->nullable();
            $table->text('cterms')->nullable();
            $table->text('enote')->nullable();
            $table->text('cnote')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_eng_chas');
    }
}

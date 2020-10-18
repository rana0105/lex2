<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTermEngChisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_term_eng_chis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('context_id')->nullable();
            $table->bigInteger('term_no')->nullable();
            $table->text('eterms')->nullable();
            $table->text('cterms')->nullable();
            $table->text('enote')->nullable();
            $table->text('cnote')->nullable();
            $table->text('enotet')->nullable();
            $table->text('cnotet')->nullable();
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
        Schema::dropIfExists('add_term_eng_chis');
    }
}

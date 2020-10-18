<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermContextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_contexts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('context_id')->nullable();
            $table->bigInteger('context_no')->nullable();
            $table->text('esource')->nullable();
            $table->text('csource')->nullable();
            $table->text('eterms')->nullable();
            $table->text('cterms')->nullable();
            $table->text('eparagraph')->nullable();
            $table->text('cparagraph')->nullable();
            $table->bigInteger('order')->nullable();
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
        Schema::dropIfExists('term_contexts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contexts', function (Blueprint $table) {
            $table->id();
            $table->string('esource')->nullable();
            $table->string('etitle')->nullable();
            $table->string('enote')->nullable();
            $table->string('eterms')->nullable();
            $table->string('csource')->nullable();
            $table->string('ctitle')->nullable();
            $table->string('cnote')->nullable();
            $table->string('cterms')->nullable();
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
        Schema::dropIfExists('contexts');
    }
}

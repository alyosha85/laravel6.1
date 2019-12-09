<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->unsignedBigInteger('contact_reason_id')->index();
            $table->unsignedBigInteger('company_id')->index();
            $table->unsignedBigInteger('contact_id')->index();
            $table->string('participant')->nullable();
            $table->text('memo')->nullable();
            $table->timestamps();
            $table->foreign('contact_reason_id')->references('id')->on('contact_reasons');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communications');
    }
}

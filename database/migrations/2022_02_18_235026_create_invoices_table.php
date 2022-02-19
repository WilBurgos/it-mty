<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_client')->unsigned()->nullable();
            // $table->foreign('id_client')->references('id')->on('clients');
            $table->integer('id_company')->unsigned()->nullable();
            // $table->foreign('id_company')->references('id')->on('companies');
            $table->integer('invoice_no');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->text('notes');
            $table->integer('total');
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
        Schema::dropIfExists('invoices');
    }
}

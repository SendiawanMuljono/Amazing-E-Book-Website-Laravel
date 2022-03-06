<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('order_id')->autoIncrement();
            $table->integer('account_id');
            $table->foreign('account_id')->references('account_id')->on('accounts');
            $table->integer('ebook_id');
            $table->foreign('ebook_id')->references('ebook_id')->on('ebooks');
            $table->date('order_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

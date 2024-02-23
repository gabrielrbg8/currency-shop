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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('from_currency');
            $table->string('to_currency');
            $table->decimal('amount', 10, 2); // Valor da transação
            $table->decimal('exchange_rate', 10, 4); // Taxa de câmbio aplicada
            $table->decimal('service_fee', 10, 2); // Taxa de serviço aplicada
            $table->decimal('total_amount', 10, 2); // Valor total da transação
        
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

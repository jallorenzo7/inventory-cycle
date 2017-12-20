<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('contact')->nullable();
            $table->longText('address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('user_type')->nullable();
            $table->boolean('is_active')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('model_no')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('frame_no')->nullable();
            $table->string('part_no')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->default('dummy.jpg');
            $table->string('quantity')->nullable();
            $table->string('initial_quantity')->nullable();
            $table->string('remarks')->nullable();
            $table->string('price')->nullable();
            $table->string('initial_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('stock_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('stock_id')->nullable();
            $table->string('amount_received')->nullable();
            $table->string('total')->nullable();
            $table->string('date_transaction')->nullable();
            $table->timestamps();
        });

        Schema::create('order_transaction', function (Blueprint $table) {
            $table->integer('transaction_id')->unsigned();
            $table->integer('order_id')->unsigned();

            $table->foreign('transaction_id')->references('id')->on('transactions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['transaction_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('order_transaction');
    }
}

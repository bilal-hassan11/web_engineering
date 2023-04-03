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
        Schema::create('dc_detail', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('gp_no');
            $table->integer('account_id');
            $table->string('sub_dealar_name', 250);
            $table->integer('item_id');
            $table->integer('no_of_bags')->nullable();
            $table->integer('fare')->nullable();
            $table->text('address')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('dc_detail');
    }
};

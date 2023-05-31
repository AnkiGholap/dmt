<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesdatas', function (Blueprint $table) {
            $table->id();
            $table->double('t2_month_online');
            $table->double('t2_month_offline_select');
            $table->double('t2_month_offline_mass');
            $table->double('t1_month_online');
            $table->double('t1_month_offline_select');
            $table->double('t1_month_offline_mass');
            $table->double('t_month_online');
            $table->double('t_month_offline_select');
            $table->double('t_month_offline_mass');
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
        Schema::dropIfExists('salesdatas');
    }
}

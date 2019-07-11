<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinetInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('cabinet_interfaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer');
            $table->string('short_code');
            $table->integer('vlan');
            $table->string('interface');
            $table->string('subnet');
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
        Schema::dropIfExists('cabinet_interfaces');
    }
}

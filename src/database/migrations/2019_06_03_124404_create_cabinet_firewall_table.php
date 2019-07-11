<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinetFirewallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinet_firewall', function (Blueprint $table) {
            $table->increments('id');
            $table->string('source_interface');
            $table->string('source_ip');
            $table->string('source_name');
            $table->string('destination_interface');
            $table->string('destination_address');
            $table->string('service_port');
            $table->string('service_name');
            $table->string('source_nat_type');
            $table->string('translated_source_address');
            $table->string('translated_destination_address');
            $table->string('translated_service_port');
            $table->string('translated_service_name');
            $table->string('description');
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
        Schema::dropIfExists('cabinet_firewall');
    }
}

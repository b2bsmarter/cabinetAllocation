<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinetVpnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinet_vpn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer');
            $table->string('site');
            $table->string('datacentre_firewall');
            $table->string('remote_site_ip');
            $table->string('remote_site_router');
            $table->string('local_ip');
            $table->string('remote_site_ip_netmask');
            $table->string('preshared_key');
            $table->string('asa_group_policy');
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
        Schema::dropIfExists('cabinet_vpn');
    }
}

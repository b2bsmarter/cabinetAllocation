<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinet3cxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinet_3cx', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer');
            $table->string('server_name');
            $table->string('ip_address');
            $table->string('hdd');
            $table->string('call_recording');
            $table->string('fqdn');
            $table->string('management_port');
            $table->string('licence_key_type');
            $table->string('licence_key');
            $table->string('email_address');
            $table->string('customer_portal_username');
            $table->string('customer_portal_password');
            $table->string('root_username');
            $table->string('root_password');
            $table->string('threecx_login');
            $table->string('sip_provider');
            $table->string('address');
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
        Schema::dropIfExists('cabinet_3cx');
    }
}

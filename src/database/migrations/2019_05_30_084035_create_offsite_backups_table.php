<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffsiteBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offsite_backups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('customer');
            $table->string('username')->nullable();
            $table->string('ashay_backup_type')->nullable();
            $table->string('password')->nullable();
            $table->string('master_key_encryption')->nullable();
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
        Schema::dropIfExists('offsite_backups');
    }
}

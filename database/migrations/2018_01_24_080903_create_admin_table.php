<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('iAdminId');
            $table->enum('eRole', ['Superadmin', 'Subadmin']);
            $table->string('vFirstName');
            $table->string('vLastName');
            $table->string('vEmail');
            $table->string('vPassword');
            $table->string('vPhoto');
            $table->string('vOTP');
            $table->integer('iLastLoginId');
            $table->enum('eStatus', ['Active', 'Inactive', 'Deleted']);
            $table->date('dAddedDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}

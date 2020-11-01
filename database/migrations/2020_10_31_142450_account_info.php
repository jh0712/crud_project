<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //帳號 varchar
        //姓名 varchar
        //性別 varchar
        //生日 date
        //信箱 varchar
        //備註 text
        Schema::create('account_info', function (Blueprint $table) {
            $table->id();
            $table->string('account');
            $table->string('name');
            $table->string('gender');
            $table->date('birthday');
            $table->string('email');
            $table->text('remark');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('account_info');
    }
}

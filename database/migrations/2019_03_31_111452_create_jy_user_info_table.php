<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jy_user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0)->comment('用户id');
            $table->string('email',60)->default('')->comment('邮箱');
            $table->enum('sex',[1,2,3])->default(1)->comment('行别：1.男 2.女 3.保密');
            $table->string('link_name',60)->default('')->comment('紧急联系人');
            $table->char('link_phone',11)->comment('紧急联系人号码');
            $table->char('invite_code',6)->comment('用户的邀请码');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jy_user_info');
    }
}

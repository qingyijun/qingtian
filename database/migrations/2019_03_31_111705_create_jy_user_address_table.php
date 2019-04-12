<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jy_user_address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address_name',30)->default('')->comment('名称');
             $table->integer('user_id')->default(0)->comment('用户id');
             $table->string('consignee',30)->default('')->comment('收货人姓名');
             $table->smallInteger('country')->default(0)->comment('国家');
             $table->smallInteger('province')->default(0)->comment('省份');
             $table->smallInteger('city')->default(0)->comment('城市');
             $table->smallInteger('district')->default(0)->comment('地区');
             $table->string('address',120)->default('')->comment('详细地址');
             $table->string('zipcode',20)->default('')->comment('邮编');
             $table->char('mobile',11)->default('')->comment('手机号');
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
        Schema::dropIfExists('jy_user_address');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     * 订单表
     * @return void
     */
    public function up()
    {
        Schema::create('jy_order_goods', function (Blueprint $table) {
            $table->increments('id')->comment('订单表');
            $table->char('order-sn',20)->default('')->comment('订单号');
            $table->integer('user_id')->default(0)->comment('用户id');
            $table->tingInteger('order_status')->default(0)->comment('订单状态 1未确认 2已确认 4取消 4取货');
            $table->tingInteger('sippingg_status')->default(0)->comment('发货状态 1代发货 2已发货 3已收货 4退货');
            $table->tingInteger('pay_status')->default(0)->comment('支付状态 1未支付 2支付中 3支付成功');
            $table->string('consignee',60)->default('')->comment('收货人的姓名,用户页面填写,默认取值表user_address');
            $table->smallInteger('country')->default(0)->comment('收货人国家');
            $table->smallInteger('province')->default(0)->comment('收货人省份');
            $table->smallInteger('city')->default(0)->comment('收货人城市');
            $table->smallInteger('district')->default(0)->comment('收货人地区');
            $table->string('shipping_name',20)->default('')->comment('配送方式');
            $table->stringg('pay_name',20)->default('')->comment('支付方式');
            $table->decimal('goods_price',10,2)->default(0.00)->comment('商品总价格');
            $table->decimal('shipping_fee',10,2)->default(0.00)->comment('配送费用');
            $table->decimal('pay_price',10,2)->default(0.00)->comment('支付总金额');
            $table->decimal('paid_price',10,2)->default(0.00)->comment('已支付的金额');
            $table->decimal('bonus_price',10,2)->default(0.00)->comment('红包余额');
            $table->string('note',100)->default('')->comment('订单备注');
            $table->datetime('confirm_time')->comment('订单确认时间');
            $table->datetime('pay_time')->comment('订单支付时间');
            $table->timestamps();
            $table->unique('order_sn');
            $table->index('user_id');
            $table->index('order_status');
            $table->index('shipping_status');
            $table->index('pay_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jy_order_goods');
    }
}

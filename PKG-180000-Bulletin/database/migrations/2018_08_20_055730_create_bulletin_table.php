<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateBulletinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p17_bulletin', function (Blueprint $table) {
            $table->increments('p17_bin_id');
            $table->date('p17_bin_publish_date')->comment('建立時間');
            $table->string('p17_bin_title')->comment('公告標題');
            $table->string('p17_bin_content')->comment('公告內容');
            $table->string('p17_bin_memo')->comment('備註')->nullable();

            $table->foreign('p17_bin_p5_ant_id','fk_p17_bin_p5_ant_id')->references('p5_ant_id')->on('p5_account')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::statement("ALTER TABLE `p17_bulletin` comment '公佈欄'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');//關閉forein key 檢查
        Schema::drop('p17_bulletin');//刪除p17_bulletin table
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');//開啟forein key 檢查
    }
}

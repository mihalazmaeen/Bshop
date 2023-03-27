<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->string('phone');
            $table->string('brand');
            $table->string('category');
            $table->string('product');
            $table->string('slider');
            $table->string('coupons');
            $table->string('blog');
            $table->string('shipping');
            $table->string('setting');
            $table->string('returnorder');
            $table->string('review');
            $table->string('orders');
            $table->string('stock');
            $table->string('reports');
            $table->string('alluser');
            $table->string('adminuserrole');
            $table->integer('type');
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
        Schema::dropIfExists('admins');
    }
}
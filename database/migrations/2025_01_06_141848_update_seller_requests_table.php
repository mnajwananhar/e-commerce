<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('seller_requests', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('phone');
            $table->text('address');
            $table->string('store_name');
            $table->string('nik');
            $table->string('ktp_photo');
            $table->string('selfie_photo');
            $table->string('bank_name');
            $table->string('bank_account');
            $table->string('bank_account_name');
        });
    }

    public function down()
    {
        Schema::table('seller_requests', function (Blueprint $table) {
            $table->dropColumn(['full_name', 'phone', 'address', 'store_name', 'nik', 'ktp_photo', 'selfie_photo', 'bank_name', 'bank_account', 'bank_account_name']);
        });
    }
};

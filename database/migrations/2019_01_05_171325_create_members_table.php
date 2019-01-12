<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_name');
            $table->string('member_nic');
            $table->string('member_address')->default('');
            $table->string('member_gender')->default('');
            $table->string('member_dob')->default('');
            $table->string('member_contact_1');
            $table->string('member_contact_2')->default('');
            $table->string('password');
            $table->string('image');
            $table->string('member_bank_name')->default('');
            $table->string('member_bank_branch')->default('');
            $table->string('member_account_no',255)->default('');
            $table->string('member_benifit_name')->default('');
            $table->string('member_benifit_address', 255)->default('');
            $table->string('member_benifit_nic')->default('');
            $table->string('member_status')->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('members');
    }

}

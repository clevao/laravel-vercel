<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_sents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->string('recipient_phone_number');
            $table->string('type');
            $table->string('message')
                ->nullable()
                ->comment('It is the message when the type is text. It is the template name when the type is template');
            $table->string('user')
                ->nullable();
            $table->timestamps();
            
            $table->foreign('account_id')->references('id')->on('whatsapp_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_sents');
    }
};

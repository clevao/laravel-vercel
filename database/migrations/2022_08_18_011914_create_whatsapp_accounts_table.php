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
        Schema::create('whatsapp_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number_id')
                ->unique()
                ->comment('Identifier provided by the Meta');
            $table->string('phone_number')
                ->unique()
                ->comment('Phone Number (e.q. 15999998899)');
            $table->string('client_id')
                ->comment('Client identifier that is used in the system URL');
            $table->text('automatic_response')
                ->nullable()
                ->comment('Message that will be sent to the whatsapp user when the api receives any message from the client');
            $table->string('client_phone_number')
                ->nullable()
                ->comment('Phone number to contact the client when needed');
            $table->text('whatsapp_token')
                    ->nullable()
                    ->comment('Identifier provided by the Meta to use when calling its APIs');
            $table->string('user')->nullable();
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
        Schema::dropIfExists('whatsapp_accounts');
    }
};

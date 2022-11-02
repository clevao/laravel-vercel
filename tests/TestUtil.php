<?php

namespace Tests;

use Illuminate\Foundation\Testing\WithFaker;

abstract class TestUtil
{
    use WithFaker;

    public function __construct()
    {
        $this->setUpFaker();
    }

    public static function createWhatsappAccount() {

        $account =  \App\Models\WhatsappAccount::factory()->create();
        return $account;
    }

    public static function getWhatsasspMessageBody(){
        $json = '{
            "type": "text",
            "sender": {
                "client_id": "client_id",
                "phone_number": "999999999"
            },
            "text": {
                "body": "Ola {{nome}}. Gostariamos de informar que o boleto referente a {{motivo_boleto}} ja esta disponivel para pagamento"
            },
            "recipients": [
                {
                    "ddi": "55",
                    "ddd": "15",
                    "phone_number": "999998888",
                    "variables": [
                        {
                            "variable": "nome",
                            "value": "Joao"
                        },
                        {
                            "variable": "motivo_boleto",
                            "value": "Mensalidade"
                        }
                    ]
                },
                {
                    "ddi": "55",
                    "ddd": "15",
                    "phone_number": "999997777",
                    "variables": [
                        {
                            "variable": "nome",
                            "value": "Maria"
                        },
                        {
                            "variable": "motivo_boleto",
                            "value": "Mensalidade, Judô"
                        }
                    ]
                }
            ]
        }';

        return json_decode($json, true);
    }

    public static function getWhatsasspTemplateBody(){
        $json = '{
            "type": "template",
            "sender": {
                "client_id": "client_id",
                "phone_number": "999999999"
            },
            "template": {
                "name": "teste_solicitacao"
            },
            "recipients": [
                {
                    "ddi": "55",
                    "ddd": "15",
                    "phone_number": "991250730",
                    "parameters": [
                        {
                            "type": "text",
                            "text": "*Mr. Holmes*"
                        },
                        {
                            "type": "text",
                            "text": "*Atestado de Matrícula*"
                        }
                    ]
                },
                {
                    "ddi": "55",
                    "ddd": "15",
                    "phone_number": "991250730",
                    "parameters": [
                        {
                            "type": "text",
                            "text": "*Mr. Jones*"
                        },
                        {
                            "type": "text",
                            "text": "*Atestado de Matrícula*"
                        }
                    ]
                }
            ]
        }';

        return json_decode($json, true);
    }
}

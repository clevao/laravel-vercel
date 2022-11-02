<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestUtil;
use App\Models\Solicitacao;

class SolicitationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $solicitationService;

    public function setUp(): void {

        parent::setUp();

        $this->solicitationService = $this->app->make('App\Service\SolicitationService');
    }
   
    /**
     * @test
     */
    public function givenAnArray_WhenCreatingTheWhere_ThenShouldReturnTheWhereRaw() {
        $expected = "(REPLACE(REPLACE(REPLACE(REPLACE(rf.telefone, '-', ''), ' ', ''), ')', ''), '(', '') = ? OR REPLACE(REPLACE(REPLACE(REPLACE(rf.telefone_celular, '-', ''), ' ', ''), ')', ''), '(', '') = ? OR REPLACE(REPLACE(REPLACE(REPLACE(rf.telefone_whatsapp, '-', ''), ' ', ''), ')', ''), '(', '') = ? OR REPLACE(REPLACE(REPLACE(REPLACE(rf.telefone_comercial, '-', ''), ' ', ''), ')', ''), '(', '') = ? OR REPLACE(REPLACE(REPLACE(REPLACE(rm.telefone, '-', ''), ' ', ''), ')', ''), '(', '') = ? OR REPLACE(REPLACE(REPLACE(REPLACE(rm.telefone_celular, '-', ''), ' ', ''), ')', ''), '(', '') = ? OR REPLACE(REPLACE(REPLACE(REPLACE(rm.telefone_whatsapp, '-', ''), ' ', ''), ')', ''), '(', '') = ? OR REPLACE(REPLACE(REPLACE(REPLACE(rm.telefone_comercial, '-', ''), ' ', ''), ')', ''), '(', '') = ?) ";
        $this->assertEquals($expected, $this->solicitationService->createRespQuery(array('rf', 'rm')));
    } 
    
}
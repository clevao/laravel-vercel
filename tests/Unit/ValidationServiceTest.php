<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestUtil;

class ValidationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $validationService;

    public function setUp(): void {

        parent::setUp();

        $this->validationService = $this->app->make('App\Service\ValidationService');
    }
   
    /**
     * @test
     */
    public function givenAValidFullPhoneNumber_WhenGettingThePhoneNumber_ThenShouldReturnThePhoneNumber() {
        
        $this->assertEquals('15991250730', $this->validationService->getPhoneNumber('5515991250730'));

    }    
   
    /**
     * @test
     */
    public function givenAValidSimplePhoneNumber_WhenGettingThePhoneNumber_ThenShouldReturnThePhoneNumber() {
        
        $this->assertEquals('15991250730', $this->validationService->getPhoneNumber('15991250730'));

    }    
   
    /**
     * @test
     */
    public function givenAValidSimplePhoneNumberWithNonNumericDigits_WhenGettingThePhoneNumber_ThenShouldReturnThePhoneNumber() {
        
        $this->assertEquals('15991250730', $this->validationService->getPhoneNumber('15 99125-0730'));

    }

    
}

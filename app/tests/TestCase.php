<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__.'/../../bootstrap/start.php';
    }

    protected $td_data = array();

    protected $td_headers = array();

    private function prepareForTests()
    {
        Artisan::call('migrate');
        Route::enableFilters();
        Eloquent::unguard();
        $this->seed('DatabaseSeeder');
        Mail::pretend(true);

        /*
        $user = User::first();

        $access_keys = Config::get('app.access_keys');

        $headers = array(
            'HTTP_ENTEL-ACCESS-KEY' => $access_keys['ios'],
            'HTTP_ENTEL-API-KEY' => $user->api_key
        );

        $this->setRequestHeaders($headers);
        $this->origin = array(
            'lat' => 10.8053905,
            'lng' => -69.8457396
        );
        $this->dest = array(
            'lat' => 10.2020,
            'lng' => -69.2468
        );
        */
    }

    public function setUp()
    {
        parent::setUp();
        $this->prepareForTests();
    }

    public function setRequestHeaders($headers)
    {
        $this->td_headers = $headers;
    }

    public function setRequestData($data)
    {
        $this->td_data = $data;
    }

    public function request($method, $uri)
    {
        return $this->call($method, $uri, $this->td_data, array(), $this->td_headers);
    }

}

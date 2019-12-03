<?php

namespace Bluelupin\Custom\Http\Controllers;

use Bluelupin\Custom\Http\Controllers\Controller;
use Bluelupin\Custom\Repositories\CustomRepository;

/**
 * Custom controller
 */
class AddressController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Custom object
     *
     * @var object
    */
    protected $customRepository;

    /**
     * Create a new controller instance.
     *
     * @param  Bluelupin\Custom\Repositories\CustomerRepository $customRepository
     * @return void
     */
    public function __construct(
        CustomRepository $customRepository
    )
    {
        $this->customRepository = $customRepository;

        $this->_config = request('_config');
    }

    /**
     * Method to populate the seller order page which will be populated.
     *
     * @return Mixed
     */
    public function index()
    {
        return [
            'hello'
        ];
    }
}
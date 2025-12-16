<?php

namespace Modules\TripBooking\src\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepositoryInterface
 *
 * @package Modules\TripBooking\src\Repositories
 */
interface RepositoryInterface
{
    /**
     * Get all object
     * @return mixed
     */
    public function all();

    /**
     * Get a number of object
     * @return mixed
     */
    public function get($count);

    /**
     * Get an object
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Get an object
     * @param $id
     * @return mixed
     */
    public function findBy($attribute, $value);
    
    /**
     * Create an object
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update an object
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($request);

    /**
     * Delete an object
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
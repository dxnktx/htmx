<?php

namespace Modules\TripBooking\src\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 *
 * @package Modules\TripBooking\src\Repositories
 */
class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all object
     * @return mixed
     */
    public function all()
    {
        return $this->model->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Get a number of object
     * @return mixed
     */
    public function get($count)
    {
        return $this->model->take($count)->get();
    }

    /**
     * Get a number of object
     * @return mixed
     */
    public function getByCategory($category, $count)
    {
        return $this->model->where('type', $category)->take($count)->get();
    }

    /**
     * Get an object
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->where('id', $id)->firstOrNew();
    }

    /**
     * Get an object
     * @param $id
     * @return mixed
     */
    public function findBy($attribute, $value)
    {
        return $this->model->where($attribute, $value)->firstOrNew();
    }

    /**
     * Create an object
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an object
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update($request)
    {
        return $this->model->find($request->id)->update($request->all());
    }
    
    /**
     * Delete an object
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        //return $this->model->destroy($id); // xóa tất cả bản ghi có id này trả về số lượng bản ghi đã xóa
        return $this->model->find($id)->delete(); // xóa 1 bản ghi có id này trả về true false
    }

}
<?php

namespace App\Services;

use Exception;
use InvalidArgumentException;
use App\Services\IBaseService;
use App\Repository\IBaseRepository;
use Illuminate\Support\Facades\Log;

class BaseService implements IBaseService
{
    /**
     * @var $Repository
     */
    private $repository;
    /**
     * PostService constructor.
     *
     * @param IRepository $repository
     */
    public function __construct(IBaseRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Get all.
     *
     * @return String
     */
    public function getall()
    {
        return $this->repository->getall();
    }
    /**
     * Get by id.
     *
     * @param $id
     * @return String
     */
    public function getbyid($id)
    {
        return $this->repository->getbyid($id);
    }
    /**
     * Validate post data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function store(array $attributes)
    {
        // try {
        $model = $this->repository->create($attributes);
        // } catch (Exception $e) {
        //     Log::info($e->getMessage());
        //     throw new InvalidArgumentException('Unable to create model data');
        // }
        return $model;
    }
    /**
     * Get some colums.
     * Get colums to set language
     *
     * @return String
     */
    public function getbycolums()
    {
        return $this->repository->getbycolums();
    }
    /**
     * Update data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update($id, array $attributes)
    {
        try {
            $model = $this->repository->update($id, $attributes);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to update model data');
        }
        return $model;
    }
    /**
     * Delete by id.
     *
     * @param $id
     * @return String
     */
    public function destroy($id)
    {
        try {
            $model =  $this->repository->delete($id);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to delete model data');
        }
        return $model;
    }
}

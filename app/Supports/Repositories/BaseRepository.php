<?php

namespace App\Supports\Repositories;

use App\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;


    abstract public function model();

    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        return app(static::class);
    }

    public function makeModel()
    {
        $model = app($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }
}

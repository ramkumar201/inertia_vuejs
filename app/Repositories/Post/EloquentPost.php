<?php

namespace App\Repositories\Post;

use App\Repositories\Post\PostRepositories;
use App\Models\Post;

class EloquentPost implements PostRepositories
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }
    public function getall()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findorFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->model->findOrFail($id)->update($attributes);
    }

    public function delete($id)
    {
        $this->getById($id)->delete();
        return true;
    }


}

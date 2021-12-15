<?php

namespace App\Repositories\Post;

interface PostRepositories
{
    public function getall();


    public function getById($id);


    public function create(array $attributes);


    public function update($id, array $attributes);


    public function delete($id);

}


<?php namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class UsersRepository extends Repository {

  public function model()
  {
    return 'App\User';
  }

}

<?php namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class AccountsRepository extends Repository {

  public function model()
  {
    return 'App\Account';
  }

}

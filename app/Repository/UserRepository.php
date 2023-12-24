<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\BaseRepository;

class UserRepository extends BaseRepository
{
    protected $perPage = 4;
    protected $fieldsUser = ['first_name', 'last_name', 'email', 'role'];

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function searchUsers($searchQuery)
    {
        return $this->model
            ->where(function ($query) use ($searchQuery) {
                $query->where('first_name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('last_name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('email', 'like', '%' . $searchQuery . '%')
                    ->orWhere('role', 'like', '%' . $searchQuery . '%');
            })
            ->paginate($this->perPage);
    }

    public function getAllUsers()
    {
        return $this->model->paginate($this->perPage);
    }

    public function createUser(array $data)
    {
        return $this->create($data);
    }

    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function updateUser($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }

    public function getFieldData(): array
    {
        return $this->fieldsUser;
    }
}

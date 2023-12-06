<?php 

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $data)
    {
        $model = $this->model->find($id);

        if ($model) {
            $model->update($data);
            return $model;
        }

        return null;
    }

    public function delete($id)
    {
        $model = $this->model->find($id);

        if ($model) {
            $model->delete();
            return true;
        }

        return false;
    }

    public function all()
    {
        return $this->model->all();
    }
}

?>
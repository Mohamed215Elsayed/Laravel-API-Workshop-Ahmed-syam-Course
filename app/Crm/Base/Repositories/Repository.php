<?php

namespace App\Crm\Base\Repositories;
use Illuminate\Database\Eloquent\Model;//general for model
//may be class AbstractRepository can not override

// class Repository u can override any fn
class Repository implements RepositoryInterface
{
    protected Model $model;
    /*===========setModel========*/
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }
    /*===========getModel========*/
        public function getModel(): Model
    {
        return $this->model;
    }
    /*==========all=========*/
    public function all()
    {
        return $this->model->all();
    }
    /*=========find model data by an id==========*/
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }
    /*==========create model data=========*/
    //  public function create(Model $model): ?Model
    public function create(array $data): ?Model
    {   
        foreach ($data as $field => $val) {
            $this->model->{$field} = $val;
        }
        $this->model->save();
    return $this->model;
    }
    /*==========update model data=========*/
     //  public function update(Model $model): ?Model
    public function update(array $data): ?Model
    {
        $model = $this->model->find($data['id'] ?? 0);//if not exist ===0
        if(!$model){
            return null;
        }
        foreach ($data as $field => $val) {
            $this->model->{$field} = $val;
        }
        $this->model->save();
        return $this->model;
    }
    /*==========delete model by id=========*/
    public function delete($id): bool
    {
        $this->model = $this->model->find($id);
        return $this->model->delete();
    }
    /*===================*/
}

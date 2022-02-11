<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\Admin\category\{CategoryRequest,CategoryUpdateRequest};

class CategoryController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\category");
        $this->crud->setRoute("admin/category");
        $this->crud->setEntityNameStrings('category', 'categories');
    }
    protected function setupListOperation()
    {
        $this->crud->setFromDb();

        $this->crud->setColumnDetails('client_id',[
            'label' => "Client", // Table column heading
            'type' => "relationship",
            'name' => 'client_id', // the column that contains the ID of that connected entity;
            'entity' => 'client', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => 'App\Models\client' // foreign key model
        ]);
    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CategoryRequest::class);
        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
        $this->crud->addField(['name' => 'value', 'type' => 'number', 'label' => 'Value']);

        $this->crud->addField([
            'name' => 'client_id',
            'type' => 'select',
            'label' => 'Client',
            'entity' => 'client',
            'model'     => "App\Models\client",
            'attribute' => 'name',
        ]);
    }
}

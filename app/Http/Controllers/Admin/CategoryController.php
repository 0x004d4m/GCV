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
    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CategoryRequest::class);
        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
        $this->crud->addField(['name' => 'value', 'type' => 'number', 'label' => 'Value']);
    }
}

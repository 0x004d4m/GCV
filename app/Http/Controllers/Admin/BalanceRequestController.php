<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\Admin\balanceRequest\{CreateBalanceRequest};

class BalanceRequestController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\balanceRequest");
        $this->crud->setRoute("admin/balanceRequest");
        $this->crud->setEntityNameStrings('balanceRequest', 'balanceRequests');
    }
    protected function setupListOperation()
    {
        $this->crud->setFromDb();
        $this->crud->setColumnDetails('image',[
            'label' => "Image", // Table column heading
            'type' => "image",
            'name' => 'image',
        ]);
        $this->crud->setColumnDetails('balance_status_id',[
            'label' => "Status",
            'type' => "select_from_array",
            'name' => 'balance_status_id',
            'options' => [1 => '<span class="badge badge-warning">Pending</span>', 2 => '<span class="badge badge-success">Approved</span>', 3 => '<span class="badge badge-danger">Rejected</span>'],
            'escaped'=> false
        ]);
        $this->crud->setColumnDetails('client_id',[
            'label' => "Client", // Table column heading
            'type' => "select",
            'name' => 'client_id', // the column that contains the ID of that connected entity;
            'entity' => 'client', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => 'App\Models\client' // foreign key model
        ]);

        $this->crud->addButtonFromView('line', 'approve', 'approve', 'beginning');
        $this->crud->addButtonFromView('line', 'reject', 'reject', 'beginning');
    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CreateBalanceRequest::class);
        $this->crud->addField(['name' => 'amount', 'type' => 'number', 'label' => 'Amount']);

        $this->crud->addField([
            'name' => 'client_id',
            'type' => 'select',
            'label' => 'Client',
            'entity' => 'client',
            'model'     => "App\Models\client",
            'attribute' => 'name',
        ]);

        $this->crud->addField([
            'name' => 'balance_status_id',
            'type' => 'select',
            'label' => 'Status',
            'entity' => 'balance_status',
            'model'     => "App\Models\balanceStatus",
            'attribute' => 'status',
        ]);
    }
    protected function reject($id)
    {
        try {
            \App\Models\BalanceRequest::find($id)->update(['balance_status_id'=>3]);
            return response()->json([], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([], 400);
        }
    }
    protected function approve($id)
    {
        try {
            \App\Models\BalanceRequest::find($id)->update(['balance_status_id'=>2]);
            return response()->json([], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([], 400);
        }
    }
}

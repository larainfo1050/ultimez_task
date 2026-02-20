<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();
        
        $search = $this->request->getGet('search');
        
        if (!empty($search)) {
            $customerModel->groupStart()
                          ->like('first_name', $search)
                          ->orLike('last_name', $search)
                          ->orLike('city', $search)
                          ->orLike('country', $search)
                          ->groupEnd();
        }
        
        $data['customers'] = $customerModel->paginate(10);
        $data['pager'] = $customerModel->pager;
        $data['search'] = $search;

        return view('customer_list', $data);
    }
}

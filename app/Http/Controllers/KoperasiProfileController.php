<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use Illuminate\Http\Request;


class KoperasiProfileController extends Controller
{
    //
   private $blogRepository;

    public function __construct (BlogRepository $blogRepository) 
    {
        $this->blogRepository= $blogRepository;
    }

    public function index() 
    {
        $getpost=$this->blogRepository->getPost();
        dd($getpost);
        // echo $response->getStatusCode();
    }

   

}

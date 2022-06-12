<?php

namespace App\Services;

class MyReferrerDetails
{

    public function details($investor)
    {  
        return $investor->ancestors()->reversed()->first();
    }
}

<?php

namespace Medbook\Service;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceRepo {

    public function all()
    {
        return response()->json([ 
            'data' =>  Service::latest()->get(), 
            'message' => 'All Services' 
        ], 200);
    }

    public function save(ServiceRequest $request)
    {
        $service = Service::create($request->all());

        return response()->json([ 
            'data' =>  $service, 
            'message' => 'Service Added Successfully' 
        ], 201);
    }

    public function update(ServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->update($request->all());

        return response()->json([ 
            'data' =>  $service, 
            'message' => 'Service Updated Successfully' 
        ], 201);
    }
}
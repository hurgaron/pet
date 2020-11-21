<?php

namespace App\Http\Controllers;


use App\Models\Pets;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;


class PetsController extends Controller
{
    public function index(){
        return Pets::all();
    }

    public function getLatLng()
    {
        //$estado = $this->estadoModel->find($id_estado);

        //$cidades = $estado->cidades()->getQuery()->get(['id_estado', 'nome']);
        $data=DB::select("
                        select 
                        name, longitude, latitude, city, hours
                        from pets                        
                        ");
        
        $jsonData =json_encode($data);
        $original_data = json_decode($jsonData, true);
        $features = array();
        foreach($original_data as $key => $value) {
            $features[] = array(
                'type' => 'Feature',
                'properties' => array(
                                'name' => $value['name'],
                                'city' => $value['city'],
                                'hours' => $value['hours']
            ),
                'geometry' => array(
                        'type' => 'Point', 
                        'coordinates' => array(
                            $value['longitude'],
                            $value['latitude']
                        ),
                    ),
            );
        }
        $new_data = array(
            'type' => 'FeatureCollection',
            'features' => $features,
        );
        
        $final_data = json_encode($new_data, JSON_PRETTY_PRINT);
        print_r($final_data);
                                                
        //return Response::json($dados);

    }
}

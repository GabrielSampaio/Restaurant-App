<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ApiControllerTrait
{

    /*
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function index(Request $request)
    {
      $data = $request->all();
      // var_dump($data);exit;
      $limit = isset($data['limit']) ? $data['limit'] : 20;
      $order = isset($data['order']) ? $data['order'] : null;
      if ($order !== null)
      {
        $order = explode (',', $order);
      }
      $order[0] = isset($order[0]) ? $order[0] :'id';
      $order[1] = isset($order[1]) ? $order[1] :'asc';

      $where = isset($data['where']) ? $data['where'] : [];
      $like = null;
      if(!empty($data['like']) and is_array($data['like']))
      {
        $like = $data['like'];

        $key = key(reset($like));
        $like[0] = $key;
        $like[1] = '%'.$like[$key].'%';
      }


      $results = $this->model
        ->orderBy($order[0],$order[1])
        ->where(function ($query) use ($like){
          if($like){
            return $query->where($like[0], 'like', $like[1]);
          }
          return $query;
        })
        ->with($this->relationships())
        ->where($where)
        ->paginate($limit);


        return response()->json($results);
    }

    public function show($id)
    {
      $result = $this->model
        ->with($this->relationships())
        ->findOrFail($id);

        return response()->json($result);
    }

    public function store(Request $request)
    {
      $this->validate($request, isset($this->rules) ? $this->rules : [], isset($this->messages) ? $this->messages : []);
      $result = $this->model->create($request->all());
      return response()->json($result);
    }
    public function update(Request $request, $id)
    {
      $this->validate($request, isset($this->rules) ? $this->rules : [], isset($this->messages) ? $this->messages : []);
      $result = $this->model->findOrFail($id);
      $result->update($request->all());

      return response()->json($result);
    }

    public function destroy($id)
    {
      $result = $this->model->findOrFail($id);
      $result->delete();

      return response()->json($result);
    }
    protected function relationships()
    {
      if (isset($this->relationships))
      {
          return $this->relationships;
      }
      return [];
    }
}

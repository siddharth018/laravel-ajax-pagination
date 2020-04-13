<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Item;
  
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxPagination(Request $request)
    {
        $city = $request->input('city');
        $username = $request->input('username');
        $matchThese = ['name' => $username];
        if (isset($city,$username)) {
                $data = Item::where($matchThese)->paginate(5);
        }
        if ($request->ajax()) {
            // $data = Item::paginate(5);
            if ($city === 'null' & $username === 'null') {
                $data = Item::paginate(5);
                return view('presult', compact('data'));
                }
            else {
                $data = Item::where($matchThese)->paginate(5);
                    return view('presult', compact('data'));
            }
        }
        $data = Item::paginate(5);
        return view('ajaxPagination',compact('data'));
    }
}
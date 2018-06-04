<?php

namespace App\Http\Controllers;

use App\Brands;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BrandsController extends Controller
{

  public function index() {
    $all_brands = Brands::all();

    return view('brands.index', [
      'title' => 'Brands',
      'brands' => $all_brands
    ]);
  }

  public function getCreateBrand() {

    return view('brands.create', [
      'title' => 'Add Brand',
    ]);

  }

  public function postCreateBrand(Request $request) {

    $name = $request->input('brand-name');

    $brand = Brands::create([
      'brand_name'    => $name,
    ]);

    return Redirect::to('brands/edit/'.$brand->id);

  }

  public function getEditBrand($id) {

    $brand = Brands::find($id);

    return view('brands.edit', [
      'title' => 'Edit Brand',
      'brand' => $brand,
    ]);

  }

  public function postEditBrand($id, Request $request) {

    $name = $request->input('brand-name');

    Brands::find($id)->update([
      'brand_name'    => $name,
    ]);

    return Redirect::back()->with('message', 'Brand updated!');

  }

  public function getDeleteBrand($id) {

    Brands::find($id)->delete();

    return Redirect::back()->with('message', 'Brand deleted!');

  }

}

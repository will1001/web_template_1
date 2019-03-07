<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\template_parameter;

class TemplateController extends Controller
{
    //


     public function formeditemplate($id)
    {
        # code...
        if(Auth::user()->roles == "webmaster"){
        
        $template=template_parameter::find($id);
        return view('webmasterCRUD/edittemplate',['template' => $template]);
        }else{
        
            return redirect('login');
        }
        
    }


    public function editemplate(Request $request,$id)
    {
    	if(Auth::user()->roles == "webmaster"){
            $validator = Validator::make(request()->all(), [
                'background' => 'image|max:1000',
            ]);
            if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());;
            }

            if($request->hasfile('background')){

            
            $filesebelumnya = template_parameter::find($id);
            File::delete('storage/'.basename($filesebelumnya->background));
            $fileName = $request->background->getClientOriginalName();
            $path = public_path().'/images';
            $upload = $request->background->move($path,$fileName);
       
            template_parameter::find($id)->update([
            'nama_desa' => $request->nama_desa,
            'font_size_nama_desa' => $request->font_size_nama_desa,
            'alamat_desa' => $request->alamat_desa,
            'email' => $request->email,
            'no_tlp_desa' => $request->no_tlp_desa,
            'warna_navbar' => $request->warna_navbar,
            'background' => '/images/'.$fileName
         ]);    

            
            return redirect('webmaster')->with('message', 'data berhasil di simpan');

            }else{
              
             template_parameter::find($id)->update([
            'nama_desa' => $request->nama_desa,
            'font_size_nama_desa' => $request->font_size_nama_desa,
            'alamat_desa' => $request->alamat_desa,
            'email' => $request->email,
            'no_tlp_desa' => $request->no_tlp_desa,
            'warna_navbar' => $request->warna_navbar,
         ]);   

            
            return redirect('webmaster')->with('message', 'data berhasil di simpan');
            }

        }else{
        
            return redirect('webmaster');
        }
    }
}

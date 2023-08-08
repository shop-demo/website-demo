<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\sanphamModel;
use App\Models\admin\albumImage;
use App\Models\admin\theLoaiModel;
use DB;
use App\Http\Requests\Sanpham\SanphamAdd;
use App\Http\Requests\Sanpham\UpdateSanpham;
use Illuminate\Http\Request;

class sanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Sản phẩm";
       
        $listSanPham = sanphamModel::all();
       
        return view('admin.sanpham.listSanpham',compact('title','listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  
    {
        //

         $title = "Thêm Sản phẩm";
         //get thể loai

        
         $dataTheLoai = theLoaiModel::all();
       
       
       return view('admin.sanpham.addSanpham',compact('title','dataTheLoai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     ADD sanpham
     */
    public function store(SanphamAdd $request)
    {
        $inset_sanpham=[
            'name'          =>$request->input('name'),
            'code'          =>Tieu_de($request->input('name')),
            'hinh_minh_hoa' =>str_replace('http://localhost/web/shop/public/upload/sanpham/', '',$request->input('hinh_minh_hoa')),
            'album_anh'     =>str_replace('http://localhost/web/shop/public/upload/sanpham/', '',$request->input('album_anh')),
           
            'status'        =>$request->status,
            
            'gia'           =>$request->input('gia'),
            
            'gia_khuyen_mai'=>$request->input('gia_khuyen_mai'),
            
            'mo_ta_ngan_gon'=>$request->mo_ta_ngan_gon,
            
            'mo_ta_chi_tiet'=>$request->mo_ta_chi_tiet,
            
            'the_loai_id'   =>$request->the_loai_id

        ];
        
        $insetSP = sanphamModel::create ($inset_sanpham);

       /* luu image anh
        $imageList = albumImage::create ([

                'ten_anh'    => $insetSP->album_anh,
                'san_pham_id'=> $insetSP->id
        ]);
       */
      
        return redirect()->route('admin.sanphamList')->with('success','Thêm mới sản phẩm thành công');  
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\sanphamModel  $sanphamModel
     * @return \Illuminate\Http\Response

        Show EDIT sản phẩm
     */
    public function show($id)
    {
        $title="edit Sản phẩm";
        //get thể loai
      
        $dataTheLoai = theLoaiModel::all();
        //get một sản phẩm
        $sanpham_id = sanphamModel::find($id);
       
       
        return view('admin.sanpham.editSanpham',compact('title','dataTheLoai','sanpham_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\sanphamModel  $sanphamModel
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateSanpham $request,$id)
    {
        
         /*update sản phẩm */
        $upload_sanpham = sanphamModel::find($id);
       
        $upload_sanpham->name = $request->input('name');
       
        $upload_sanpham->code = Tieu_de($request->input('name'));
       
        $upload_sanpham->hinh_minh_hoa = 
        str_replace('http://localhost/web/shop/public/upload/sanpham/', '',$request->input('hinh_minh_hoa'));
       
        $upload_sanpham->album_anh = str_replace('http://localhost/web/shop/public/upload/sanpham/', '',$request->input('album_anh'));
       
        $upload_sanpham->status = $request->status; 
       
        $upload_sanpham->gia = $request->input('gia'); 
       
        $upload_sanpham->gia_khuyen_mai = $request->input('gia_khuyen_mai'); 
       
        $upload_sanpham->mo_ta_ngan_gon = $request->mo_ta_ngan_gon;
       
        $upload_sanpham->mo_ta_chi_tiet = $request->mo_ta_chi_tiet;
      
        $upload_sanpham->the_loai_id = $request->the_loai_id;
       
        $upload_sanpham->save();
        
        return redirect()->route('admin.sanphamList')->with('success','Upload dữ liệu thành công');  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\sanphamModel  $sanphamModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sanphamModel $sanphamModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\sanphamModel  $sanphamModel
     * @return \Illuminate\Http\Response
     //delete sản phẩm
     */
    public function destroy(sanphamModel $sanphamModel,$id)
    {
        
       $sanphamDelete = sanphamModel::find($id);
   
       $sanphamDelete->delete();
       
       return redirect()->route('admin.sanphamList')->with('success','Xóa sản phẩm thành công');
   
    }
}

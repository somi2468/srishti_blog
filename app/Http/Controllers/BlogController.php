<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Bannerimage;
use Mainimage;

use App\Blog;
use App\BlogCategory;

class BlogController extends Controller
{
     public function addBlog(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		


       

    		$data = $request->all();
    		//echo "<pre>";print_r($data);die;
            $blog= new Blog;
            $blog->Name=$request->Name;
            $blog->BlogCategoryID=$request->BlogCategoryID;
            
            if(!empty($data['Description']))
            {
            	$blog->Description = $data['Description'];
            }else{
            	$blog->Description = '';
            }
            $blog->Status=$request->Status;
            $blog->save();

            $url="http://127.0.0.1:8000/storage/";
        $file=$request->file('Bannerimage');
        $extension=$file->getClientOriginalExtension();
        // dd($extension);
        // exit;
        $Bannerimagepath=$request->file('Bannerimage')->storeAs('images','Bannerimage' .time().'.'.$request->Bannerimage->extension());
        //dd($extension);
        // exit;    
        $blog->Bannerimage=$Bannerimagepath;
        $blog->Bannerimagepath=$url.$Bannerimagepath;
        $blog->save();

         $url="http://127.0.0.1:8000/storage/";
        $file=$request->file('Mainimage');
        $extension=$file->getClientOriginalExtension();
        // dd($extension);
        // exit;
        $Mainimagepath=$request->file('Mainimage')->storeAs('images','Mainimage' .time().'.'.$request->Mainimage->extension());
        //dd($extension);
        // exit;    
        $blog->Mainimage=$Mainimagepath;
        $blog->Mainimagepath=$url.$Mainimagepath;
        $blog->save();

             if($blog)
            {   

                Alert::success('Blog Successfully Added!', 'Success Message');
            return redirect('/admin/add-blog');
        }

        if($blog){
                return response()->json($data=[
                'status'=>200,
                'msg'=>'User Registration Successfull',
                
            ]);
        }
        else{
                return response()->json($data=[
                'status'=>203,
                'msg'=>'something went wrong'
               ]);
            }
    	}

        //Category Dropdown Menu Code
         $blogcategory = BlogCategory::where('CategoryID','>',0)->get();
    	return view('admin.blog.addblog')->with(compact('blogcategory'));
    }

    public function viewBlog()
    {
    	$blog=Blog::all();
    	return view('admin.blog.viewblog',compact('blog'));
    }

    public function allData(Request $req)
    {
         $user=Blog::get();
        
        if($user->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'BlogApi' => $user
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found'
            ]);
        }
    }    
  
    public function show($BlogID){

        $blogDetails =Blog::find($BlogID);
           
        //dd($blogDetails);
        if($blogDetails->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'Blog' => $blogDetails
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found'
            ]);
        }    
     }
    public function editBlog(Request $request,$BlogID=null)
    {
    	if($request->isMethod('post'))
    	{
            $data = $request->all();

             $blog= Blog::find($request->BlogID);
            $blog->Name=$data['Name'];
            $blog->BlogCategoryID=$data['BlogCategoryID'];
            $blog->Description=$data['Description'];
            $blog->save();

if($request->hasFile('Mainimage'))
        {
    		 $url="http://127.0.0.1:8000/storage/";
        $file=$request->file('Bannerimage');
        $extension=$file->getClientOriginalExtension();
        // dd($extension);
        // exit;

        $Bannerimagepath=$request->file('Bannerimage')->storeAs('images','Bannerimage' .time().'.'.$request->Bannerimage->extension());
        //dd($extension);
        // exit;    
        $blog->Bannerimage=$Bannerimagepath;
        $blog->Bannerimagepath=$url.$Bannerimagepath;
        $blog->save();
}
if($request->hasFile('Mainimage'))
        {
         $url="http://127.0.0.1:8000/storage/";
        $file=$request->file('Mainimage');
        $extension=$file->getClientOriginalExtension();
        // dd($extension);
        // exit;
        $Mainimagepath=$request->file('Mainimage')->storeAs('images','Mainimage' .time().'.'.$request->Mainimage->extension());
        //dd($extension);
        // exit;    
        $blog->Mainimage=$Mainimagepath;
        $blog->Mainimagepath=$url.$Mainimagepath;
        $blog->save();
       }
    		

    		// if(!empty($data['Description']))
      //       {
      //          $data['Description'] = '';
      //       }

            
           Alert::success('Blog Updated Successfully!!', 'Success Message');
           return redirect('/admin/view-blog'); 
    	}

        $blogcategory = BlogCategory::get();
    	$blog=Blog::where(['BlogID'=>$BlogID])->first();
    	return view('admin.blog.editblog',compact('blog','blogcategory'));
    }

    public function deleteBlog($id)
    {
    	Blog::where(['BlogID'=>$id])->delete();
    	Alert::success('Blog Deleted Successfully!', 'Success Message');

    	return redirect()->back()->with('Blog Deleted Successfully!!', 'delete Message');;
    }

    public function updateStatus(Request $request){
        $data= $request->all();
        Blog::where('BlogID','=',$data['id'])->update(['Status'=>$data['Status']]);
    }
}

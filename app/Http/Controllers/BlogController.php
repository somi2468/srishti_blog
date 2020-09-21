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
    		$file=$request->file('Bannerimage');
            $filename='Bannerimage' . time().'.'.$request->Bannerimage->extension();
            $file->move("upload/Bannerimage",$filename);

            $files=$request->file('Mainimage');
            $filenames='Mainimage' . time().'.'.$request->Mainimage->extension();
            $files->move("upload/Mainimage",$filenames);

    		$data = $request->all();
    		//echo "<pre>";print_r($data);die;
            $blog= new Blog;
            $blog->Name=$request->Name;
            $blog->BlogCategoryID=$request->BlogCategoryID;
            $blog->Bannerimage=$filename;
            $blog->Mainimage=$filenames;
            if(!empty($data['Description']))
            {
            	$blog->Description = $data['Description'];
            }else{
            	$blog->Description = '';
            }
            $blog->Status=$request->Status;
            $blog->save();

             if($blog)
            {   

                Alert::success('Blog Successfully Added!', 'Success Message');
            return redirect('/admin/add-blog');
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

    public function editBlog(Request $request,$BlogID=null)
    {
    	if($request->isMethod('post'))
    	{
    		$file=$request->file('Bannerimage');
            $filename='Bannerimage' . time().'.'.$request->Bannerimage->extension();
            $file->move("upload/Bannerimage",$filename);

            $files=$request->file('Mainimage');
            $filenames='Mainimage' . time().'.'.$request->Mainimage->extension();
            $files->move("upload/Mainimage",$filenames);

    		$data = $request->all();

    		// if(!empty($data['Description']))
      //       {
      //          $data['Description'] = '';
      //       }

            Blog::where(['BlogID'=>$BlogID])->update(
            	[
            	'Name'=>$data['Name'],
            	'BlogCategoryID'=>$data['BlogCategoryID'],
            	'Bannerimage'=>$filename,
            	'Mainimage'=>$filenames,
            	'Description'=>$data['Description'],
            	'Status'=>$data['Status'],
        ]);
           
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Input;
use RealRashid\SweetAlert\Facades\Alert;
use App\BlogKeywords;
use App\Blog;

class BlogKeywordsController extends Controller
{
 public function addblogkeywords(Request $request,$BlogID=null)
    {
    	if($request->isMethod('post')){
    		$data=$request->all();
    		$blogkeywords= new BlogKeywords;
    	    $blogkeywords->KeywordName=$request->KeywordName;
            $blogkeywords->BlogID=$request->BlogID;  
            $blogkeywords->Status=$request->Status;
    	    $blogkeywords->save();  

             if($blogkeywords)
            {   

                Alert::success('BlogKeywords Successfully Added!', 'Success Message');	
            return redirect('/admin/add-blog-keyword');
        }
    	}

        $blogname = Blog::get();
        $blogid = Blog::where('BlogID','>',0)->get();
    	return view('admin.blogkeywords.addblogkeywords')->with(compact('blogid','blogname'));
    }  

    public function viewBlogKeywords()
    {
        $blog=BlogKeywords::all();
        return view('admin.blogkeywords.viewblogkeywords',compact('blog'));
    }

    public function editBlogKeywords(Request $request,$KeywordID=null)
    {
       if($request->isMethod('post'))
        {
            $data = $request->all();
            BlogKeywords::where(['KeywordID'=>$KeywordID])->update(
                [
                 'KeywordName'=>$data['KeywordName'],  
                  'BlogID'=>$data['BlogID'],
                
                
        ]);
            Alert::success('BlogKeywords Updated Successfully!!!', 'Success Message');
            return redirect('/admin/view-blog-keyword');
        }
        $blogs = Blog::get();
        $blog=BlogKeywords::where(['KeywordID'=>$KeywordID])->first();
        return view('admin.blogkeywords.editblogkeywords',compact('blog','blogs'));
    } 
    public function deleteBlogKeyword($id)
    {
        BlogKeywords::where(['KeywordID'=>$id])->delete();
        Alert::success('Blog Deleted Successfully!', 'Success Message');

        return redirect()->back()->with('delete Message','Keyword Deleted Successfully!!');;
    }
}

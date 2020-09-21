<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Input;
use RealRashid\SweetAlert\Facades\Alert;
use App\BlogSeo;
use App\Blog;

class BlogSeoController extends Controller
{
    public function addblogSeo(Request $request,$BlogID=null)
    {
    	if($request->isMethod('post'))
    	{
    		$data=$request->all();
    		$blogseo= new BlogSeo;
            $blogseo->BlogID=$request->BlogID;
    	    $blogseo->MetaTitle=$request->MetaTitle;
            $blogseo->MetaDescription=$request->MetaDescription;  
            $blogseo->MetaKeyword=$request->MetaKeyword;
            $blogseo->IndexFollow=$request->IndexFollow;
              
            $blogseo->save();
            if($blogseo)
            {  	

                Alert::success('BlogSeo Successfully Added!', 'Success Message');
            return redirect('/admin/add-blog-seo');
        }
    	}

    	$blogid = Blog::get();
    	return view('admin.blogseo.addblogseo')->with(compact('blogid'));

    }

    public function viewBlogSeo()
    {
        $blog=BlogSeo::all();
        return view('admin.blogseo.viewblogseo',compact('blog'));
    }

    public function editBlogSeo(Request $request,$SeoID=null)
    {
       if($request->isMethod('post'))
        {
            $data = $request->all();
            BlogSeo::where(['SeoID'=>$SeoID])->update(
                [
                   
                  'BlogID'=>$data['BlogID'],
                  'MetaTitle'=>$data['MetaTitle'],
                  'MetaDescription'=>$data['MetaDescription'],
                  'MetaKeyword'=>$data['MetaKeyword'],
                  'IndexFollow'=>$data['IndexFollow'],          
                 ]);


            
                Alert::success('Keyword Updated Successfully!!', 'Success Message');
            return redirect('/admin/view-blog-seo')->with('Message','');
        
        }
        $blogs = Blog::get();
        $blog=BlogSeo::where(['SeoID'=>$SeoID])->first();
        return view('admin.blogseo.editblogseo',compact('blog','blogs'));
    } 
    public function deleteBlogSeo($id)
    {
        BlogSeo::where(['SeoID'=>$id])->delete();
        Alert::success('Blog Seo Deleted Successfully!', 'Success Message');

        return redirect()->back()->with('delete Message','Keyword Deleted Successfully!!');;
    }
}

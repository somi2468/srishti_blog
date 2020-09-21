@extends('admin.layouts.master')
@section('title','View Blog Seo')
@section('content')



<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>View Blog Seo</h1>
                  <small>View Blog Seo</small>
               </div>
            </section>
            @if(session('message'))
                <p class="alert alert-success">
                    {{session('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </p>
                @endif
                @if(session('delete'))
                <p class="alert alert-danger">
                    {{session('delete')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </p>
                @endif

                  
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="{{url('/admin/view-blog-seo')}}">
                                 <h4>Views Blog Seo</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/admin/add-blog-seo')}}"> <i class="fa fa-plus"></i> Add Blog Seo
                                 </a>  
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       
                                       <th>Seo ID</th>                                       
                                       <th>Blog ID</th>
                                       <th>Meta Title</th>
                                       <th>Meta Description</th>
                                       <th>Meta Keyword</th> 
                                       <th>Index Follow</th>                                    
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($blog as $blogs)
                                    <tr>
                                                                       
                                    <td>{{$blogs->SeoID}}</td>
                                    <td>{{$blogs->BlogID}}</td>
                                    <td>{{$blogs->MetaTitle}}</td>
                                    <td>{{$blogs->MetaDescription}}</td>
                                    <td>{{$blogs->MetaKeyword}}</td>
                                    <td>{{$blogs->IndexFollow}}</td>
 

                                      <td>
                                       <a href="{{url('/admin/edit-blog-seo/'.$blogs->SeoID)}}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color: green"></i></a>
                                       
                                       <a href="{{url('/admin/delete-blog-seo/'.$blogs->SeoID)}}"><i class="fa fa-trash-o fa-2x" style="color: red"></i></a>
                                       
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- customer Modal1 -->
              
@endsection
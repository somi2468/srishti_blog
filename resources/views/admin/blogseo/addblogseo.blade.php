@extends('admin.layouts.master')
@section('title','Add Blog Seo')
@section('content')


<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-th-large"></i>
               </div>
               <div class="header-title">
                  <h1>Add Blog Seo</h1>
                  <small>Add Blog Seo</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('/admin/view-blog-seo')}}"> 
                              <i class="fa fa-list"></i> View Blog Seo </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form action="{{url('/admin/add-blog-seo')}}" method="POST" enctype="multipart/form-data" >
                           	{{csrf_field()}}
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
                              


                             
<input type="hidden" name="_token" id="csrf-token" value="{{ Session:: token() }}">
                             
                              <div class="form-group">
                                <div class="col col-md-2">
                                <label for="select" class=" form-control-label">Blog Name</label></div>
                                  <div class="col-12 col-md-10">

                                   <select name="BlogID" id="BlogID" class="form-control">
                                @foreach($blogid as $blogid)
                                <option value="{{$blogid->BlogID}}">
                                  {{$blogid->Name}}
                                </option>
                                @endforeach
                                </select>
                                </div>
                                 </div>
                                 <br><br><br>

                              <div class="form-group">
                                <div class="col col-md-2">
                                 <label>Meta Title</label></div>
                                 <div class="col-12 col-md-10">
                                 <input type="text" class="form-control" placeholder="Ente MetaTitle" name="MetaTitle" id="MetaTitle" required>
                               </div>
                              </div>

                              <br><br>

                               <div class="form-group">
                                <div class="col col-md-2">
                                 <label>Meta Description</label></div>
                                 <div class="col-12 col-md-10">
                             <textarea name="MetaDescription" id="MetaDescription" class="form-control">
                              
                             </textarea>
                              </div>
                             </div>
                             <br><br><br>

                              <div class="form-group">
                                <div class="col col-md-2">
                                 <label>Meta Keyword</label></div>
                                 <div class="col-12 col-md-10">
                                 <input type="text" class="form-control" placeholder="Ente MetaKeyword" name="MetaKeyword" id="MetaKeyword" required>
                               </div>
                              </div>

                              <br>

                              <div class="form-group">
                                <div class="col col-md-2">
                                 <label>IndexFollow</label></div>
                                 <div class="col-12 col-md-10">               

                                  <input type="radio" id="1" name="IndexFollow" value="1">
                                   <label for="1">True</label><br>
                                   <input type="radio" id="2" name="IndexFollow" value="2">
                                   <label for="2">False</label>                                 
                                   
                               </div>
                              </div>

                                 
                              
                              

                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Blog Seo">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>

@endsection
@extends('admin.layouts.master')
@section('title','Add Blog')
@section('content')


<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-th-large"></i>
               </div>
               <div class="header-title">
                  <h1>Add Blog</h1>
                  <small>Add Blog</small>
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
                              <a class="btn btn-add " href="{{url('/admin/view-blog')}}"> 
                              <i class="fa fa-list"></i> View Blog </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form action="{{url('/admin/add-blog')}}" method="POST" enctype="multipart/form-data" >
                           	{{csrf_field()}}

                             <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

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
                              
                              <div class="form-group">
                                <div class="col col-md-2">
                                 <label>Name</label></div>
                                 <div class="col-12 col-md-10">
                                 <input type="text" class="form-control" placeholder="Ente Name" name="Name" id="Name" required>
                              </div>
                            </div>
                            <br><br>
                             
                               <div class="form-group">
                                <div class="col col-md-2">
                                <label for="select" class=" form-control-label">Blog Category</label></div>
                                  <div class="col-12 col-md-10">
                                   <select name="BlogCategoryID" id="BlogCategoryID" class="form-control">
                                @foreach($blogcategory as $blogcategory)
                                <option value="{{$blogcategory->CategoryID}}">
                                  {{$blogcategory->CategoryName}}
                                </option>
                                @endforeach
                                </select>
                                </div>
                                 </div>

                                 <br><br>
                              <div class="form-group">
                                <div class="col col-md-2">
                                 <label>Banner Image</label></div>
                                 <div class="col-12 col-md-10">
                                 <input type="file" id="Bannerimage" name="Bannerimage" >
                              </div></div>

                              <br><br>

                              <div class="form-group">
                                <div class="col col-md-2">
                                 <label>Main Image</label></div>
                                 <div class="col-12 col-md-10">
                                 <input type="file" name="Mainimage">
                                 </div>
                              </div>

                              <br><br>
                              
                              <div class="form-group">
                                <div class="col col-md-2">
                                 <label>Description</label></div>
                                 <div class="col-12 col-md-10">
                      			 <textarea name="Description" id="Description" class="form-control" size="15" maxlength="15" style=" white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 75ch;">
                      			 	
                      			 </textarea>
                              </div>
                              </div>
                             
                              
                              <div class="form-check">
                                 <label>Status</label><br>
                                 <label class="radio-inline">
                                 <input type="radio" name="Status" value="1" checked="checked">Active</label>
                                 <label class="radio-inline"><input type="radio" name="Status" value="0" >Inctive</label>
                              </div>

                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Blog">
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
@extends('admin.layouts.master')
@section('title','View Blog Keywords')
@section('content')



<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>View Keywords</h1>
                  <small>View Keywords</small>
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

                  <div id="message_success" style="display: none;" class="alert alert-sm alert-success">Status Enabled</div>
                <div id="message_error" style="display: none;" class="alert alert-sm alert-danger">Status Disabled</div>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="{{url('/admin/view-blog-keyword')}}#">
                                 <h4>Views Keywords</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/admin/add-blog-keyword')}}"> <i class="fa fa-plus"></i> Add Keyword
                                 </a>  
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       
                                       <th>Keywords ID</th>                                       
                                       <th>Blog ID</th>
                                       <th>Keywords Name</th>                                    
                                      <!--  <th>Status</th> -->
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($blog as $blogs)
                                    <tr>
                                                                       
                                    <td>{{$blogs->KeywordID}}</td>
                                    <td>{{$blogs->BlogID}}</td>
                                    <td>{{$blogs->KeywordName}}</td>

                                  <!--   <td>
                                    <input type="checkbox" class="Status btn btn-success" rel="{{$blogs->Status}}" data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"

                                    @if($blogs['Status']=="1")checked @endif>
                                    <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled
                                    </div>
                                    
                                    </td> -->
                                      

                                      <td>
                                       <a href="{{url('/admin/edit-blog-keyword/'.$blogs->KeywordID)}}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color: green"></i></a>
                                       
                                       <a href="{{url('/admin/delete-blog-keyword/'.$blogs->KeywordID)}}"><i class="fa fa-trash-o fa-2x" style="color: red"></i></a>
                                       
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
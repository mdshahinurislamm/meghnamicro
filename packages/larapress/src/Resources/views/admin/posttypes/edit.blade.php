@extends('admin.layouts.master')
@section('content')
@if(optional(auth()->user())->role == 111)
<!-- Nested Row within Card Body -->
<form method="POST" action="{{ url('/dashboard/posttypes',$posttype->id) }}" accept-charset="UTF-8" class="user">
    @csrf
    @method('PATCH') 

    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit a Post Type!</h6>                
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" name='name' value='{{ $posttype->name }}' class="form-control form-control-user" id="exampleFirstName"
                                placeholder=" Post Type Name">
                                <input type="hidden" name='user_id' class="form-control form-control-user" id="exampleFirstName"
                                placeholder="user" value="@auth(){{ optional(auth()->user())->id}}@endauth">
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" name='slug' value='{{ $posttype->slug }}' class="form-control form-control-user" id="exampleFirstName"
                                placeholder="slug">
                        </div> 
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">                                
                            <!-- choose editor  -->
                            @if($settingsAdmin->editor == "classic")
                            <!-- editor 1-->
                                <textarea name="pt_content">{!! $posttype->pt_content !!}</textarea>  
                            @else
                            <!-- editor 2-->                
                            <textarea id="html" name="pt_content">{!! $posttype->pt_content !!}</textarea>
                            <textarea id="css" name="pt_content_css">{!! $posttype->pt_content_css !!}</textarea>                
                            <div id="gjs" style="height:500px !important;"></div>                      
                            @endif                                  
                        </div>                             
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Turn on off post sections</h6>                
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <!-- Options text -->
                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: title</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"> 
                                @if($posttype->title == '#')
                                <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                                @else
                                <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                                @endif 
                            <span class="input-group-text">title</span>
                        </div>
                        <input type="text" name="title" value="{{ $posttype->title }}" class="form-control form-control-user" aria-label="Dollar amount (with dot and two decimal places)">
                    </div>
                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: content</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->content == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">content or Editor section</span>
                        </div>
                        <input type="text" name="content" value="{{ $posttype->content }}" class="form-control form-control-user" aria-label="Dollar amount (with dot and two decimal places)">
                    </div>

                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: excerpt</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->excerpt == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">Excerpt</span>
                        </div>
                        <input type="text" name="excerpt" value="{{$posttype->excerpt}}" class="form-control form-control-user" >
                    </div>

                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: thumbnail_path</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->thumbnail_path == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">thumbnail_path</span>
                        </div>
                        <input type="text" name="thumbnail_path" class="form-control form-control-user" value="{{$posttype->thumbnail_path}}">
                    </div>

                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: option_1</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->option_1 == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">option_1</span>
                        </div>
                        <input type="text" name="option_1" class="form-control form-control-user" value="{{$posttype->option_1}}">
                    </div>

                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: option_2</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->option_2 == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">option_2</span>
                        </div>
                        <input type="text" name="option_2" class="form-control form-control-user" value="{{$posttype->option_2}}">
                    </div>

                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: option_3</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->option_3 == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">option_3</span>
                        </div>
                        <input type="text" name="option_3" class="form-control form-control-user" value="{{$posttype->option_3}}">
                    </div>

                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: option_4</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->option_4 == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">option_4</span>
                        </div>
                        <input type="text" name="option_4" class="form-control form-control-user" value="{{$posttype->option_4}}">
                    </div>


                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: more_option_1 Positions</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->more_option_1 == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">more_option_1</span>
                        </div>
                        <input type="text" name="more_option_1" class="form-control form-control-user" value="{{$posttype->more_option_1}}">
                    </div>

                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: more_option_2</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->more_option_2 == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">more_option_2</span>
                        </div>
                        <input type="text" name="more_option_2" class="form-control form-control-user" value="{{$posttype->more_option_2}}">
                    </div>

                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: gallery_img</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->gallery_img == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">gallery_img</span>
                        </div>
                        <input type="text" name="gallery_img" class="form-control form-control-user" value="{{$posttype->gallery_img}}">
                    </div>

                    <label for="basic-url">If you visible this fields please input your placeholder. Turn off # Code: category_id</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            @if($posttype->category_id == '#')
                            <span class="input-group-text badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="input-group-text badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif 
                            <span class="input-group-text">category_id</span>
                        </div>
                        <input type="text" name="category_id" class="form-control form-control-user" value="{{$posttype->category_id}}">
                    </div>
                    
                </div>
            </div> 
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Publish</h6>                
                </div>            
                <div class="card-body"> 
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" name='paginate' value="{{ $posttype->paginate}}" class="form-control form-control-user" id="exampleFirstName" placeholder="100">
                        </div> 
                    </div> 
                    <div class="form-group row">                        
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <select class="form-control form-control-user form-select form-select-sm custom-select" aria-label=".form-select-sm example" name="status">
                                <option value="0" {{ $posttype->status == 0 ? 'selected' : '' }}  >Unpublish</option>
                                <option value="1" {{ $posttype->status == 1 ? 'selected' : '' }}  >Publish</option>
                            </select>
                        </div> 
                    </div> 
                    <div class="text-center mt-2">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>                    
                    </div>
                    @foreach ($errors->all() as $message)
                    {{ $message }}
                    @endforeach
                </div>   
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Thumbnails</h6>              
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                    <div class="form-group">                        
                            <input type="hidden" id="type" name='pt_thumbnail_path' placeholder="Image Url" class="form-control" value="{{ $posttype->pt_thumbnail_path }}">
                            <img id="myImg" src="{{ $posttype->pt_thumbnail_path == null ? asset('packages/larapress/src/Assets/admin/img/dummy-image-square.jpg') : asset('public/uploads').'/'.$posttype->pt_thumbnail_path }}" width="100%" height="auto" data-toggle="modal" data-target="#exampleModalCenter" class="border border-info">
                            <button type="button" onclick="removeValue('{{url('packages/larapress/src/Assets/admin/img/dummy-image-square.jpg')}}')" class="btn btn-secondary btn-sm mt-3">Remove Images</button>                        
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Display Options</h6>                
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Display Options -->
                    <div class="form-group">
                        <label for="basic-url">Main menu. Turn On Off</label>
                        <div class="input-group mb-3">
                            <label class="switch">
                                <input type="checkbox" name="in_menu_swh" value="1" {{ $posttype->in_menu_swh == '1' ? 'checked' : ''}} >
                                <span class="sliderswitch round"></span>
                            </label>
                        </div> 

                        <label for="basic-url">Dashboard Turn On Off</label>
                        <div class="input-group mb-3">
                            <label class="switch">
                                <input type="checkbox" name="in_dashboard" value="1" {{ $posttype->in_dashboard == '1' ? 'checked' : ''}}>
                                <span class="sliderswitch round"></span>
                            </label>
                        </div> 
                        <label for="basic-url">Template Design Turn On Off</label>
                        <div class="input-group mb-3">
                            <label class="switch">
                                <input type="checkbox" name="template" value="1" {{ $posttype->template == '1' ? 'checked' : ''}}>
                                <span class="sliderswitch round"></span>
                            </label>
                        </div>
                    </div> 
                    
                    <label for="basic-url">Main Categories</label>
                    <div class="form-group">
                        <select class="form-control form-control-user form-select form-select-sm custom-select" aria-label=".form-select-sm example" name="category_main_id">
                            <option value="0">No Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $posttype->category_main_id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>                    
                        
                    <label for="basic-url">Select menu name or create</label>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" name="menu_icon" value="{{$posttype->menu_icon}}" class="form-control form-control-user">
                            @foreach($posttypesD as $posttype)
                                @if($posttype->menu_icon)
                                <div class="form-check" style="display:inline-block">
                                    <input class="form-check-input" name="menu_icon" type="checkbox" value="{{$posttype->menu_icon}}" id="for{{$posttype->menu_icon}}">
                                    <label class="form-check-label" for="for{{$posttype->menu_icon}}">
                                    {{$posttype->menu_icon}}
                                    </label>
                                </div>
                                @endif
                            @endforeach 
                        </div> 
                    </div>                           
                    <!-- Display Options -->  
                </div>
            </div>  



        </div>
    </div> 
</form>
<!-- Insert Image from library -->
@include('admin.media.medialibrary')
@include('admin.media.mediauploads')
<!-- Modal -->
@else
You can't access this page. Please contact admin.
@endif
@endsection      
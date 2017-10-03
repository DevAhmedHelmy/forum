@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#">{{$thread->creater->name}}</a> 
                    {{$thread->title}}
                </div>

                <div class="panel-body">
                    
                  
                        <div class="body">{{$thread->body}}</div>
                        
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>

    @if(Auth::check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
               <form action="{{$thread->path() . '/replies'}}" method="POST" >
                    {{csrf_field()}}
                   <div class="form-group">
                   
                       <textarea class="form-control" id="body" name="body" placeholder="Have Something to say?" rows="5"></textarea>
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary">Add Reply</button>
                   </div>
               </form>
            </div>
        </div>
        @else 
        <p class="text-center">Please <a href="{{route('login')}}"> sign in </a>to participate in this discussion</p>
    @endif
</div>
@endsection

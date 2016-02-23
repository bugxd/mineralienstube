@extends('layouts.stones')

@section('title')

<title>Stones</title>

@endsection

@section('css')


@endsection

@section('scripts')

  <script type="text/javascript" src="/js/add.js"></script>

  @if(Session::has('modal'))
      <script type="text/javascript">
          $("{{ Session::get('modal') }}").modal('show');
      </script>
  @endif

@endsection


@section('content')
<h1>Admin Area {{Auth::user()->isAdmin()}}</h1>

<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stone_modal">add stone</a>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Stones</h3>
  </div>
  <div class="panel-body">
    <div class="list-group">
      @if (isset($stones)) 
        @foreach($stones as $stone)
            <div class="list-group-item">
                <a href="{{ URL::route('stone-alter', $stone->id) }}" >{{ $stone->name }} </a>
                <a href="#" id="{{ $stone->id }}" class="btn btn-danger btn-xs pull-right delete_stone"  data-toggle="modal" data-target="#stone_delete">Delete</a>
            </div>
        @endforeach
      @else
        <p>nichts gefunden</p>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="stone_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            
        <h4 class="modal-title">Add Stone</h4>
      </div>
      <div class="modal-body">
        <form id="stone_form" method="post" action="{{ URL::route('stones-store-stone') }}" enctype="multipart/form-data">
            <div class="form-group {{  $errors->has('stone_name') ? ' has-error' : ''}}">
                <label for="stone_name">Name</label>
                <input type="text" id="stone_name" name="stone_name" class="form-control"/>
                @if($errors->has('stone_name'))
                    {{  $errors->first('stone_name') }}
                @endif
            </div>
            <div class="form-group {{  $errors->has('stone_desc') ? ' has-error' : ''}}">
                <label for="stone_desc">Description</label>
                <input type="text" id="stone_desc" name="stone_desc" class="form-control"/>
                @if($errors->has('stone_desc'))
                    {{  $errors->first('stone_desc') }}
                @endif
            </div>
            <div class="form-group {{  $errors->has('disease_select') ? ' has-error' : ''}}">
                <label for="disease_select">Disease</label>
                <select name="disease_select[]" size="5" class="form-control" multiple>
                  @foreach($diseases as $disease)
                    <option value="{{$disease->id}}">{{$disease->name}}</option>
                  @endforeach
                </select>
                @if($errors->has('disease_select'))
                    {{  $errors->first('disease_select') }}
                @endif
            </div>
            <div class="form-group {{  $errors->has('body_select') ? ' has-error' : ''}}">
                <label for="body_select">Where to use</label>
                <select name="body_select[]" size="5" class="form-control" multiple>
                  @foreach($bodies as $body)
                    <option value="{{$body->id}}">{{$body->name}}</option>
                  @endforeach
                </select>
                @if($errors->has('body_select'))
                    {{  $errors->first('body_select') }}
                @endif
            </div>
            <div class="form-group {{  $errors->has('stone_color') ? ' has-error' : ''}}">
                <label for="stone_color">Color</label>
                <input type="text" id="stone_color" name="stone_color" class="form-control"/>
                @if($errors->has('stone_color'))
                    {{  $errors->first('stone_color') }}
                @endif
            </div>
            <div class="form-group {{  $errors->has('found_select') ? ' has-error' : ''}}">
                <label for="found_select">Found at</label>
                <select name="found_select[]" size="5" class="form-control" multiple>
                  @foreach($founds as $found)
                    <option value="{{$found->id}}">{{$found->name}}</option>
                  @endforeach
                </select>
                @if($errors->has('found_select'))
                    {{  $errors->first('found_select') }}
                @endif
            </div>
            <div class="form-group {{  $errors->has('chakra_select') ? ' has-error' : ''}}">
                <label for="chakra_select">Found at</label>
                <select name="chakra_select[]" size="5" class="form-control" multiple="multiple">
                  @foreach($chakras as $chakra)
                    <option value="{{$chakra->id}}">{{$chakra->name}}</option>
                  @endforeach
                </select>
                @if($errors->has('chakra_select'))
                    {{  $errors->first('chakra_select') }}
                @endif
            </div>
            <div class="form-group {{  $errors->has('stone_img') ? ' has-error' : ''}}">
                <label for="stone_img">Image Name</label>
                <input type="file" id="stone_img" name="stone_img" class="form-control"/>
                @if($errors->has('stone_img'))
                    {{  $errors->first('stone_img') }}
                @endif
            </div>
            {{Form::token()}}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="stone_submit" >Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="stone_delete" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            
        <h4 class="modal-title">Delete Stone</h4>
      </div>
      <div class="modal-body">
        <span>Do you really want to delete the stone?</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <a href="#" type="button" class="btn btn-danger" id="btn_delete_stone">Delete</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->








<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#disease_modal">add disease</a>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Disease</h3>
  </div>
  <div class="panel-body">
    <div class="list-group">
        @foreach($diseases as $disease)
            <div class="list-group-item">
                <a href="{{ URL::route('disease-alter', $disease->id) }}" >{{ $disease->name }} </a>
                <a href="#" id="{{ $disease->id }}" class="btn btn-danger btn-xs pull-right delete_disease"  data-toggle="modal" data-target="#disease_delete">Delete</a>
            </div>
        @endforeach
    </div>
  </div>
</div>

<div class="modal fade" id="disease_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            
        <h4 class="modal-title">Add Disease</h4>
      </div>
      <div class="modal-body">
        <form id="disease_form" method="post" action="{{ URL::route('stones-store-disease') }}">
            <div class="form-group {{  $errors->has('disease_name') ? ' has-error' : ''}}">
                <label for="disease_name">Disease Name</label>
                <input type="text" id="disease_name" name="disease_name" class="form-control"/>
                @if($errors->has('disease_name'))
                    {{  $errors->first('disease_name') }}
                @endif
            </div>
            {{Form::token()}}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="disease_submit" >Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="disease_delete" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            
        <h4 class="modal-title">Delete Diseas</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <a href="#" type="button" class="btn btn-danger" id="btn_delete_disease">Delete</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#body_modal">add body</a>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Where to use</h3>
  </div>
  <div class="panel-body">
    <div class="list-group">
        @foreach($bodies as $body)
            <div class="list-group-item">
                <a href="{{ URL::route('body-alter', $body->id) }}" >{{ $body->name }} </a>
                <a href="#" id="{{ $body->id }}" class="btn btn-danger btn-xs pull-right delete_body"  data-toggle="modal" data-target="#body_delete">Delete</a>
            </div>
        @endforeach
    </div>
  </div>
</div>

<div class="modal fade" id="body_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            
        <h4 class="modal-title">Add Body</h4>
      </div>
      <div class="modal-body">
        <form id="body_form" method="post" action="{{ URL::route('stones-store-body') }}">
            <div class="form-group {{  $errors->has('body_name') ? ' has-error' : ''}}">
                <label for="body_name">Body Name</label>
                <input type="text" id="body_name" name="body_name" class="form-control"/>
                @if($errors->has('body_name'))
                    {{  $errors->first('body_name') }}
                @endif
            </div>
            {{Form::token()}}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="body_submit" >Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="body_delete" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            
        <h4 class="modal-title">Delete Body</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <a href="#" type="button" class="btn btn-danger" id="btn_delete_body">Delete</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#found_modal">add found</a>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Where to use</h3>
  </div>
  <div class="panel-body">
    <div class="list-group">
        @foreach($founds as $found)
            <div class="list-group-item">
                <a href="{{ URL::route('found-alter', $found->id) }}" >{{ $found->name }} </a>
                <a href="#" id="{{ $found->id }}" class="btn btn-danger btn-xs pull-right delete_found"  data-toggle="modal" data-target="#found_delete">Delete</a>
            </div>
        @endforeach
    </div>
  </div>
</div>

<div class="modal fade" id="found_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            
        <h4 class="modal-title">Add Found</h4>
      </div>
      <div class="modal-body">
        <form id="found_form" method="post" action="{{ URL::route('stones-store-found') }}">
            <div class="form-group {{  $errors->has('found_name') ? ' has-error' : ''}}">
                <label for="found_name">Found Name</label>
                <input type="text" id="found_name" name="found_name" class="form-control"/>
                @if($errors->has('found_name'))
                    {{  $errors->first('found_name') }}
                @endif
            </div>
            {{Form::token()}}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="found_submit" >Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="found_delete" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            
        <h4 class="modal-title">Delete Diseas</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <a href="#" type="button" class="btn btn-danger" id="btn_delete_found">Delete</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
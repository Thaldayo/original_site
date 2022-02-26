{!! Form::open(['route' => 'syokureki.store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('Post', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}
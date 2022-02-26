{!! Form::open(['route' => 'originalposts.store']) !!}
        <div class="form-group">
            {!! Form::label('shop', 'Shop') !!}
            {!! Form::text('shop', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('shop_adress', 'Shop adress') !!}
            {!! Form::text('shop_adress', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('picture', 'Picture') !!}
            {!! Form::text('picture', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('menu', 'Menu') !!}
            {!! Form::text('menu', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('comment', 'Comment') !!}
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
<div class="mb-4">
    {!! Form::label('title', 'Título del curso') !!}
    {!! Form::text('title', null, ['class' => 'rounded w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '')]) !!}

    @error('title')
        <strong class="text-xs text-red-500">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['class' => 'rounded w-full mt-1', 'readonly']) !!}

    @error('slug')
        <strong class="text-xs text-red-500">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo del curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'rounded w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-500">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripci+on del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'rounded w-full mt-1' . ($errors->has('description') ? ' border-red-600' : '')]) !!}

    @error('description')
        <strong class="text-xs text-red-500">{{$message}}</strong>
    @enderror
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'rounded w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('level_id', 'Niveles') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'rounded w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('price_id', 'Precios') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'rounded w-full mt-1']) !!}
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <figure>
        @isset ($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="" alt="">
        @endisset
    </figure>

    <div>
        {!! Form::file('file', ['class' => 'rounded w-full ', 'id' => 'file', 'accept' => 'image/*']) !!}

        @error('file')
            <strong class="text-xs text-red-500">{{$message}}</strong>
        @enderror
    </div>
</div>
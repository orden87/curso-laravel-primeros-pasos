@csrf

<label>Título</label>
<input type="text" name="title" value="{{ old("title", $post->title) }}">

<label>Slug</label>
<input type="text" name="slug" value="{{ old("slug", $post->slug) }}">

<label for="">Categoría</label>
<select name="category_id">
    <option value=""></option>-->
    @foreach ($categories as $title => $id)
        <option {{ old("category_id", $post->category_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $title }}</option>
    @endforeach
</select>

<label for="">Posteado</label>
<select name="posted">
    <option {{ old("posted", $post->posted) == "no" ? "selected" : ""}} value="no">No</option>
    <option {{ old("posted", $post->posted) == "yes" ? "selected" : ""}} value="yes">Si</option>
</select>

<label>Contenido</label>
<textarea name="content">{{ old("content",$post->content) }}</textarea>

<label>Descripción</label>
<textarea name="description">{{ old("description", $post->description) }}</textarea>

@if (isset($task) && $task == "edit")

    <label>Imagen</label>
    <input type="file" name="image">

@endif

<button type="submit">Enviar</button>
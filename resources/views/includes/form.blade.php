<div class="form-group">
    <label for="title">title</label>
    <input type="text" class="form-control" id="title"  placeholder="Enter title" name="title" value="{{ old('title', $post->title) }}">
</div>
<div class="form-group">
    <label for="author">author</label>
    <input type="text" class="form-control" id="author"  placeholder="Enter author" name="author" value="{{ old('author', $post->author) }}">
</div>


@php
$newDate = explode(' ', $post->post_date);
@endphp

<div class="form-group">
    <label for="post_date">post date</label>
    <input type="date" class="form-control" id="post_date"  placeholder="Enter the post date" name="post_date" value="{{ old('post_date', $newDate[0]) }}">
</div>

<div class="form-group">
    <label for="post_content">post content</label>
    <input type="text" class="form-control" id="post_content"  placeholder="Enter the post content" name="post_content" value="{{ old('post_content', $post->post_content) }}">
</div>
<button type="submit" class="btn btn-primary">Submit</button>

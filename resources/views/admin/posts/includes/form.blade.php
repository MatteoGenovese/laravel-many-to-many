<div class="form-group">
    <label for="title">title</label>
    <input type="text" class="form-control" id="title"  placeholder="Enter title" name="title" value="{{ old('title', $post->title) }}">
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

<div class="form-group">
    <label for="post_tag">tags</label>
    <div class="row">

            <div class="col">
                @forelse ($tags as $tag)

                    @if ($errors->any())
                        <input name="tags[]" class="form-check-input" type="checkbox" id="input-tags" value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    @else
                        <input name="tags[]" class="form-check-input" type="checkbox" id="input-tags" value="{{ $tag->id }}"
                        {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                    @endif
                    <label for="input-tags" class="form-check-label">
                        {{ $tag->name }}
                    </label>
                    <br>
                @empty
                    {{ 'No tags..' }}
                @endforelse
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary" >Submit</button>

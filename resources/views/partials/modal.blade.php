<div id="modal-ter" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title has-text-centered">Categories</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="content">
                <div class="tags are-medium">
                @foreach($categories as $category)
                        <a class="tag is-black" href="{{route('categories.index', ['category' => $category->slug])}}"> {{ $category->name }}</a>
                @endforeach
                </div>
            </div>
        </section>
    </div>
</div>

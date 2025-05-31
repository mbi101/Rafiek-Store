@props(['first_link_url' => '#', 'first_link_title' => '', 'sub_active' => null, 'active' => null, 'title' => null])
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="{{ $first_link_url }}">{{ $first_link_title }}</a></span>
            @if($sub_active)
                <span class="devider">/</span>
                <span><a href="javascript:void(0);">{{ $sub_active }}</a></span>
            @endif
            @if($active)
                <span class="devider">/</span>
                <span><a href="javascript:void(0);">{{ $active }}</a></span>
            @endif
        </div>
        @if($title)
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ $title }}</h1>
            </div>
        @endif
    </div>
</section>

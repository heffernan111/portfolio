@extends('layouts.web')
@section('content')

<style>
body {font-family: Arial;}

/* Style the tab */
/* Style the tab */
.tab {
    overflow: hidden;
    border-bottom: 1px solid #ccc;
    background-color: #fff;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    border-radius: 6px;
    border-color: #0062cc;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #BD5D38;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #d48a6e;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>


    <div class="container-fluid p-0">
        <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
            <div class="my-auto">
            <h1 class="mb-0">David
                <span class="text-primary">Heffernan</span>
            </h1>
            <div class="subheading mb-5">
                <h3 class="mb-0">Nottingham</h3>
                <a href="mailto:david.heff.dh@gmail.com">david.heff.dh@gmail.com</a>
            </div>
                <p class="lead mb-5">A full stack developer using the laravel framework to produce ....</p>
        </section>
        @foreach($pages as $page)
            <hr class="m-0">
                <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="{{ $page->slug }}">
                    <div class="my-auto">
                      <h2 class="mb-5"> {{ $page->slug }}</h2>
                            @if ($page->slug === 'experience')
                            @foreach($experiences as $experience)
                                <div class="resume-item d-flex flex-column flex-md-row mb-5">
                                    <div class="resume-content mr-auto">
                                        <h3 class="mb-0">{{ $experience->title }}</h3>
                                        <div class="subheading mb-3">{{ $experience->company }}</div>
                                            <p>{{ $experience->description }}</p>
                                    </div>
                                    <div class="resume-date text-md-right">
                                        <p>{{ $experience->start }} - {{ $experience->end }}</p>
                                    </div>
                                </div>
                            @endforeach
                            @elseif ($page->slug === 'education')
                                @foreach($educations as $education)
                                    <div class="resume-item d-flex flex-column flex-md-row mb-5">
                                        <div class="resume-content mr-auto">
                                          <h3 class="mb-0">{{ $education->school }}</h3>
                                            <div class="subheading mb-3">{{ $education->title }}</div>
                                            <div>{{ $education->description }}</div>
                                            <p>{{ $education->grade }}</p>
                                        </div>
                                        <div class="resume-date text-md-right">
                                            <span class="text-primary">{{ $education->start }} - {{ $education->end }}</span>
                                        </div>
                                    </div>  
                                @endforeach
                            @elseif ($page->slug === 'skills')
                                <div class="subheading mb-3">Programming Languages</div>
                                <ul class="list-inline dev-icons">
                                    @foreach($skills as $skill)
                                    <li class="list-inline-item">
                                        <a href="{{ $skill->link }}">
                                            <i class="fab {{ $skill->icon }} fa-fw" title="{{ $skill->description }}"></i>
                                        </a>
                                    </li>
                                     @endforeach
                                     <div class="subheading mb-3">Cool Codes</div>
                                </ul>      
                            @else ($page->slug === 'tutorials')
                                <div class="tab">
                                    @foreach($tutorials as $tutorial)
                                        <button class="tablinks"  onclick="openTut(event, '{{ $tutorial->title }}')">{{ $tutorial->title }}</button>
                                    @endforeach
                                </div>
                                @foreach($tutorials as $tutorial)
                                    <div id="{{ $tutorial->title }}" class="tabcontent">
                                        <h3>{{ $tutorial->title }}</h3>
                                        <p>{{ $tutorial->title }}<p>
                                    </div>
                                @endforeach
                            @endif
                    </div>
                </section>
            @endforeach
        </div>
@endsection
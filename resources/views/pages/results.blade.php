
@extends('layouts/main')

@section('title')
    Design Storm - Inspiration for developers
@endsection


@section('content')
    <div id="site-section">
      <div class="container">
        <div id="results">
          <div>
            <div class="search-container">
              <form action="/results" method="POST">
                @csrf
                <input class="search" type="text" value="{{$keyword}}"" placeholder="Search" name="search">
              </form>
            </div>
            <div class="boxes">
              <div class="row">
              @if (count($filteredData) >= 1)
                @foreach ($filteredData as $inspiration)
                  <div class="col-md-3">
                    <div class="box">
                      <div style="position: relative; background: url('{{$inspiration->covers->original}}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                        @php
                        $codedUrl = urlencode($inspiration->covers->original);
                        @endphp
                        <a href="/projects/inspiration/{{$inspiration->id}}/add?image_url={{$codedUrl}}">
                          <div class="add-btn 
                          @if(in_array($inspiration->id, $inspiArray))
                            active 
                          @endif">
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              @else
                <h4>No results found</h4> 
              @endif  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
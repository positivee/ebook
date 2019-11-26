@extends('master_user')
@section('content')

    <<div class="videos-header card">
        <h2>Aktualności</h2>
    </div>
    <div class="row">

    @foreach($articles as $article)

        <!-- Single offer -->
            <div class="col-xs-12 col-md-6 col-lg-4 single-video">
                <div class="card">

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$article->getPhoto()}}?showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="card-content">
                        <a href="">
                            <h4>{{ $article->getTitle() }}</h4>
                        </a>
                        <span class="upper-label">Treść</span>
                        <span class="video-author">{{$article->getContent()}}</span>
                        <span class="upper-label">Dodany przez</span>
                        <span class="video-author">{{$article->getBookstore()->name}}</span>
                    </div>

                </div>
            </div>

        @endforeach

    </div>

@stop

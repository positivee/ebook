 @extends('master')
 @section('content')

        <!-- section -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title my-4">
                                <h2>Aktualności</h2>
                            </div>
                        </div>
                    @foreach($articles as $k => $article)
                        @if($k<2)
                                <!-- post -->
                                <div class="col-md-6 ">
                                    <div class="post post-thumb">
                                        <a class="post-img" href="#"><img class="max-height" src="{{$article->getPhoto()}}?showinfo=0" frameborder="0" alt=""></a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                <a class="post-category cat-2" href="#">{{$article->getBookstore()->name}}</a>
                                                <span class="post-date">Czerwiec 11, 2019</span>
                                            </div>
                                            <h3 class="post-title"><a href="#">{{ $article->getTitle() }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /post -->

                            @endif
                        @endforeach
                    </div>
                    <!-- /row -->
                    <div class="row">
                    @foreach($articles as $k => $article)
                        @if($k>1)

                            <!-- post -->
                                <div class="col-md-4">
                                    <div class="post">
                                        <a class="post-img" href="#"><img class="max-height" src="{{$article->getPhoto()}}?showinfo=0" frameborder="0" alt=""></a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                <a class="post-category cat-1" href="#">{{$article->getBookstore()->name}}</a>
                                                <span class="post-date">Czerwiec 11, 2019</span>
                                            </div>
                                            <h3 class="post-title"><a href="#">{{ $article->getTitle() }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /post -->
                            @endif
                        @endforeach
                    </div>
                    {{--    <!-- row -->
                            <div class="row">

                                <!-- post -->
                                <div class="col-md-4">
                                    <div class="post">
                                        <a class="post-img" href="#"><img src="/img/panel-2.jpg" alt=""></a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                <a class="post-category cat-1" href="#">NOWA KSIĄŻKA</a>
                                                <span class="post-date">Czerwiec 11, 2019</span>
                                            </div>
                                            <h3 class="post-title"><a href="#">Świadomość pedagogiczna współczesnych rodziców</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /post -->

                                <!-- post -->
                                <div class="col-md-4">
                                    <div class="post">
                                        <a class="post-img" href="#"><img src="/img/panel-2.jpg" alt=""></a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                <a class="post-category cat-1" href="#">NOWOŚĆ</a>
                                                <span class="post-date">Czerwiec 11, 2019</span>
                                            </div>
                                            <h3 class="post-title"><a href="#">Kapitał społeczny szkoły</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /post -->

                                <!-- post -->
                                <div class="col-md-4">
                                    <div class="post">
                                        <a class="post-img" href="#"><img src="/img/panel-2.jpg" alt=""></a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                <a class="post-category cat-1" href="">RODZINA</a>
                                                <span class="post-date">Czerwiec 11, 2019</span>
                                            </div>
                                            <h3 class="post-title"><a href="#">Pedagogika zrównoważonego rozwoju z przyrodą w tle</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /post -->

                                <!-- /row -->--}}



                </div>
            </div>
            <!-- /section -->



@stop

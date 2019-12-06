@extends('master')
@section('content')

    <div class="row my-5">
        <div class="col-md-2 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profil</a>
                <a class="list-group-item list-group-item-action" id="list-quote-list" data-toggle="list" href="#list-quote" role="tab" aria-controls="quote">Cytaty</a>
                <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list" href="#list-password" role="tab" aria-controls="password">Zmień hasło</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Twój Profil</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{'/user/update', $user->id}}">

                                    {{ csrf_field() }}
                                    {{ method_field('patch') }}

                                    <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Imię</label>
                                        <div class="col-8">
                                            <input id="name" name="name" value="{{ $user->name }}" class="form-control here" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="surename" class="col-4 col-form-label">Nazwisko</label>
                                        <div class="col-8">
                                            <input id="surename" name="surename" value="{{ $user->surname }}"  class="form-control here" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-4 col-form-label">E-mail</label>
                                        <div class="col-8">
                                            <input id="email" name="email" value="{{ $user->email }}" class="form-control here" type="email">
                                        </div>
                                    </div>
                               {{--     <div class="form-group row">
                                        <label for="password" class="col-4 col-form-label">Hasło</label>
                                        <div class="col-8">
                                            <input id="password" name="password" placeholder="Hasło" class="form-control here" required="required" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_confirmation" class="col-4 col-form-label">Powtórz hasło</label>
                                        <div class="col-8">
                                            <input id="password_confirmation" name="password_confirmation" placeholder="Powtórz hasło" class="form-control here" required="required" type="password">
                                        </div>
                                    </div>--}}


                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <button name="submit" type="submit" class="btn btn-primary">Zaktualizuj profil</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="tab-pane fade" id="list-quote" role="tabpanel" aria-labelledby="list-quote-list">

                      @foreach($myQuotes as $quote)
                          <blockquote class="quote-card shadow my-3 ">
                              <cite class="col-9 text-justify">
                                  {{$quote->getContent()}}
                              </cite>
                              <p>
                                   Z Książki {{$quote->getBookTitle()}} autora {{$quote->getBookAuthorName() ." ".$quote->getBookAuthorSurname()}}
                              </p>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                 </div>

                          </blockquote>
                      @endforeach
                </div>
                <div class="tab-pane fade" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Zmień hasło</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" >
                                        {{-- moze tu jescze stare--}}
                                        <div class="form-group row">
                                            <label for="password" class="col-4 col-form-label">Hasło</label>
                                            <div class="col-8">
                                                <input id="password" name="password" placeholder="Hasło" class="form-control here" required="required" type="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-4 col-form-label">Powtórz hasło</label>
                                            <div class="col-8">
                                                <input id="password_confirmation" name="password_confirmation" placeholder="Powtórz hasło" class="form-control here" required="required" type="password">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="offset-4 col-8">
                                                <button name="submit" type="submit" class="btn btn-primary">Zmień hasło</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>




            </div>
        </div>
    </div>



{{--
    <div class="container emp-profile">
        <form method="post">
            <div class="row">

                <div class="col-12 my-3">
                    <div class="profile-head">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Twoje Dane</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Twoje Cytaty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-edit" data-toggle="tab" href="#profile-edit" role="tab" aria-controls="profile-edit" aria-selected="false">Edytuj Dane</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
                <div class="col-md-12">
                    <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Imię</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Kamil</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nazwisko</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Biernacki</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>kshitighelani@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                 @foreach($myQuotes as $quote)
                                    <div class="card mb-3 quote">
                                        <div class="card-body">
                                            <p class="card-title">
                                                Książka <a class="" href="#"> {{$quote->getBookTitle()}}</a> autora <a class="" href="#"> {{$quote->getBookAuthorName() ." ".$quote->getBookAuthorSurname()}}</a>
                                            </p>
                                            <p class="card-text font-italic">"{{$quote->getContent()}}"</p>
                                        </div>
                                    </div>
                                 @endforeach

                        <div class="tab-pane fade" id="profile-edit" role="tabpanel" aria-labelledby="profile-edit">
                            Gej


                    </div>



                </div>
            </div>
        </form>
    </div>--}}

   {{-- <div class="videos-header card">
        <h2>Mój profil</h2>
    </div>

    <div class="row">

    @foreach($userInfo as $info)

            <div class="col-xs-12 col-md-6 col-lg-4 single-video">

                <div class="card">
                    <div class="card-content">
                        <p><h4>Moje dane</h4></p>
                        <span class="upper-label">Imię</span>
                        <span class="video-author">{{$info->getName()}}</span>
                        <span class="upper-label">Nazwisko</span>
                        <span class="video-author">{{$info->getSurname()}}</span>
                        <span class="upper-label">E-mail</span>
                        <span class="video-author">{{$info->getEmail()}}</span>
                    </div>
                </div>
            </div>
    @endforeach
    </div>


    <div class="row">

        <div class="col-xs-12 col-md-6 col-lg-4 single-video">

            <div class="card">
                <div class="card-content">
                    <p><h4>Edycja danych</h4></p>

                    <form method="post" action="{{'/user/update', $user->id}}">

                        {{ csrf_field() }}
                        {{ method_field('patch') }}

                        <input type="text" name="name"  value="{{ $user->name }}" />
                        <input type="text" name="surname"  value="{{ $user->surname }}" />
                        <input type="email" name="email"  value="{{ $user->email }}" />
                        <input type="password" name="password" placeholder="Hasło" />
                        <input type="password" name="password_confirmation" placeholder="Powtórz hasło"  />

                        <button type="submit">Send</button>
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <p><h4>Moje cytaty</h4></p>
        @foreach($myQuotes as $quote)

            <div class="col-xs-12 col-md-6 col-lg-4 single-video">

                <div class="card">
                    <div class="card-content">

                        <span class="upper-label">Treść cytatu</span>
                        <span class="video-author">{{$quote->getContent()}}</span>
                        <span class="upper-label">Tytuł Książki</span>
                        <span class="video-author">{{$quote->getBookTitle()}}</span>
                        <span class="upper-label">Autor książki</span>
                        <span class="video-author">{{$quote->getBookAuthorName() ." ".$quote->getBookAuthorSurname()}}</span>


                    </div>
                </div>
            </div>


        @endforeach

    </div>
--}}




@stop

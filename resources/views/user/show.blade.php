@extends('master')
@section('content')

    <div class="row my-5">
        <div class="col-md-3 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-yourbook-list" data-toggle="list" href="#list-yourbook" role="tab" aria-controls="yourbook">Twoje Książki</a>
                <a class="list-group-item list-group-item-action" id="list-quote-list" data-toggle="list" href="#list-quote" role="tab" aria-controls="quote">Twoje cytaty</a>
                <a class="list-group-item list-group-item-action " id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profil</a>
                <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list" href="#list-password" role="tab" aria-controls="password">Zmień hasło</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="list-yourbook" role="tabpanel" aria-labelledby="list-yourbook-list">
                    <div class="col-12">
                        <h4>Książki zakupione przez ciebie</h4>
                        <div class="table-responsive-md">
                            <table class="table">
                                <table class="table">
                                    <caption>

                                    </caption>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope="col">Data Zakupu</th>
                                        <th scope="col">Książka</th>
                                        <th scope="col">Opcje</th>
                                        <th scope="col">ID Oferty dla sprawdzenia tylko</th>
                                    </tr>
                                    </thead>

                                    <!-- wyświetlać foreachem transakcje zalogowanego usera
                                     pobieranie np. getOffer()->download - nazwa kolumny w tabeli offers z linkiem
                                      do pobrania ksiązki -->

                                    @foreach($myBooks as $b)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{Str::limit($b->getDate(),10,$end = '')}}</td>
                                        <td><a href={{$b->getOffer()->link}}>Link</a></td> <!--problem z wyświetleniem tytułu :/ -->
                                        <td>#</td>
                                        <td>{{$b->getOffer()->id}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

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
                                <form method="post" action="{{'/user/updateProfile', $user->id}}">

                                    {{ csrf_field() }}
                                    {{ method_field('patch') }}

                                    <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Imię</label>
                                        <div class="col-8">
                                            <input id="name" name="name" value="{{ $user->name }}" class="form-control here" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="surname" class="col-4 col-form-label">Nazwisko</label>
                                        <div class="col-8">
                                            <input id="surname" name="surname" value="{{ $user->surname }}"  class="form-control here" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-4 col-form-label">E-mail</label>
                                        <div class="col-8">
                                            <input id="email" name="email" value="{{ $user->email }}" class="form-control here" type="email">
                                        </div>
                                    </div>
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
                     @if($myQuotes == null) <div class="my-2">Nie dodałeś jeszcze żadnego cytatu</div> @endif
                      @foreach($myQuotes as $quote)
                          <blockquote class="quote-card shadow my-3 ">
                              <cite class="col-9 text-justify">
                                  {{$quote->getContent()}}
                              </cite>
                              <p>
                                  <hr>
                                  „ {{$quote->getBookTitle()}} ” - {{$quote->getBookAuthorName() ." ".$quote->getBookAuthorSurname()}}
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
                                    <form method="post" action="{{'/user/updatePassword', $user->id}}">

                                        {{ csrf_field() }}
                                        {{ method_field('patch') }}

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



@stop

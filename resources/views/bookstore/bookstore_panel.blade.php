@extends('master')
@section('content')

    <div class="row my-5">
        <div class="col-md-3 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-news-list" data-toggle="list" href="#list-news" role="tab" aria-controls="news">Panel Aktualności</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profil</a>
                <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list" href="#list-password" role="tab" aria-controls="password">Zmień hasło</a>

            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="list-news" role="tabpanel" aria-labelledby="list-news-list">
                    <div class="col-12">
                        <div class="table-responsive-md">
                            <table class="table">
                                <table class="table">
                                    <caption>

                                    </caption>
                                    <thead>
                                    <tr>
                                        <th scope="col" {{--style="width: 1%"--}}>#</th>
                                        <th scope="col" style="width: 40%">Tytuł</th>
                                        <th scope="col" style="width: 25%">Opis</th>
                                        <th scope="col" style="width: 15%">Data dodania</th>
                                        <th scope="col" style="width: 10%">Opcje</th>
                                    </tr>
                                    </thead>

                                    @foreach($myArticles as $article)

                                    <tr>
                                        <td scope="row"> {{$loop->iteration}}</td>
                                        <td>{{$article->getTitle()}}</td>
                                        <td>{{Str::limit($article->getContent(),15)}}</td>
                                        <td>{{Str::limit($article->getDate(),10,$end = '')}}</td>
                                        <td>

                                            <div class="btn-group text-center" role="group" aria-label="buttons">
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-search mr-1" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-success btn-sm">
                                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade " id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

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
                                    <form method="post" action="{{'/bookstore/updateProfile', $user->id}}">

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
                                    <form method="post" action="{{'/bookstore/updatePassword', $user->id}}">

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

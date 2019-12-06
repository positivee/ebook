{{--
@extends('master')
@section('content')
--}}

<div class="card my-5">
    <div class="row">
             <div class="col-md-6 row mx-auto justify-content-center align-items-center flex-column border-right">
              {{--  <div class="row mx-auto justify-content-center align-items-center flex-column ">    col d-flex align-items-center justify-content-center --}}
                    <img  class="img-fluid m-2" src="https://img0-placeit-net.s3-accelerate.amazonaws.com/uploads/stage/stage_image/37836/large_thumb_stage.jpg" >
          {{--      </div>--}}
             </div>
        <div class="col-md-6">
            <div class="card-body p-5">
                <h3 class="title mb-1">Tytuł: Lalka</h3>

                    <div class="text-warning">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>

                    <hr>
                    <span>Najniższa cena: </span>
                       <span class="text-success h4">
                            30 PLN
                        </span>
                    <hr>

                <dl>
                    <dt>Opis Książki:</dt>
                    <dd><p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </p></dd>
                </dl>
                <dl >
                    <dt>Rok wydania:</dt>
                    <dd>2019</dd>
                </dl>
                <dl >
                    <dt>Wydawnictwo:</dt>
                    <dd>Agora</dd>
                </dl>
                <dl>
                    <dt>Autor:</dt>
                    <dd>Jan Matejko</dd>
                </dl>
                <dl>
                    <dt>ISBN numer:</dt>
                    <dd>9780781801584</dd>
                </dl>
                <dl>
                    <dt>Kategoria:</dt>
                    <dd>DRAMAT</dd>
                </dl>
                <hr>




            </div>
        </div>
    </div>
</div>



<div class="table-responsive-md">
    <table class="table">
        <table class="table">
            <caption>
                @if (Auth::guest())
                @else
                    @if (Auth::user()->bookstore_id != null)

                            <a href="{{'/bookstore/addbook'}}" class="btn btn-info float-right" role="button">Dodaj ofertę</a>

                    @endif
                @endif
            </caption>
            <thead>
            <tr>
                <th>#</th>
                <th scope="col">Księgarnia</th>
                <th scope="col">Data dodania oferty</th>
                <th scope="col">Data wygaśniecia oferty</th>
                <th scope="col">Cena</th>
                <th scope="col">Link do oferty</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>EMPIK</td>
                <td>10-12-2012</td>
                <td>10-12-2019</td>
                <td>99 zł</td>
                <td>
                    <a href="#">Link</a>

                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>EMPIK</td>
                <td>10-12-2012</td>
                <td>10-12-2019</td>
                <td>99 zł</td>
                <td>
                    <a href="#">Link</a>
                </td>
            </tr>

            </tbody>
        </table>
    </table>
</div>

<div class="card my-5">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h4>Komentarze:</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="one-reivew">
                    <div class="row">
                        <div class="col-md-6">
                            <small>2018-11-12</small>
                        </div>
                        <div class="col-md-6">
                            <small class="float-right">Czytelnik: Kamil Biernacki</small>
                        </div>
                    </div>
                    <div class="row text-success">
                        <div class="col-md-12">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-12">
                            <h6>Worse web hosting company</h6>
                            <p>I think I started out at under $3 per month 5 or 6 years ago. The price has steadily increased and my latest renewal offer was $16.99 per month. Additionally last year my wife started having spam problems and it seems like someone gained access to all her email correspondence. The only place that we could pin it down to was the justhost SMTP server. Support was very evasive when I tried to explain what I thought happened.</p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h4 >Dodaj Swoją Ocenę</h4>
            </div>
            <div class="col-6">
                <a class="float-right mr-4" data-toggle="collapse" href="#collapseReview" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <img src="{{ asset('img/add.png') }}" width="30" height="30" alt="">
                </a>
            </div>

        </div>
        <hr>

        <div class="row">
            <div class="col collapse"  id="collapseReview">
                <form method="POST" >
                    <div class="form-group row ">

                        <label for="email" class="col-4 col-form-label">{{ __('Ocena Książki') }}</label>


                        <div class="rate text-center">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="Ocena 5"></label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="Ocena 4"></label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="Ocena 3"></label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="Ocena 2"></label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="Ocena 1"></label>
                        </div>




                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">{{ __('Tytuł Recenzji') }}</label>
                        <div class="col-8">
                            <input id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"  type="text" required autocomplete="email" >

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">{{ __('Recenzja') }}</label>
                        <div class="col-8">
                            <textarea id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"  type="text" required autocomplete="email" rows="6"></textarea>

                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary"> {{ __('Dodaj recenzję książki') }}</button>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>


        </div>
    </div>
</div>

{{--
@stop--}}

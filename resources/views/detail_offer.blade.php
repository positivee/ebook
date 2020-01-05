
@extends('master')
@section('content')


<div class="card my-5">
    <div class="row">
             <div class="col-md-6 row mx-auto justify-content-center align-items-center flex-column border-right">
              {{--  <div class="row mx-auto justify-content-center align-items-center flex-column ">    col d-flex align-items-center justify-content-center --}}
                    <img  class="img-fluid m-2" src="{{asset('storage/' .$offer->picture)}}" >
          {{--      </div>--}}
             </div>
        <div class="col-md-6">
            <div class="card-body p-5">
                <h3 class="title mb-1">{{$offer->title}}</h3>

                    <div class="text-warning">
                        @if(count(DB::table('evaluations')->where('book_id',$offer->id)->get()) == null)
                            Brak ocen
                        @else
                            @for ($i = 0; $i < 5; $i++)
                                @if($i<=(round(DB::table('evaluations')->where('book_id', $offer->id)->avg('evaluation'),0)))
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                            @endfor
                        @endif
                    </div>

                    <hr>
                    <span>Cena: </span>
                       <span class="text-success h4">
                           {{$price = DB::table('offers')->where('book_id', $offer->id)->min('price')}}-
                           {{$price = DB::table('offers')->where('book_id', $offer->id)->max('price')}}
                           PLN

                        </span>
                    <hr>

                <dl>
                    <dt>Opis Książki:</dt>
                    <dd><p>{{$offer->description}}</p></dd>
                </dl>
                <dl >
                    <dt>Rok wydania:</dt>
                    <dd>{{$offer->year}}</dd>
                </dl>
                <dl >
                    <dt>Wydawnictwo:</dt>
                    <dd>{{$offer->print}}</dd>
                </dl>
                <dl>
                    <dt>Autor:</dt>
                    <dd>{{$offer->author_name . " " . $offer->author_surname}}</dd>
                </dl>
                <dl>
                    <dt>ISBN numer:</dt>
                    <dd>{{$offer->isbn_number}}</dd>
                </dl>
                <dl>
                    <dt>Kategoria:</dt>
                    <dd>{{$category->name}}</dd>
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

            @foreach($offers as $of)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$of->getBookstore()->name}}</td>
                    <td>{{$of->getDateFrom()->format('Y-m-d')}}</td>
                    <td>{{$of->getDateTo()->format('Y-m-d')}}</td>
                    <td>{{$of->getPrice() . " zł" }}</td>
                    <td>
                        <a href="{{$of->getLink()}}">Link</a>

                    </td>
                </tr>

            @endforeach
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

        @if($evaluations == null) <div class="my-2">Brak komenatrzy</div> @endif
        @foreach($evaluations as $ev)
        <div class="row">
            <div class="col-md-12">
                   <div class="one-reivew">
                        <div class="row">
                            <div class="col-md-6">
                                <small>{{Str::limit($ev->getDate(),10,$end = '')}}</small>
                            </div>
                            <div class="col-md-6">
                                <small class="float-right">Czytelnik: {{$ev->getUser()->name . " " . $ev->getUser()->surname}}</small>
                            </div>
                        </div>
                       <div class="row text-success">
                           <div class="col-md-12">
                               @for ($i = 0; $i < 5; $i++)
                                   @if($i<($ev->getEvaluation()))
                                       <i class="fa fa-star"></i>
                                   @else
                                       <i class="fa fa-star-o"></i>
                                   @endif
                               @endfor
                           </div>
                       </div>
                     {{--   <div class="row text-success">
                           <div class="col-md-12">
                               <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                           </div>
                       </div>--}}
                        <div class="row pt-2">
                            <div class="col-md-12">
                                <h6>{{$ev->getTitle()}}</h6>
                                <p>{{$ev->getContent()}}</p>
                            </div>
                        </div>
                    </div>


                <hr>
            </div>
        </div>
        @endforeach

       @if (Auth::guest())
        @else
            @if (Auth::user()->bookstore_id == null)
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
                <form method="POST" action="{{'/user/evaluation'}}" >
                @csrf
                    <div class="form-group row ">
                        <label for="evaluation" class="col-4 col-form-label">{{ __('Ocena Książki') }}</label>

                        <div class="rate text-center">
                            <input type="radio" id="star5" name="evaluation" value="5" />
                            <label for="star5" title="Ocena 5"></label>
                            <input type="radio" id="star4" name="evaluation" value="4" />
                            <label for="star4" title="Ocena 4"></label>
                            <input type="radio" id="star3" name="evaluation" value="3" />
                            <label for="star3" title="Ocena 3"></label>
                            <input type="radio" id="star2" name="evaluation" value="2" />
                            <label for="star2" title="Ocena 2"></label>
                            <input type="radio" id="star1" name="evaluation" value="1" />
                            <label for="star1" title="Ocena 1"></label>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-4 col-form-label">{{ __('Tytuł Recenzji') }}</label>
                        <div class="col-8">
                            <input id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror"  type="text" required autocomplete="title" >

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-4 col-form-label">{{ __('Recenzja') }}</label>
                        <div class="col-8">
                            <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror"  type="text" required autocomplete="content" rows="6"></textarea>

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
                @endif
        @endif

        </div>
    </div>
</div>

@stop

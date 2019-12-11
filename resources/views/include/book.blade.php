@foreach($offers as $offer)

    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card h-100">
            <a href="#"><img class="card-img-top d-block mx-auto p-1 image-size" src="{{$offer->getPicture()}}?showinfo=0" frameborder="0" alt="" ></a>

            <div class="card-body d-flex flex-column">

                <h4 class="card-title">
                    <a href="#">{{ $offer->getTitle() }}</a>
                </h4>

                <dl>
                    <dt >Ocena:</dt>
                    <dd >{{--<div class="text-warning">
                            @for ($i = 0; $i < 5; $i++)
                                @if($i<=(round(DB::table('evaluations')->where('book_id', tutaj id)->avg('evaluation'),0)))
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                            @endfor
                        </div>--}}
                    </dd>
                </dl>
                <dl>
                    <dt>Opis Książki:</dt>
                    <dd><p>{{Str::limit($offer->getDescription(),150)}}</p></dd>
                </dl>
                <dl>
                    <dt>Autor:</dt>
                    <dd><p >{{$offer->getAuthorName() ." ".$offer->getAuthorSurname()}}</p></dd>
                </dl>
                <dl>
                    <dt>Data wydania:</dt>
                    <dd><p>{{$offer->getYear()}}</p></dd>
                </dl>

                <a href="/offer/{{$offer->getBook()->id}}" class="btn btn-primary mt-auto">Sprawdź oferty</a>
            </div>
        </div>
    </div>
@endforeach

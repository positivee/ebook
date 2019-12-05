{{--
@extends('master')
@section('content')
--}}
@if (Auth::guest())
    @else
        @if (Auth::user()->bookstore_id != null)
            <a href="{{'/bookstore/addbook'}}" class="btn btn-info" role="button">Dodaj ofertę</a>

        @endif
@endif


<div class="table-responsive-md">
    <table class="table">
        <table class="table">
            <caption>Lista ofert</caption>
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
                <td>1</td>
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








{{--
@stop--}}

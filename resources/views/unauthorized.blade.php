@extends('master')
@section('content')

   <div class="alert alert-danger my-5" role="alert">
       Nie masz dostępu do tej strony. Dostęp tylko dla zalogowanych jako: ‘{{$role}}’
   </div>

    @stop

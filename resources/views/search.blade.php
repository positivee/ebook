@extends('master')
@section('content')


    <div class="col-xs-8 col-md-8 single-video">
        <div class="card">
            <div class="embed-responsive embed-responsive-16by9">
                <div class="card-content">

                    <h4>Wyszukiwanie</h4>

                    <!-- Formularz do wyszukiwania zaawansowanego -->

                    <form method="POST" action="{{'/search/find'}}">
                    @csrf

                        <!--pole na tytuł-->

                        <div class="form-group">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Tytuł') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" name="title" >
                            </div>
                        </div>

                        <!--pole na imie autora-->

                        <div class="form-group">
                            <label for="author_name" class="col-md-4 col-form-label text-md-right">{{ __('Imię Autora') }}</label>
                            <div class="col-md-6">
                                <input id="author_name" type="text" name="author_name">
                            </div>
                        </div>

                        <!--pole na nazwisko autora-->

                        <div class="form-group">
                            <label for="author_surname" class="col-md-4 col-form-label text-md-right">{{ __('Nazwisko Autora') }}</label>
                            <div class="col-md-6">
                                <input id="author_surname" type="text" name="author_surname">
                            </div>
                        </div>

                        <!--pole na numer ISBN-->

                        <div class="form-group">
                            <label for="isbn_number" class="col-md-4 col-form-label text-md-right">{{ __('Numer ISBN') }}</label>
                            <div class="col-md-6">
                                <input id="isbn_number" type="text" name="isbn_number">
                            </div>
                        </div>


                        <!--pole na wydawnictwo-->

                        <div class="form-group">
                            <label for="print" class="col-md-4 col-form-label text-md-right">{{ __('Wydawnictwo') }}</label>
                            <div class="col-md-6">
                                <input id="print" type="text" name="print">
                            </div>
                        </div>


                        <!-- pole na cene od-->

                        <div class="form-group">
                            <label for="price_from" class="col-md-4 col-form-label text-md-right">{{ __('Cena od') }}</label>
                            <div class="col-md-6">
                                <input id="price_from" type="number" min="0" max="999.00" step="0.01" name="price_from">
                            </div>
                        </div>

                        <!-- pole na cene do-->

                        <div class="form-group">
                            <label for="price_to" class="col-md-4 col-form-label text-md-right">{{ __('Cena do') }}</label>
                            <div class="col-md-6">
                                <input id="price_to" type="number" min="0" max="999.00" step="0.01" name="price_to">
                            </div>
                        </div>



                        <!-- pole na kategorie-->
                        <div class="form-group">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Kategoria') }}</label>

                                <?php
                                    $hostname = "localhost";
                                    $username = "olaola";
                                    $password = "root";
                                    $databaseName = "ebook";

                                    $connection = mysqli_connect($hostname, $username, $password, $databaseName);
                                    $query = "SELECT * from `categories`";
                                    $result = mysqli_query($connection, $query);
                                ?>

                            <select name="category">
                                   <?php while($row = mysqli_fetch_array($result)):;?>
                                <option><?php echo $row[1]; ?></option>
                                <?php endwhile;?>

                            </select>

                        </div>



                        <!--przycisk-->
                        <div class="form-group">
                            <div class="col-md-4 col-form-label text-md-right">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary col-md-20">
                                        {{ __('Szukaj') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                    if(isset($_POST['submit'])){
                        $selected_val = $_POST['category'];  // Storing Selected Value In Variable
                        echo "You have selected :" .$selected_val;  // Displaying Selected Value
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


@stop

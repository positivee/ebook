<?php

namespace Tests\Unit;

use App\Book;
use App\Bookstore;
use App\Dto\BookOutputFactory;
use App\Dto\CreateBookFactory;
use App\Dto\CreateOfferFactory;
use App\Dto\OfferFetchInputFactory;
use App\Dto\OfferOutput;
use App\Dto\OfferOutputFactory;
use App\Dto\UserOutputFactory;
use App\Evaluation;
use App\Model\BookstoreSearchOffer;
use App\Model\UserSearchOffer;
use App\Offer;
use App\Quote;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\Concerns\RefreshDatabase;
use Tests\TestCase;
use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

   use RefreshDatabase;

    public function test_some_random() {
        $user = new User();
        $user->name = 'Adam';
        $user->surname = 'Grzyb';
        $user->email = 'grzyb@ab.com';
        $user->password = 'grryb';
        $user->bookstore_id = 1;

        $savedUser = $user->save();
        $this->assertTrue($savedUser);

        $user1 = new User();
        $user1->name = 'Ireneusz';
        $user1->surname = 'Robak';
        $user1->email = 'robak@ab.com';
        $user1->password = 'robak';
        $user1->bookstore_id = null;

        $savedUser1 = $user1->save();
        $this->assertTrue($savedUser1);

        $this->assertDatabaseHas('users', [
           'surname' => 'Robak'
        ]);
    }

    public function test_insert_data_to_bookstores() {
        $bookstore = new Bookstore();
        $bookstore->name = 'BBB';

        $savedBookstore = $bookstore->save();
        $this->assertTrue($savedBookstore);



    }


    public function test_insert_data_to_books(){
        $book = new Book();
        $book->title = 'Sobowtór';
        $book->year = '2014';
        $book->print = 'Zielona Sowa';
        $book->picture = 'http:/obrazek.jpg';
        $book->description = 'Thriller medyczny';
        $book->author_name = 'Tess';
        $book->author_surname = 'Gerritsen';
        $book->isbn_number = '1234567834216';
        $book->category_id = 1;

        $savedBook = $book->save();
        $this->assertTrue($savedBook);
    }

    public function test_insert_few_records_to_offers() {
        $offer = new Offer();
        $offer->price = 23.45;
        $offer->date_from = '2019-01-20';
        $offer->date_to = '2019-03-30';
        $offer->link = 'http:/jakislinkndoofery';
        $offer->bookstore_id = 1;
        $offer->book_id = 1;

        $savedOffer = $offer->save();
        $this->assertTrue($savedOffer);
    }

    public function test_insert_to_quotes() {

        $quote = new Quote();
        $quote->content = 'Uważąj na swoje najskrytsze tajemnice';
        $quote->date= '2019-01-20';
        $quote->book_info = 'z ksiązki Dom na Wyrębach';
        $quote->user_id = 1;


        $savedQuote = $quote->save();
        $this->assertTrue($savedQuote);
    }

    public function test_insert_to_evaluations() {
        $evaluation = new Evaluation();
        $evaluation->content = 'super';
        $evaluation->date = '2018-02-12';
        $evaluation->evaluation = 5;
        $evaluation->book_id = 1;
        $evaluation->user_id = 1;

        $savedEvaluation = $evaluation->save();
        $this->assertTrue($savedEvaluation);

        $evaluation1 = new Evaluation();
        $evaluation1->content = 'fajna';
        $evaluation1->date = '2018-02-12';
        $evaluation1->evaluation = 4;
        $evaluation1->book_id = 2;
        $evaluation1->user_id = 2;

        $savedEvaluation1 = $evaluation1->save();
        $this->assertTrue($savedEvaluation1);
    }

    /* ------------------------------------------ testy do CreateOffer---------------------------------------------*/


    public function test_create_offer_with_correct_data() {

       $createOfferDto = CreateOfferFactory::create([
                'book_id' => 1,
                'price' => 30.55,
                'date_from' => '2018-01-20',
                'date_to' => '2019-01-20',
                'link' => 'http:/jakis/link'
            ], Bookstore::findOrFail(1));

        $this->assertInstanceOf('App\Dto\CreateOffer', $createOfferDto);
    }


    public function test_create_offer_with_invalid_price() {

        //oczekiwany exception
        $this->expectException(ModelNotFoundException::class);
        CreateOfferFactory::create([
                'book_id' => 1,
                'price' => 'tgrfgvdd',
                'date_from' => '2018-01-20',
                'date_to' => '2019-01-20',
                'link' => 'http:/jakis/link'
            ], Bookstore::findOrFail(1));

    }


    public function test_create_offer_with_invalid_date() {

        //oczekiwany exception
        $this->expectException(ModelNotFoundException::class);
        CreateOfferFactory::create([
                'book_id' => 1,
                'price' => 30.55,
                'date_from' => '2018-00-00',
                'date_to' => '2019-01-20',
                'link' => 'http:/jakis/link'
            ], Bookstore::findOrFail(1));
    }



    public function test_create_offer_with_invalid_date_to() {

        //oczekiwany exception
        $this->expectException(ModelNotFoundException::class);
        CreateOfferFactory::create([
                'book_id' => 1,
                'price' => 30.55,
                'date_from' => '2018-01-20',
                'date_to' => '2017-01-20',
                'link' => 'http:/jakis/link'
            ], Bookstore::findOrFail(1));
    }


    public function test_create_offer_with_invalid_link() {

        $this->expectException(ModelNotFoundException::class);

        CreateOfferFactory::create([
                'book_id' => 1,
                'price' => 30.05,
                'date_from' => '2018-01-20',
                'date_to' => '2019-01-20',
                'link' => 'http:/jakis/linksfarfgvfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
            fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffs
            sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssfffffffd
            dddddddddddddddddddddddddddddddddddddxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc
            xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            cccccccccccccccccccccccccccccccccccccccccccccccccccccc'
            ], Bookstore::findOrFail(1));

    }

    /* ------------------------------------------ testy do CreateBook---------------------------------------------*/

    public function test_create_book_with_correct_data() {

        $createBookDto = CreateBookFactory::create([
            'title' => 'Dom na wyrębach',
            'year' => '2013',
            'print' => 'BestBooks',
            'picture' => 'http:/link/do/zdj1',
            'description' => 'trzymający w napięciu horror',
            'author_name' => 'Stefan',
            'author_surname' => 'Darda',
            'isbn_number' => '1234567893452',
            'category_id' => 1

        ]);


        //zwróci wartosc instancji create offer nie jest Create Offer
        $this->assertInstanceOf('App\Dto\CreateBook', $createBookDto);

    }


    public function test_create_book_with_empty_isbn_number() {
        //puste pola, które nie są są opcjonalne
        $this->expectException(ModelNotFoundException::class);
        CreateBookFactory::create([
            'title' => 'Dom na wyrębach',
            'year' => '2013',
            'print' => 'BestBooks',
            'picture' => 'http:/zdj',
            'description' => '',
            'author_name' => 'Stefan',
            'author_surname' => 'Darda',
            'isbn_number' => '',
            'category_id' => 1

        ]);

    }

    public function test_create_book_with_invalid_title() {
        $this->expectException(ModelNotFoundException::class);
        CreateBookFactory::create([
                'title' => 243253,
                'year' => '2013',
                'print' => 'BestBooks',
                'picture' => 'http:/zdj',
                'description' => '',
                'author_name' => 'Stefan',
                'author_surname' => 'Darda',
                'isbn_number' => '',
                'category_id' => 1
            ]);
    }


    public function test_create_book_with_invalid_year() {
        $this->expectException(ModelNotFoundException::class);
            CreateBookFactory::create([
                'title' => 'Dom na Wyrębach',
                'year' => '20134523',
                'print' => 'BestBooks',
                'picture' => 'http:/zdj',
                'description' => '',
                'author_name' => 'Stefan',
                'author_surname' => 'Darda',
                'isbn_number' => '',
                'category_id' => 1
            ]);

    }


    public function test_create_book_with_invalid_isbn_number()
    {
        $this->expectException(ModelNotFoundException::class);
        CreateBookFactory::create([
            'title' => 'Dom na Wyrębach',
            'year' => '2013',
            'print' => 'BestBooks',
            'picture' => 'http:/zdj',
            'description' => '',
            'author_name' => 'Stefan',
            'author_surname' => 'Darda',
            'isbn_number' => '123',
            'category_id' => 1
        ]);

    }


    public function test_create_book_with_invalid_author_name() {
        $this->expectException(ModelNotFoundException::class);
        CreateBookFactory::create([
            'title' => 'Dom na Wyrębach',
            'year' => '2013',
            'print' => 'BestBooks',
            'picture' => 'http:/dfgvdrf',
            'description' => 'frfgdgsgt',
            'author_name' => 'Stefannnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn',
            'author_surname' => 'Darda',
            'isbn_number' => '1235673265345',
            'category_id' => 1
        ]);
    }

    public function test_create_book_with_invalid_author_surname_empty() {
        $this->expectException(ModelNotFoundException::class);
        CreateBookFactory::create([
            'title' => 'Dom na Wyrębach',
            'year' => '2013',
            'print' => 'BestBooks',
            'picture' => 'http:/dfgvdrf',
            'description' => 'frfgdgsgt',
            'author_name' => 'Stefan',
            'author_surname' => '',
            'isbn_number' => '1235673265345',
            'category_id' => 1
        ]);
    }


    /*  --------------------------- testy do BookOutput  do OfferOutput i do UserOutput ------------------------------------------*/

    public function test_book_output_with_correct_data() {
        $bookOutput = BookOutputFactory::create([
            'book_id' => 1,
            'title' => 'Sobowtor',
            'year' => '2014',
            'print' => 'Sowa',
            'picture' => 'link/zdj/1',
            'description' => 'Thriller Medyczny',
            'author_name' => 'Tess',
            'author_surname' => 'Gerritsen',
            'isbn_number' => '2345671287456',
            'category_id' => 1
        ]);


        $this->assertEquals($bookOutput->getId(), 1);
        $this->assertEquals($bookOutput->getTitle(), 'Sobowtor');
        $this->assertEquals($bookOutput->getYear(), '2014');
        $this->assertEquals($bookOutput->getPrint(), 'Sowa');
        $this->assertEquals($bookOutput->getPicture(), 'link/zdj/1');
        $this->assertEquals($bookOutput->getDescription(), 'Thriller Medyczny');
        $this->assertEquals($bookOutput->getAuthorName(), 'Tess');
        $this->assertEquals($bookOutput->getAuthorSurname(), 'Gerritsen');
        $this->assertEquals($bookOutput->getIsbnNumber(), '2345671287456');
        $this->assertEquals($bookOutput->getCategory()->id, 1);
    }


    public function test_book_output_with_invalid_title() {
        $bookOutput = BookOutputFactory::create([
            'book_id' => 1,
            'title' => 'Sobowtor',
            'year' => '2014',
            'print' => 'Sowa',
            'picture' => 'link/zdj/1',
            'description' => 'Thriller Medyczny',
            'author_name' => 'Tess',
            'author_surname' => 'Gerritsen',
            'isbn_number' => '2345671287456',
            'category_id' => 1
        ]);

        $this->assertEquals($bookOutput->getId(), 1);
        $this->assertNotEquals($bookOutput->getTitle(), 'Dom na Wyrębach');
        $this->assertEquals($bookOutput->getYear(), '2014');
        $this->assertEquals($bookOutput->getPrint(), 'Sowa');
        $this->assertEquals($bookOutput->getPicture(), 'link/zdj/1');
        $this->assertEquals($bookOutput->getDescription(), 'Thriller Medyczny');
        $this->assertEquals($bookOutput->getAuthorName(), 'Tess');
        $this->assertEquals($bookOutput->getAuthorSurname(), 'Gerritsen');
        $this->assertEquals($bookOutput->getIsbnNumber(), '2345671287456');
        $this->assertEquals($bookOutput->getCategory()->id, 1);

    }

    public function test_book_output_with_invalid_print() {
        $bookOutput = BookOutputFactory::create([
            'book_id' => 1,
            'title' => 'Sobowtor',
            'year' => '2014',
            'print' => 'Ska',
            'picture' => 'link/zdj/1',
            'description' => 'Thriller Medyczny',
            'author_name' => 'Tess',
            'author_surname' => 'Gerritsen',
            'isbn_number' => '2345671287456',
            'category_id' => 1
        ]);

        $this->assertEquals($bookOutput->getId(), 1);
        $this->assertEquals($bookOutput->getTitle(), 'Sobowtor');
        $this->assertEquals($bookOutput->getYear(), '2014');
        $this->assertNotEquals($bookOutput->getPrint(), 'Sowa');
        $this->assertEquals($bookOutput->getPicture(), 'link/zdj/1');
        $this->assertEquals($bookOutput->getDescription(), 'Thriller Medyczny');
        $this->assertEquals($bookOutput->getAuthorName(), 'Tess');
        $this->assertEquals($bookOutput->getAuthorSurname(), 'Gerritsen');
        $this->assertEquals($bookOutput->getIsbnNumber(), '2345671287456');
        $this->assertEquals($bookOutput->getCategory()->id, 1);

    }

    public function test_book_output_with_invalid_category_id() {
        $bookOutput = BookOutputFactory::create([
            'book_id' => 1,
            'title' => 'Sobowtor',
            'year' => '2014',
            'print' => 'Sowa',
            'picture' => 'link/zdj/1',
            'description' => 'Thriller Medyczny',
            'author_name' => 'Tess',
            'author_surname' => 'Gerritsen',
            'isbn_number' => '2345671287456',
            'category_id' => 1
        ]);

        $this->assertEquals($bookOutput->getId(), 1);
        $this->assertEquals($bookOutput->getTitle(), 'Sobowtor');
        $this->assertEquals($bookOutput->getYear(), '2014');
        $this->assertEquals($bookOutput->getPrint(), 'Sowa');
        $this->assertEquals($bookOutput->getPicture(), 'link/zdj/1');
        $this->assertEquals($bookOutput->getDescription(), 'Thriller Medyczny');
        $this->assertEquals($bookOutput->getAuthorName(), 'Tess');
        $this->assertEquals($bookOutput->getAuthorSurname(), 'Gerritsen');
        $this->assertEquals($bookOutput->getIsbnNumber(), '2345671287456');
        $this->assertNotEquals($bookOutput->getCategory()->id, 4);

    }




    public function test_offer_output_with_correct_data() {
        $offerOutput = OfferOutputFactory::create([
            'bookstore_id' => 1,
            'book_id' => 1,
            'price' => 20.67,
            'date_from' => '2019-01-20',
            'date_to' => '2019-07-20',
            'link' => 'http:/link',
            'title' => 'Sobowtor',
            'year' => '2014',
            'print' => 'Sowa',
            'picture' => 'link/zdj/1',
            'description' => 'Thriller Medyczny',
            'author_name' => 'Tess',
            'author_surname' => 'Gerritsen',
            'isbn_number' => '2345671287456',
            'category_id' => 1
        ]);

        $this->assertEquals($offerOutput->getBookstore()->id, 1);
        $this->assertEquals($offerOutput->getBook()->id, 1);
        $this->assertEquals($offerOutput->getPrice(), 20.67);
        $this->assertEquals($offerOutput->getDateFrom()->format('Y-m-d'), '2019-01-20');
        $this->assertEquals($offerOutput->getDateTo()->format('Y-m-d'), '2019-07-20');
        $this->assertEquals($offerOutput->getLink(), 'http:/link');
        $this->assertEquals($offerOutput->getTitle(), 'Sobowtor');
        $this->assertEquals($offerOutput->getYear(), '2014');
        $this->assertEquals($offerOutput->getPrint(), 'Sowa');
        $this->assertEquals($offerOutput->getPicture(), 'link/zdj/1');
        $this->assertEquals($offerOutput->getDescription(), 'Thriller Medyczny');
        $this->assertEquals($offerOutput->getAuthorName(), 'Tess');
        $this->assertEquals($offerOutput->getAuthorSurname(), 'Gerritsen');
        $this->assertEquals($offerOutput->getIsbnNumber(), '2345671287456');
        $this->assertEquals($offerOutput->getCategory()->id, 1);

    }

    public function test_offer_output_with_invalid_category_id() {
        $offerOutput = OfferOutputFactory::create([
            'bookstore_id' => 2,
            'book_id' => 2,
            'price' => 30.00,
            'date_from' => '2019-01-20',
            'date_to' => '2019-07-20',
            'link' => 'http:/link2',
            'title' => 'Nietoperz',
            'year' => '2017',
            'print' => 'Ska',
            'picture' => 'link/zdj/2',
            'description' => 'Kryminał',
            'author_name' => 'Jo',
            'author_surname' => 'Nesbo',
            'isbn_number' => '5483698321899',
            'category_id' => 2
        ]);

        $this->assertEquals($offerOutput->getBookstore()->id, 2);
        $this->assertEquals($offerOutput->getBook()->id, 2);
        $this->assertEquals($offerOutput->getPrice(), 30);
        $this->assertEquals($offerOutput->getDateFrom()->format('Y-m-d'), '2019-01-20');
        $this->assertEquals($offerOutput->getDateTo()->format('Y-m-d'), '2019-07-20');
        $this->assertEquals($offerOutput->getLink(), 'http:/link2');
        $this->assertEquals($offerOutput->getTitle(), 'Nietoperz');
        $this->assertEquals($offerOutput->getYear(), '2017');
        $this->assertEquals($offerOutput->getPrint(), 'Ska');
        $this->assertEquals($offerOutput->getPicture(), 'link/zdj/2');
        $this->assertEquals($offerOutput->getDescription(), 'Kryminał');
        $this->assertEquals($offerOutput->getAuthorName(), 'Jo');
        $this->assertEquals($offerOutput->getAuthorSurname(), 'Nesbo');
        $this->assertEquals($offerOutput->getIsbnNumber(), '5483698321899');
        $this->assertNotEquals($offerOutput->getCategory()->id, 1);

    }

    public function test_user_output_with_correct_data() {
        $userOutput = UserOutputFactory::create([
            'id' => 1,
            'name' => 'Adam',
            'surname' => 'Kowalski',
            'email' => 'kowal@wp.pl'
        ]);

        $this->assertEquals($userOutput->getUser()->id, 1);
        $this->assertEquals($userOutput->getName(), 'Adam');
        $this->assertEquals($userOutput->getSurname(), 'Kowalski');
        $this->assertEquals($userOutput->getEmail(), 'kowal@wp.pl');

    }

    public function test_user_output_with_correct_data_for_second_user() {
        $userOutput = UserOutputFactory::create([
            'id' => 2,
            'name' => 'Jan',
            'surname' => 'Nowak',
            'email' => 'nowak@o2.pl'
        ]);

        $this->assertEquals($userOutput->getUser()->id, 2);
        $this->assertEquals($userOutput->getName(), 'Jan');
        $this->assertEquals($userOutput->getSurname(), 'Nowak');
        $this->assertEquals($userOutput->getEmail(), 'nowak@o2.pl');

    }

    public function test_user_output_with_invalid_name() {
        $userOutput = UserOutputFactory::create([
            'id' => 2,
            'name' => 'Jan',
            'surname' => 'Nowak',
            'email' => 'nowak@o2.pl'
        ]);

        $this->assertEquals($userOutput->getUser()->id, 2);
        $this->assertNotEquals($userOutput->getName(), 'Andrzej');
        $this->assertEquals($userOutput->getSurname(), 'Nowak');
        $this->assertEquals($userOutput->getEmail(), 'nowak@o2.pl');

    }




    /* ------------------------------ testy do searchInput -----------------------------------------------*/




    public function test_search_with_title() {

        //asercja sprawdza czy są oferty z podanym tytułem
        //(oczkekuję, że jest przynajmniej jedna taka oferta)

        $searchInput = OfferFetchInputFactory::create(['title' => 'Sobowtor']);

        $model = new UserSearchOffer();
        $offerCollection = $model->searchOffer($searchInput);

        $this->assertNotEmpty($offerCollection);
        foreach ($offerCollection as $offerOutput) {
            /** @var OfferOutput $offerOutput */
            $this->assertEquals($offerOutput->getTitle(), 'Sobowtor');
        }


    }


    public function test_search_with_author_name() {

        //asercja sprawdza czy są oferty z podanym imieniem autora
        //(oczkekuję, że są przynajmniej dwie takie oferty)

        $searchInput = OfferFetchInputFactory::create(['author_name' => 'Simon']);

        $model = new UserSearchOffer();
        $offerCollection = $model->searchOffer($searchInput);

        $this->assertNotEmpty($offerCollection);
        foreach ($offerCollection as $offerOutput) {
            /** @var OfferOutput $offerOutput */
            $this->assertEquals($offerOutput->getAuthorName(), 'Simon');
        }
    }



    public function test_search_with_author_name_and_surname() {

        //asercja sprawdza czy są oferty z podanym imieniem i nazwiskiem autora
        //(oczkekuję, że są przynajmniej dwie takie oferty)

        $searchInput = OfferFetchInputFactory::create(['author_name' => 'Andrzej', 'author_surname' => 'Franciszek']);

        $model = new UserSearchOffer();
        $offerCollection = $model->searchOffer($searchInput);

        $this->assertNotEmpty($offerCollection);
        foreach ($offerCollection as $offerOutput) {
            /** @var OfferOutput $offerOutput */
            $this->assertEquals($offerOutput->getAuthorName(), 'Andrzej');
            $this->assertEquals($offerOutput->getAuthorSurname(), 'Franciszek');
        }
    }


    public function test_search_with_print()
    {

        //asercja sprawdza czy są oferty z podanym wydawnictwem ,
        //(oczkekuję, że są przynajmniej 3 taka oferty)

        $searchInput = OfferFetchInputFactory::create(['print' => 'Znak']);

        $model = new UserSearchOffer();
        $offerCollection = $model->searchOffer($searchInput);

        $this->assertNotEmpty($offerCollection);
        foreach ($offerCollection as $offerOutput) {
            /** @var OfferOutput $offerOutput */
            $this->assertEquals($offerOutput->getPrint(), 'Znak');
        }
    }



    public function test_search_with_isbn() {

        //asercja sprawdza czy są oferty z danym numerem isbn
        //oczekuję przynajmniej dwóch takich ofert
        //(różne wydawnictwa mogą mieć różne numery isbn)

        $searchInput = OfferFetchInputFactory::create(['isbn_number' => '5554443257986']);

        $model = new UserSearchOffer();
        $offerCollection = $model->searchOffer($searchInput);

        $this->assertNotEmpty($offerCollection);
        foreach ($offerCollection as $offerOutput) {
            /** @var OfferOutput $offerOutput */
            $this->assertEquals($offerOutput->getIsbnNumber(), '5554443257986');
        }
    }



    public function test_search_with_category() {

        //asercja sprawdza czy są oferty, których kategoria to Biografia (id=8)
        //oczekuję przynajmniej 3 takich ofert

        $searchInput = OfferFetchInputFactory::create(['category_id' => 8]);

        $model = new UserSearchOffer();
        $offerCollection = $model->searchOffer($searchInput);

        $this->assertNotEmpty( $offerCollection);


        foreach ($offerCollection as $offerOutput) {
            /** @var OfferOutput $offerOutput */
            $this->assertEquals($offerOutput->getCategory()->id, 8);
        }
    }


    public function test_search_with_price_from()
    {
        //asercja sprawdza czy są oferty powyżej bądź równe 30zł,
        //oczekuje przynajmniej 8 takich ofert

        $searchInput = OfferFetchInputFactory::create(['price_from' => 30.00]);

        $model = new UserSearchOffer();
        $offerCollection = $model->searchOffer($searchInput);

        $this->assertNotEmpty( $offerCollection);

        foreach ($offerCollection as $offerOutput) {
            /** @var OfferOutput $offerOutput */
            $this->assertGreaterThanOrEqual(30, $offerOutput->getPrice());
        }

    }

    public function test_search_with_price_to()
    {
        //asercja sprawdza czy są oferty poniżej bądź równe 20zł,
        //oczekuje przynajmniej 5 takich ofert

        $searchInput = OfferFetchInputFactory::create(['price_to' => 20.00]);

        $model = new UserSearchOffer();
        $offerCollection = $model->searchOffer($searchInput);

        $this->assertNotEmpty( $offerCollection);

        foreach ($offerCollection as $offerOutput) {
            /** @var OfferOutput $offerOutput */
            $this->assertLessThanOrEqual(20, $offerOutput->getPrice());
        }

    }


    public function test_search_with_price_from_to()
    {
        //asercja sprawdza czy są oferty z zakresu ceny do 18zł do 25zł
        // oczekuje przynajmniej dwóch takich ofert

        $searchInput = OfferFetchInputFactory::create(['price_from' => 18.00, 'price_to' => 20.00]);

        $model = new UserSearchOffer();
        $offerCollection = $model->searchOffer($searchInput);

        $this->assertNotEmpty( $offerCollection);

        foreach ($offerCollection as $offerOutput) {
            /** @var OfferOutput $offerOutput */
            $this->assertGreaterThanOrEqual(18, $offerOutput->getPrice());
            $this->assertLessThanOrEqual(20, $offerOutput->getPrice());
        }

    }

}

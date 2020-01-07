<?php

class DbOperation
{
    //Database connection link
    private $con;
 
    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';
 
        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();
 
        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
		
    }
	
	
	
//User
	function createUser($name,
						$surname,
						$email,
						$password){
		$stmt = $this->con->prepare(
						"INSERT INTO users 
						(name, surname, email, password)
						VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss",
						$name,
						$surname,
						$email,
						$password);
	
		if($stmt->execute())
			return true; 
		return false; 
	}

	function getUsers(){
		$stmt = $this->con->prepare("SELECT * from users");
		$stmt->execute();
		$stmt->bind_result($id, $name, $surname, $email, $emailVerifiedAt, $password, $bookstoreId, $rememberToken, $createdAt, $updatedAt);
		
		$users = array(); 
		
		while($stmt->fetch()){
			$user  = array();
			$user['id'] = $id; 
			$user['name'] = $name; 
			$user['surname'] = $surname; 
			$user['email'] = $email; 
			$user['emailVerifiedAt'] = $emailVerifiedAt; 
			$user['password'] = $password; 
			$user['bookstoreId'] = $bookstoreId; 
			$user['rememberToken'] = $rememberToken; 
			$user['createdAt'] = $createdAt; 
			$user['updatedAt'] = $updatedAt; 

			array_push($users, $user); 
		}
		
		return $users; 
	}
		
	function getUserId($email, $password){
		$stmt = $this->con->prepare("SELECT id from users where email = ? and password = ?");
		$stmt->bind_param("ss", $email, $password);
				

		$stmt->execute();
		$stmt->bind_result($id);
		$stmt->fetch();
		return $id;
	}
	
		function getUser($id){
		$stmt = $this->con->prepare("SELECT name, surname, email, password from users where id = 3");
				
		$stmt->execute();
		$stmt->bind_result($name, $surname, $email, $password);
		$stmt->fetch();
		$user = array();
			$user['name'] = $name; 
			$user['surname'] = $surname; 
			$user['email'] = $email; 
			$user['password'] = $password; 
		return $user;
	}	
	
	function updateUser($id, $name, $surname, $email){
		$stmt = $this->con->prepare("UPDATE users SET name = ?, surname = ?, email = ? WHERE id = ?");
		$stmt->bind_param("ssi", $name, $surname, $email, $id);
		
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	function changePassword($password, $newPassword, $id){
		$stmt = $this->con->prepare("UPDATE users SET password = ? WHERE password = ? AND id = ? ");
		$stmt->bind_param("sss", $newPassword, $password, $id);
		
		if($stmt->execute())
			return true; 
		return false; 
	}	
	
	function recoverPassword($password, $email){
		$stmt = $this->con->prepare("UPDATE users SET password = ? WHERE email = ? ");
		$stmt->bind_param("ss", $password, $email);
		
		if($stmt->execute())
			return true; 
		return false; 
	}

	function deleteUser($id){
		$stmt = $this->con->prepare("DELETE FROM users WHERE id = ? ");
		$stmt->bind_param("i", $id);

		if($stmt->execute()){
			return true; 
		} else { 
			return false;
		}
	}

	
//Book	
	function getBooks($userId){
		$stmt = $this->con->prepare("SELECT DISTINCT b.id, title, year, print, file, picture, description, author_name, author_surname, isbn_number, category_id
									from books b
                                    join offers o 
                                    ON o.book_id = b.id
									left join transactions t 
									on t.book_id = b.id
                                    WHERE t.user_id = 1");
		$stmt->execute();
		$stmt->bind_result($id, $title, $year, $print, $file, $picture, $description, $author_name, $author_surname, $isbn_number, $category_id);
		
		$books = array(); 
		
		while($stmt->fetch()){
			$book  = array();
			$book['id'] = $id; 
			$book['title'] = $title; 
			$book['year'] = $year; 
			$book['print'] = $print; 
			$book['file'] = $file; 
			$book['picture'] = $picture; 
			$book['description'] = $description; 
			$book['authorName'] = $author_name; 
			$book['authorSurname'] = $author_surname; 
			$book['isbn'] = $isbn_number; 
			$book['categoryID'] = $category_id; 

			array_push($books, $book); 
		}
		
		return $books; 
	}


//News
	function getNews(){
		$stmt = $this->con->prepare("SELECT a.id, content, title, b.name, photo from articles a
									left join bookstores b on a.bookstore_id = b.id");
	if(!$stmt){
       echo "Prepare failed: (". $this->con->errno.") ".$this->con->error."<br>";
    }

		$stmt->execute();
		$stmt->bind_result($id, $content, $title, $bookStore, $photo);
		
		$allNews = array(); 
		
		while($stmt->fetch()){
			$news = array();
			$news['id'] = $id; 
			$news['content'] = $content; 
			$news['title'] = $title; 
			$news['bookStore'] = $bookStore; 
			$news['photo'] = $photo; 
			array_push($allNews, $news);
		}
		
		return $allNews; 

	}
	
	
	
//Quotes
	function getUserQuotes($userId){
		$stmt = $this->con->prepare("SELECT q.id, content, book_title, b.picture from quotes q
									join books b on b.title = q.book_title
									where q.user_id = 1");
		//$stmt->bind_param("i", $userId);

		$stmt->execute();
		$stmt->bind_result($id, $content, $bookTitle, $picture);
		
		$quotes = array(); 
		
		while($stmt->fetch()){
			$quote  = array();
			$quote['id'] = $id; 
			$quote['content'] = $content;
			$quote['bookTitle'] = $bookTitle;
			$quote['picture'] = $picture;

			array_push($quotes, $quote); 
		}
		
		return $quotes; 
	}
	
	function getBookQuotes($userId){
		$stmt = $this->con->prepare("SELECT q.id, content, book_title, b.picture from quotes q
									join books b on b.title = q.book_title
                                    join transactions t on b.id = t.book_id 
									where t.user_id = 1");
		//$stmt->bind_param("i", $userId);
		$stmt->execute();
		$stmt->bind_result($id, $content, $bookTitle, $picture);
		
		$quotes = array(); 
		
		while($stmt->fetch()){
			$quote  = array();
			$quote['id'] = $id; 
			$quote['content'] = $content;
			$quote['bookTitle'] = $bookTitle;
			$quote['picture'] = $picture;


			array_push($quotes, $quote); 
		}
		
		return $quotes; 
	}	
	
	function getBookComments($bookId){
		$stmt = $this->con->prepare("SELECT e.id, content, evaluation, concat(u.name,' ', u.surname) as username from evaluations e
									left join users u on e.user_id = u.id
									where book_id = 1");
		//$stmt->bind_param("i", $bookId);

		$stmt->execute();
		$stmt->bind_result($id, $content, $rating, $username);
		
		$comments = array(); 
		
		while($stmt->fetch()){
			$comment  = array();
			$comment['id'] = $id; 
			$comment['content'] = $content;
			$comment['rating'] = $rating;
			$comment['username'] = $username;

			array_push($comments, $comment); 
		}
		
		return $comments; 
	}	
	
	function getAuthorBooks($authorName, $authorSurname){
		$stmt = $this->con->prepare("SELECT DISTINCT b.id, title, year, print, file, picture, description, concat(author_name,' ', author_surname)
									from books b
                                    join offers o 
                                    ON o.book_id = b.id
                                    WHERE author_name = ? AND author_surname = ?");
		$stmt->bind_param("ss", $authorName, $authorSurname);
		$stmt->execute();
		$stmt->bind_result($id, $title, $year, $print, $file, $picture, $description, $author);
		
		$books = array(); 
		
		while($stmt->fetch()){
			$book  = array();
			$book['id'] = $id; 
			$book['title'] = $title; 
			$book['year'] = $year; 
			$book['print'] = $print; 
			$book['file'] = $file; 
			$book['picture'] = $picture; 
			$book['description'] = $description; 
			$book['author'] = $author; 

			array_push($books, $book); 
		}
		
		return $books; 
	}	
	
	function getPrintBooks($printName){
		$stmt = $this->con->prepare("SELECT DISTINCT b.id, title, year, print, file, picture, description, concat(author_name,' ', author_surname)
									from books b
                                    join offers o 
                                    ON o.book_id = b.id
                                    WHERE print = ?");
		$stmt->bind_param("s", $printName);
		$stmt->execute();
		$stmt->bind_result($id, $title, $year, $print, $file, $picture, $description, $author);
		
		$books = array(); 
		
		while($stmt->fetch()){
			$book  = array();
			$book['id'] = $id; 
			$book['title'] = $title; 
			$book['year'] = $year; 
			$book['print'] = $print; 
			$book['file'] = $file; 
			$book['picture'] = $picture; 
			$book['description'] = $description; 
			$book['author'] = $author; 

			array_push($books, $book); 
		}
		
		return $books; 
	}
	
	function addBookComment($content, $rating, $bookId, $userId){
		$stmt = $this->con->prepare("INSERT INTO evaluations (content, evaluation, book_id, user_id) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("sii", $content, $rating, $bookId, $userId);
		if($stmt->execute()){
			return true; 
		} else { 
			return false;
		}
	}	
	
	function addBookQuote($content, $bookId, $userId){
		$stmt = $this->con->prepare("INSERT INTO quotes (content, book_title, book_author_name, book_author_surname, user_id) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $content, $bookId);
		if($stmt->execute()){
			return true; 
		} else { 
			return false;
		} 
	}	
	
	function deleteBook($bookId, $userId){
		$stmt = $this->con->prepare("DELETE FROM transactions WHERE book_id = ? AND user_id = ?");
		$stmt->bind_param("ii", $bookId, $userId);
		
		if($stmt->execute()){
			return true; 
		} else { 
			return false;
		}
	}	
	
	function deleteQuote($quoteId){
		$stmt = $this->con->prepare("DELETE FROM quotes WHERE id = ?");
		$stmt->bind_param("s", $quoteId);
		$stmt->execute();

		if($stmt->execute()){
			return true; 
		} else { 
			return false;
		}
	}
}
<?php
class AllResultsProvider {

	private $con;

	public function __construct($con) {
		$this->con = $con;
	}

	public function getNumResults($term) {

		$query = $this->con->prepare("SELECT COUNT(*) as total 
										 FROM dicio WHERE title LIKE :term 
										 OR url LIKE :term 
										 OR keywords LIKE :term 
										 OR description LIKE :term");

		$searchTerm = "%". $term . "%";
		$query->bindParam(":term", $searchTerm);
		$query->execute();

		$row = $query->fetch(PDO::FETCH_ASSOC);
		return $row["total"];

	}

	public function getResultsHtml($page, $pageSize, $term) {

		$fromLimit = ($page - 1) * $pageSize;

		$query = $this->con->prepare("SELECT * 
										 FROM dicio WHERE title LIKE :term 
										 OR url LIKE :term 
										 OR keywords LIKE :term 
										 OR description LIKE :term
										 ORDER BY clicks DESC
										 LIMIT :fromLimit, :pageSize");

		$searchTerm = "%". $term . "%";
		$query->bindParam(":term", $searchTerm);
		$query->bindParam(":fromLimit", $fromLimit, PDO::PARAM_INT);
		$query->bindParam(":pageSize", $pageSize, PDO::PARAM_INT);
		$query->execute();




		$resultsHtml = "<div class='siteResults'>
		
		<div class='position-sticky' style='top: 3.6rem;'>
			<span class='d-block p-1 text-bg-secondary mb-1 sticky-top'> Dicionário</span>
	    </div>	

		";


		while($row = $query->fetch(PDO::FETCH_ASSOC)) {

			$id = $row["id"];
			$url = $row["url"];
			$title = $row["title"];
			$description = $row["description"];

			$title = $this->trimField($title, 60);
			$description = $this->trimField($description, 142);
			
			$resultsHtml .= "
			
			
			
			<div class='card border-0'>
    <div class='card-body'>
        <h5 class='card-title'>
		    <a class='text-primary text-decoration-none fs-4' href='$url' data-linkId='$id'>$title</a>
		</h5>
		<a href='$url' class='card-link text-decoration-underline text-success'>$url</a>
        <p class='card-text'>$description</p>

    </div>
</div>
							
							
							
							
							";


		}


		$resultsHtml .= "</div>";

		return $resultsHtml;
	}

	private function trimField($string, $characterLimit) {

		$dots = strlen($string) > $characterLimit ? "..." : "";
		return substr($string, 0, $characterLimit) . $dots;
	}




}
?>
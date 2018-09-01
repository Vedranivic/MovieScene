$(document).ready(() => {
  $('#searchText').on('input', (e) => {
    let searchText = $('#searchText').val();
	if(searchText.length>2){
    getMovies(searchText);
    e.preventDefault();
  }
  });
  $('#searchForm').submit(function(e) {	
	let searchText = $('#searchText').val();
       if (!searchText) {
       e.preventDefault();
	}
	else{
		e.preventDefault();
		getMovies(searchText);
	}
});
  
});


function getMovies(searchText){
  axios.get('http://www.omdbapi.com/?apikey=b3f632a8&s='+searchText)
    .then((response) => {
      console.log(response);
      let movies = response.data.Search;

      $.each(movies, (index, movie) => {
		if(movie.Poster == "N/A"){
			movie.Poster = "https://jessica-chastain.com/news/wp-content/uploads/2016/07/noposter.jpg";
		}
		
		//AJAX + PHP
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("movies").innerHTML += this.responseText;
            }
        };
        xmlhttp.open("GET", "display_results.php?poster=" + movie.Poster + "&title=" + movie.Title + "&year=" + movie.Year + "&imdbID=" + movie.imdbID, true);
        xmlhttp.send();
      });

    })
    .catch((err) => {
      console.log(err);
    });
}

function movieSelected(id){
  sessionStorage.setItem('movieId', id);
  window.location.href = 'add.php';
  return false;
}

function getMovie(){
	console.log("successful call");
  if(sessionStorage.getItem('movieId') !== null){
  let movieId = sessionStorage.getItem('movieId');

  axios.get('http://www.omdbapi.com/?apikey=b3f632a8&i='+movieId)
    .then((response) => {
      console.log(response);
      let movie = response.data;
		if(movie.Poster == "N/A"){
			movie.Poster = "https://jessica-chastain.com/news/wp-content/uploads/2016/07/noposter.jpg";
		}
	$('#title').val(movie.Title);
	$("#title").attr("readonly", "true");
	$('#genre').val(movie.Genre);
	$("#genre").attr("readonly", "true");
	$('#director').val(movie.Director);
	$("#director").attr("readonly", "true");
	$('#year').val(movie.Year);
	$("#year").attr("readonly", "true");
	$('#imdb_rating').val(movie.imdbRating);
	$("#imdb_rating").attr("readonly", "true");
	$('#plot').val(movie.Plot);
	$("#plot").attr("readonly", "true");
	$('#actors').val(movie.Actors);
	$("#actors").attr("readonly", "true");

	sessionStorage.removeItem('movieId');
	console.log("item.removed");
    })
    .catch((err) => {
      console.log(err);
    });
  }
}

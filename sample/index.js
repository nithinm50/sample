const year = document.getElementById("year");
const genres = document.getElementById("genre");

year.addEventListener('change', filterchanges);
genre.addEventListener('change', filterchanges);

function filterchanges(e){
    let date = year.value;
    let genre = genres.value;
    
    window.location.href = "http://localhost/sample/movie-list.php?year=" + date + "&genre=" + genre;
}

$('.owl-carousel').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    dots : false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
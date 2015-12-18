jQuery(document).ready(function() {

    var $votesCount = 0;
    var $voteText = "Vote";

    function setRating($movieTitle, $ratingTag) {
        $.ajax({
            url: "http://www.imdbapi.com/?t=" + $movieTitle,
            dataType: 'json',
            success: function($data) {
                var $rating = $data.imdbRating;
                if ($rating != undefined)
                    $ratingTag.text($rating);
            }
        });
    }

    $(".rating").each(function() {
        var $parentTag = $(this).parent();
        var $movieTitle = $parentTag.children(":first").text();
        setRating($movieTitle, $(this).children(":first"));
    });

    $('.menu').on('click', function(e) {
        $('.menuOverlay').toggleClass('showMenu');
        $('.menuContent').toggleClass('showMenu');
        return e.preventDefault();
    });

    $('.seeMoreButton').on('click', function() {
        var $titleTag = $(this).prev();
        var $title = $titleTag.text();
        window.open('http://www.imdb.com/search/title?title=' + $title);
    });

    function setVoteText($text, $context) {
        $context.children(":first").text($text);
    }

    $(".voteButton").hover(function() {
        setVoteText($votesCount, $(this));
    });

    $(".voteButton").mouseleave(function() {
        setVoteText($voteText, $(this));
    });

    $(".voteButton").click(function() {
        $votesCount++;
        setVoteText($votesCount, $(this));
    });
});

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
var videoId;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player-video', {
    height: '500',
    width: '100%',
    playerVars: { 'autoplay': 0, 'controls': 2 },
    videoId: 'yDTWhYzy-DI',
    events: {
      'onReady': onPlayerReady,
      'onPlaybackQualityChange': onPlayerPlaybackQualityChange,
      'onStateChange': onPlayerStateChange,
      'onError': onPlayerError
    }
  });
}

function onPlayerPlaybackQualityChange(event) {
  console.log("onPlayerPlaybackQualityChange >", event);
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  console.log("onPlayerReady");

  event.target.setVolume(100);
  // event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;
function onPlayerStateChange(event) {
  console.log("onPlayerReady");

  // if (event.data == YT.PlayerState.PLAYING && !done) {
  //   setTimeout(stopVideo, 6000);
  //   done = true;
  // }
}
function stopVideo() {
  player.stopVideo();
}

function onPlayerError(event) {
  console.log("onPlayerError >", event);
}

let currentVideo;
$(document).ready(function() {
  console.log("READY 2")

  $( ".btn-navigate" ).click(function(event) {
    event.preventDefault();
    var width = $(window).width();
    var offset = width <= 650 ? 260 : 180;
    var anchor = $.attr(this, 'href');
    if (anchor == '#about') {
      offset = width <= 650 ? 370 : 260;
    }
    console.log("width", width, anchor);

    $('html, body').animate({
      scrollTop: $(anchor).offset().top - offset
    }, 500);
  });

  // RATING
  let clearRating = () => {
    $(".rating input:radio").attr("checked", false);
    $(".rating span").removeClass('checked');
  }

  let sendVote = function(video_id, vote) {
    $.post('/votar', { video_id: video_id, vote: vote }, function( data ) {
      console.log("HEYYEE", data);

      if (data.hasOwnProperty('video_id')) {
        alert('Avaliação enviada!');
      } else {
        clearRating();
        alert('Não foi possível realizar sua avaliação, tente novamente!');
      }
    });
  }

  clearRating();

  $('.rating input').click(function () {
      $(".rating span").removeClass('checked');
      $(this).parent().addClass('checked');
  });

  $('input:radio').change(function(){
      var userRating = this.value;
      // alert(userRating);

      console.log("do vote", currentVideo, userRating)

      sendVote(currentVideo, userRating);
  }); 

  // VIDEO
  $( ".show-video" ).click(function(event) {
    event.preventDefault();

    videoId = $(this).data('videoid');
    youtubeUrl = $(this).data('youtubeurl');
    currentVideo = $(this).data('currentvideo');

    clearRating();

    if (youtubeUrl) {
      try {
        videoId = youtubeUrl.split('/').pop().split('&').shift().replace('watch?v=', '');
      } catch (error) {
        console.log("PARSE ERROR >>>", error);
      }
    }

    console.log("TESSTE ID >>>", videoId);
    console.log("TESSTE URL >>>", youtubeUrl);
    console.log("TESSTE CURRENT >>>", currentVideo);

    setTimeout(() => $('#modal-video').modal('show'), 600);
  });

  $( ".show-welcome" ).click(function(event) {
    event.preventDefault();

    $('#modal-welcome').modal('show');
  });


  $('#modal-video').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    // var videoId = button.data('videoid') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    // var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    // modal.find('.modal-body input').val(recipient)

    console.log("SHOOW ", videoId, button.data('target'));

    player.loadVideoById({
      'videoId': videoId,
      'suggestedQuality': 'large'
    });
  });

  $('#modal-video').on('hide.bs.modal	', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var videoId = button.data('videoId');

    player.stopVideo();
  });

  /**
   * Control Videos
   */

  $('.action-video-left').click(function(event) {
    event.preventDefault();

    var leftPos = $(this).next('.card-videos-list').scrollLeft();
    $(this).next(".card-videos-list").animate({scrollLeft: leftPos - 400}, 200);
  });

  $('.action-video-right').click(function(event) {
    event.preventDefault();

    var leftPos = $(this).prev('.card-videos-list').scrollLeft();
    $(this).prev(".card-videos-list").animate({scrollLeft: leftPos + 400}, 200);
  });

  /**
   * FACEBOOK
   */

  // FB.getLoginStatus(function(response) {
  //   statusChangeCallback(response);
  // });
});

//MEANWHILE IN $(document).ready()
$(document).on(
  'fbload',  //  <---- HERE'S OUR CUSTOM EVENT BEING LISTENED FOR
  function(){
      //some code that requires the FB object
      //such as...
      FB.getLoginStatus(function(res){
          if( res.status == "connected" ){
              FB.api('/me', function(fbUser) {
                  console.log("Open the pod bay doors, " + fbUser.name + ".");
              });
          }
      });

  }
);

$('#modalCatchDetail').on('show.bs.modal', function(event) {
   var button = $(event.relatedTarget);
   var cid = button.data('cid');
   
   $.ajax({
      type: "POST",
      url: "php/getCatchDetail.php",
      data: {
         CID: cid
      },
      cache: false,
      success: function(data) {
         console.log(data);
         $('.modal-content').html(data)
      },
      error: function(err) {
         console.log(err);
      }
  });
});

$('#newCatchForm').submit(function(e) {
   e.preventDefault();
   if(navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(setCatch, showError, {
         enableHighAccuracy: true,
         timeout: 5000,
         maximumAge: 5000
      });
   }
   else {
      alert('no geolocation support');
   }

   return false;
});

function setCatch(position) {
   var ncLat = position.coords.latitude;
   var ncLng = position.coords.longitude; 
   var ncFish = $("#newCatchFish").val();
   var ncWater = $("#newCatchWater").val();
   var ncBait = $("#newCatchBait").val();
   var ncWeight = $("#newCatchWeight").val();
   var ncLength = $("#newCatchLength").val();
   var ncMISC = $("#newCatchMISC").val();
   var ncBDetail = $("#newCatchBDetail").val();

   $.ajax({ 
      type: "POST",
      url: "php/submitCatch.php",
      data: {
         fish: ncFish,
         water: ncWater,
         bait: ncBait,
         lat: ncLat,
         lng: ncLng,
         weight: ncWeight,
         length: ncLength,
         misc: ncMISC,
         bdetail: ncBDetail
      },
      success: function(response) {
         alert("You will now be redirected.");
         window.location = "http://sorridia.athalon.de/iCatch/index.php?event=list";
      }
   });
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("User denied the request for Geolocation.")
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Location information is unavailable.")
            break;
        case error.TIMEOUT:
            alert("The request to get user location timed out.")
            break;
        case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.")
            break;
    }
}

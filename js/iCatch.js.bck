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

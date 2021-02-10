// $("#scriptureform").submit(function (event) {
//     event.preventDefault(); //prevent default action 
//     var post_url = $(this).attr("insert_scripture.php"); //get form action url
//     var request_method = $(this).attr("POST"); //get form GET/POST method
//     var form_data = new FormData(this); //Creates new FormData object
//     $.ajax({
//         url: post_url,
//         type: request_method,
//         data: form_data,
//         contentType: false,
//         cache: false,
//         processData: false
//     }).done(function (response) {
//         getdisplayscripture();
//         // $("#bogus").html($displaynewstring);
//     });
// });


$("#scriptureform").submit(function (event) {
  event.preventDefault();
  $.ajax({
      method: "POST",
      url: "response.php",
      // data: { name: "Dan", example: "Yup" }
    })
    .success: function (response) {
      $('#response')
    }
    // .done(function (message) {
    //     $("#log").text(message);
    // })
    .fail(function (message) {
      $("#response").text(message);
      console.log(message);
    });

});
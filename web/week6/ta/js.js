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
  console.log("before post");
  $.ajax({
      method: "POST",
      url: "insert_scripture.php",
      data: $("#scriptureform").serialize(),
      success: function (res) {
        console.log('success');
        $("#response").innerHTML = res;
        console.log($("#response"));
        console.log(res);
      }
    })
    // .done(function (res) {
    //   console.log('done');
    //   $('#response').text = res;
    //   console.log(res);

    // })
    .fail(function (message) {
      console.log('file');
      $("#response").text(message);
      console.log(message);
    });
});
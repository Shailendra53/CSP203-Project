$("form#upload").submit(function(e) {

  e.preventDefault();    
  var formData = new FormData(this);
  console.log(formData);
  var f=$(this).find('input[name="fileToUpload"]');
  console.log(f);
  
  var fileName = f.val().split('\\')[2];
  var FilePattern = new RegExp('^[a-zA-Z0-9\\_:.]+$');
  console.log('The file "' + fileName +  '" has been selected.');

  // Password validation.
  if (!FilePattern.test(fileName) ) {
    console.log(fileName);
    console.log("name error");

    $("#status").html('Failed');
    $('.alert').addClass('show fade');
    $("#message").html('name error enter file name with no spaces.');
    $('.alert').removeClass('alert-sucess');
    $('.alert').addClass('alert-danger');


    return false;
  }



  $.ajax({
    url: "upload.php",
    type: 'POST',
    data: formData,
    success: function (data) {
      upl_callback(data)
    },
    error: function (data) {
                    //alert("error");
                    Callback(data);
                    //Callback("Error getting the data");
                  },    
    cache: false,
    contentType: false,
    processData: false

  });

});

function upl_callback(data)
{
  console.log(data);
  alert(data);
  var values=deparam(data);
  console.log(values);
  var  doc_added=values['doc_added'];
  alert(doc_added);

  if(doc_added){

    var image=values["imagePath"];
    var  cv_id=values['cv_id'];
    var  last_update=values['last_update'];
    var  name=values['name'];
    var  message=values['message'];
    var  title=values['title'];
    var this_=$(" #your");
    console.log($(" #your"));

    if(message=="Updated, file already exists." ){
        console.log('remove');
        $("#"+cv_id).remove();
        console.log($("#"+cv_id));
    }

    $("#your").append("<div class=\"col-3\"> <div class=\"card card-block \">\
     <div class=\"card-content\"> <div class=\"card-body\" id=\""+ cv_id+"\" > </div></div></div></div>");

    $('#'+cv_id).append('<div class=\"container\">\
      <div class=\"item\">\
      <img class=\"card-img-top img-fluid\" src=\"'+ image+ '\" alt=\"Card image cap\">\
      </div>\
      </div>\
      <div class=\"options\">\
      <ul class=\"option\">\
      <li><i class=\"far fa-edit fa-2x \"></i></li>\
      <li><i class=\"fa fa-trash fa-2x \"></i></li>\
      <li><i class=\"far fa-edit fa-2x\"></i></li>\
      <li> Share\
      <label class=\"switch\">\
      <input type=\"checkbox\">\
      <span class=\"slider round\">\</span>\
      </label>\
      <li> \
      </ul>\
      </div>\
      <h4 class=\"card-title\">'+ title+'</h4>\
      <div  class=\"rate_widget\" >\
      <img class=\" ratings_stars img-responsive star_1\" src=\"./images/star.png\" ></img>\
      <img class=\"img-responsive  ratings_stars star_2\" src=\"./images/star.png\" ></img>\
      <img class=\"img-responsive  ratings_stars star_3\" src=\"./images/star.png\" ></img>\
      <img class=\"img-responsive  ratings_stars star_4\" src=\"./images/star.png\" ></img>\
      <img class=\"img-responsive  ratings_stars star_5\" src=\"./images/star.png\" ></img>\
      <div class=\"total_votes\"></div>\
      </div>\
      <p class=\"card-text\">last updated<span class=\"meta_info\">'+last_update+'</span></p>\
      ');

    $('.scroll').slick('unslick').slick('reinit');
  
  }

}

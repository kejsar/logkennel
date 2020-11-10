
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $("#card-img-top").attr("src", e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imageinput").on("change", function() {
  readURL(this);
  var fileName = $(this).val();
  $(this).next(".custom-file-label").html(fileName);
})

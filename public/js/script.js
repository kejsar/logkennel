$(document).ready(function () {
  $("#imageinput").on("change", function () {
    if ($(this).files && $(this).files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#card-img-top").attr("src", e.target.result);
      };
      reader.readAsDataURL($(this).files[0]);
    }
    var fileName = $(this).files[0].name;
    $(this).next(".custom-file-label").html(fileName);
  });

  $("#delete-confirm").click(function (event) {
    var dogName = $(this).data("dogName");
    $("#delete-button").html(
      '<i class="fas fa-times"></i> удалить ' + dogName + "?"
    );
    $("#delete-form").show("fast");
    event.preventDefault();
  });

  $(".galery-image-edit").hover(
    function () {
      $(this).find(".delete-image-button").stop().show("slow");
    },
    function () {
      $(this).find(".delete-image-button").stop().hide("slow");
    }
  );

  $(document).on("click", '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
});

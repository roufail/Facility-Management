$(function(){
    if ($(".attach_file_handler").length > 0){
      $(".attach_file_handler").click(function () {
          $(".attach_file").click();
      });
    }

    if ($(".delete-button").length > 0) {
        $(".delete-button").click(function () {
            return confirm("Are you sure you want to delete this record ?");
        });
    }


})
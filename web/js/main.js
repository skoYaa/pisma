$("#purchase-package_id").change(function () {
     console.log($(this).val());
     
     $.ajax({
         url: 'index.php?r=user/index',
         data: {
             id: $(this).val()
         },
         success: function(data) {
             console.log(data);
         }
     });
});

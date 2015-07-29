$("#purchase-package_id").change(function () {
     console.log($(this).val());
     
     $.ajax({
         url: 'index.php?r=purchase/price',
         data: {
             id: $(this).val()
         },
         success: function(data) {
             console.log(data);
         }
     });
});

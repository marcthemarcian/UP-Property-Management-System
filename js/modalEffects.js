var ModalEffects = (function() {
  function init() {
    $('body').delegate('.md-trigger', 'click', function(e) {
      var modal = $('#' + $(this).data('modal'));

      $('#editButton').attr('myEid', $(this).attr('thisEid'));        
      var eid = $(this).attr('thisEid');
     // var img = "<strong>QR Code: </strong> <img src=" + $('#fileSpan_' + eid) + "/";

      var imgPath = $('#fileSpan_' + eid).html().substring(3);
      $('#articleDet').html("<strong>Article: </strong>" + $('#articleSpan_' + eid).html());
      $('#propertyDet').html("<strong>Property Number: </strong>" + $('#propertySpan_' + eid).html());
      $('#descriptionDet').html("<strong>Description: </strong>" + $('#descriptionSpan_' + eid).html());
      $('#dateDet').html("<strong>Date Acquired: </strong>" + $('#dateSpan_' + eid).html());
      $('#pointPersonDet').html("<strong>Point Person: </strong>" + $('#pointPersonSpan_' + eid).html());
      $('#departmentDet').html("<strong>Department: </strong>" + $('#departmentSpan_' + eid).html());
      $('#locationDet').html("<strong>Location: </strong>" + $('#locationSpan_' + eid).html());
      $('#accountDet').html("<strong>Account Title: </strong>" + $('#accountSpan_' + eid).html());
      $('#quantityDet').html("<strong>OHC_Quantity: </strong>" + $('#quantitySpan_' + eid).html());
      $('#unitMDet').html("<strong>Unit Measure: </strong>" + $('#unitMSpan_' + eid).html());
      $('#unitVDet').html("<strong>Unit Value: </strong>" + $('#unitVSpan_' + eid).html());
      $('#remarksDet').html("<strong>Remarks: </strong>" + $('#remarksSpan_' + eid).html());
      $('#pointPersonDet').html("<strong>Point Person: </strong>" + $('#pointPersonSpan_' + eid).html());
      $('#acquiredDet').html("<strong>OHC Date: </strong>" + $('#acquiredSpan_' + eid).html());
      $('#qrcode').attr('src',imgPath);
      //$('#qrcode').src = $('#fileSpan_' + eid);

      console.log(imgPath);
      modal.addClass('md-show');
      if ($(this).hasClass('md-setperspective')) {
        setTimeout(function() {
          classie.add(document.documentElement, 'md-perspective');
        }, 25);
      }

      modal.find('.md-close').off('click').on('click', function(e) {
        e.stopPropagation();
        removeModalHandler();
      });

      $('.md-overlay').off('click').on('click', removeModalHandler);

      function removeModalHandler() {
        removeModal($(this).hasClass('md-setperspective'));
      }

      function removeModal(hasPerspective) {
        modal.removeClass('md-show');
        if (hasPerspective) {
          classie.remove(document.documentElement, 'md-perspective');
        }
      }


    });
  }

  init();
})();

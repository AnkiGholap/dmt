function getAge(fromdate, todate) {
  if (todate) todate = new Date(todate);
  else todate = new Date();

  var age = [],
    fromdate = new Date(fromdate),
    y = [todate.getFullYear(), fromdate.getFullYear()],
    ydiff = y[0] - y[1],
    m = [todate.getMonth(), fromdate.getMonth()],
    mdiff = m[0] - m[1],
    d = [todate.getDate(), fromdate.getDate()],
    ddiff = d[0] - d[1];

  if (mdiff < 0 || (mdiff === 0 && ddiff < 0)) --ydiff;
  if (mdiff < 0) mdiff += 12;
  if (ddiff < 0) {
    fromdate.setMonth(m[1] + 1, 0);
    ddiff = fromdate.getDate() - d[1] + d[0];
    --mdiff;
  }
  if (ydiff > 0) age.push(ydiff + " year" + (ydiff > 1 ? "s " : " "));
  if (mdiff > 0) age.push(mdiff + " month" + (mdiff > 1 ? "s" : ""));
  if (ddiff > 0) age.push(ddiff + " day" + (ddiff > 1 ? "s" : ""));
  if (age.length > 1) age.splice(age.length - 1, 0, " and ");
  return age.join("");
}

var table = jQuery('#data-table').DataTable({
  scrollX: true,
  scrollY: true,
  paging: false,
});

jQuery('a.toggle-vis').on('click', function (e) {
  e.preventDefault();

  // Get the column API object
  var column = table.column(jQuery(this).attr('data-column'));

  // Toggle the visibility
  column.visible(!column.visible());
});

jQuery('body').on("click", ".dropdown-menu", function (e) {
  jQuery(this).parent().is(".open") && e.stopPropagation();
});

jQuery('.selectall').click(function() {
  if (jQuery(this).is(':checked')) {
      jQuery('.option').prop('checked', true);
      var total = jQuery('input[name="options[]"]:checked').length;
      //jQuery(".dropdown-text").html('(' + total + ') Selected');
      jQuery(".select-text").html(' Deselect');
  } else {
      jQuery('.option').prop('checked', false);
      jQuery(".dropdown-text").html('(0) Selected');
      jQuery(".select-text").html(' Select');
  }
});

jQuery("input[type='checkbox'].justone").change(function(){
  var a = jQuery("input[type='checkbox'].justone");
  if(a.length == a.filter(":checked").length){
      jQuery('.selectall').prop('checked', true);
      jQuery(".select-text").html(' Deselect');
  }
  else {
      jQuery('.selectall').prop('checked', false);
      jQuery(".select-text").html(' Select');
  }
var total = jQuery('input[name="options[]"]:checked').length;
//jQuery(".dropdown-text").html('(' + total + ') Selected');
});